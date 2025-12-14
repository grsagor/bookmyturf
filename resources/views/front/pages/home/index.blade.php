@extends('front.layout.app')

@section('title', 'Home')

@section('content')
  @include('front.pages.home.sections.hero')
  @include('front.pages.home.sections.features')
  @include('front.pages.home.sections.meet-pal-section')
  @include('front.pages.home.sections.slots')
  @include('front.shared.contact')
  {{-- @include('front.pages.home.sections.testimonials') --}}
@endsection
