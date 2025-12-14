@extends('backend.layout.app')
@section('title', 'Dashboard | ' . Helper::getSettings('application_name') ?? 'ERP')
@section('content')
    <div class="container-fluid px-5 pt-4">
        <h4 class="mt-2">Dashboard</h4>
        <div class="row">
            <div class="col-4">
                <canvas id="attendanceChart"></canvas>
            </div>
            <div class="col-4">
                <canvas id="orderStatusChart"></canvas>
            </div>
            <div class="col-4">
                <canvas id="productHistoryChart"></canvas>
            </div>
            <div class="col-6">
                <canvas id="rawMaterialImportChart"></canvas>
            </div>
            <div class="col-6">
                <canvas id="salaryChart"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
