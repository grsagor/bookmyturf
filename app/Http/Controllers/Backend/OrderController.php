<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function index()
    {
        return view('backend.pages.orders.index');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            // eager load slot relationship for slot name display
            $data = Order::with('slot')->get();

            return DataTables::of($data)
                ->addColumn('slot.name', function ($row) {
                    return $row->slot ? $row->slot->name : '-';
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.orders.edit', ['id' => $row->id]);
                    $deleteUrl = route('admin.orders.delete', ['id' => $row->id]);

                    $actionBtn = '<button class="edit btn btn-success btn-sm edit_btn" data-url="' . $editUrl . '">Edit</button> ';
                    $actionBtn .= '<button class="delete btn btn-danger btn-sm delete_btn" data-url="' . $deleteUrl . '">Delete</button>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function create()
    {
        $dates = [];
        for ($i = 0; $i < 2; $i++) {
            $dates[] = date('Y-m-d', strtotime("+$i days"));
        }
        $defaultDate = $dates[0];
        $slots = Slot::all();

        foreach ($slots as $slot) {
            $order = Order::where([['slot_id', $slot->id], ['date', $defaultDate]])->first();
            $slot->booked = $order ? true : false;
        }
        $html = view('backend.pages.orders.create', compact('slots'))->render();
        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slot_id' => 'required|exists:slots,id',
            'date' => 'required|date|after_or_equal:today',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'amount' => 'required|numeric|min:0',
            'address' => 'required|string',
            'status' => 'required|in:Pending,Processing,Completed',
            'transaction_id' => 'nullable|string|max:255',
            'currency' => 'required|string|in:BDT',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            Order::create([
                'slot_id' => $request->slot_id,
                'date' => $request->date,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'amount' => $request->amount,
                'address' => $request->address,
                'status' => $request->status,
                'transaction_id' => $request->transaction_id,
                'currency' => $request->currency,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Order created successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $slots = Slot::all();

        foreach ($slots as $slot) {
            $existing_order = Order::where([['slot_id', $slot->id], ['date', $order->date]])->first();
            $slot->booked = $existing_order && $existing_order->id != $order->id ? true : false;
        }

        $html = view('backend.pages.orders.edit', compact('order', 'slots'))->render();
        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'price' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $order = Order::findOrFail($id);
            $order->update([
                'name' => $request->name,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'price' => $request->price,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Order updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function delete($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();

            return response()->json([
                'success' => true,
                'message' => 'Order deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!'
            ], 500);
        }
    }
}
