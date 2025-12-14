<section class="testimonials section bg-light py-5">
    <div class="container">
        <h2 class="section-title text-center mb-4">What Clients Say</h2>
        <div class="swiper testimonials-swiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide card border-0 shadow-sm p-4">
                    <p class="mb-3 fst-italic">
                        "@iamgrsagor delivered our project ahead of schedule with clean Laravel code and solid
                        communication throughout. Highly recommend!"
                    </p>
                    <h5 class="text-end mb-0">- John Doe, CTO at StartupX</h5>
                </div>

                <div class="swiper-slide card border-0 shadow-sm p-4">
                    <p class="mb-3 fst-italic">
                        "Great attention to detail, solved every bug we had, and built features we didn’t even know we
                        needed."
                    </p>
                    <h5 class="text-end mb-0">- Jane Smith, Product Lead at AppCorp</h5>
                </div>

            </div>

            <!-- Pagination -->
            <div class="swiper-pagination mt-3"></div>
        </div>
    </div>
</section>

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.testimonials-swiper', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
            });
        });
    </script>
@endpush
