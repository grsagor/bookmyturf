@extends('front.layout.app')

@section('title', 'Contact Me')

@section('content')
    <x-common-page-hero title="Let's Connect" />
    <div class="mt-5">
      @include('front.shared.contact')
    </div>
@endsection
