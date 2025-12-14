@extends('front.layout.app')

@section('title', 'About Me')
@section('content')
    <x-common-page-hero title="About" />

    <section class="about-intro container py-5">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <h2>Who We Are</h2>
                <p>We’re a passionate team dedicated to making slot booking simple, transparent, and stress-free. Our
                    platform gives you real-time availability, competitive pricing, and a seamless experience from start to
                    finish.</p>
                <p>With innovation and customer care at our core, we aim to provide you with the most reliable booking
                    service in the market.</p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('assets/images/about-img.jpg') }}" alt="About Us" class="img-fluid rounded shadow">
            </div>
        </div>
    </section>

    <section class="about-mission py-5 text-center">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="about-card p-4 h-100">
                        <h3>Our Mission</h3>
                        <p>To make booking your perfect slot quick, easy, and accessible from anywhere in the world.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-card p-4 h-100">
                        <h3>Our Vision</h3>
                        <p>To become the go-to global platform for all your booking needs, delivering unmatched service and
                            convenience.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('front.shared.contact')
@endsection
