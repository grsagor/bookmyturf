@extends('front.layout.app')

@section('title', 'Projects')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lightgallery-bundle.min.css" />
@endpush

@section('content')
    <x-common-page-hero title="Our Gallery" />

    <section class="gallery-section container py-5">
        <div id="lightgallery" class="row gallery-grid">
            @foreach ($images as $image)
                <a href="{{ $image['full'] }}" class="gallery-item col-md-4"
                    data-sub-html="<h4>{{ $image['title'] }}</h4><p>{{ $image['description'] }}</p>">
                    <img src="{{ $image['thumb'] }}" alt="{{ $image['title'] }}">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/zoom/lg-zoom.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const galleryElem = document.getElementById('lightgallery');

            if (galleryElem) {
                lightGallery(galleryElem, {
                    selector: '.gallery-item', // Ensures only these open
                    plugins: [lgZoom, lgThumbnail],
                    speed: 500,
                    download: false
                });
            }
        });
    </script>
@endpush
