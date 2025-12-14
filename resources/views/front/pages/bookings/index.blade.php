@extends('front.layout.app')

@section('title', 'Booking')

@section('content')
    <x-common-page-hero title="Book A Slot" />
    @include('front.pages.home.sections.slots')
    @include('front.shared.contact')
@endsection
