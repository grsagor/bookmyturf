<footer class="footer-section py-5 text-white">
  <div class="container">
    <div class="row gy-4">
      <!-- About -->
      <div class="col-md-4 col-lg-3">
        <a href="{{ route('front.index') }}">
          <img class="footer-logo" src="{{ asset('assets/images/logo.png') }}" alt="">
        </a>
        <p class="footer-text">
          BookMyTurf is a cutting-edge software company delivering top-notch solutions for web and mobile.  
          Innovating your digital experience.
        </p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-4 col-lg-3">
        <h5 class="footer-title mb-3">Quick Links</h5>
        <ul class="footer-links list-unstyled">
          <li><a href="#" class="footer-link">Home</a></li>
          <li><a href="#" class="footer-link">Services</a></li>
          <li><a href="#" class="footer-link">Projects</a></li>
          <li><a href="#" class="footer-link">Contact</a></li>
          <li><a href="#" class="footer-link">Blog</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="col-md-4 col-lg-3">
        <h5 class="footer-title mb-3">Contact</h5>
        <ul class="footer-contact list-unstyled">
          <li><i class="fa fa-map-marker-alt me-2 text-primary"></i> 123 Some Street, Dhaka, Bangladesh</li>
          <li><i class="fa fa-phone me-2 text-primary"></i> <a href="tel:+880123456789" class="footer-link">+880 1234 56789</a></li>
          <li><i class="fa fa-envelope me-2 text-primary"></i> <a href="mailto:info@bookmyturf.com" class="footer-link">info@bookmyturf.com</a></li>
        </ul>
      </div>

      <!-- Social Media -->
      <div class="col-md-12 col-lg-3 d-flex flex-column align-items-start align-items-lg-center">
        <h5 class="footer-title mb-3">Follow Us</h5>
        <div class="social-icons d-flex gap-3">
          <a href="#" class="social-icon" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social-icon" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" class="social-icon" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="social-icon" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <hr class="footer-divider my-4" />

    <div class="text-center small text-muted">
      &copy; {{ date('Y') }} BookMyTurf. All rights reserved.
    </div>
  </div>
</footer>
