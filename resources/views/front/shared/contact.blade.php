<section class="container contact-section py-5">
  <h2 class="text-center mb-5 fw-bold text-white">Contact Support</h2>
  <div class="row g-5 align-items-center">
    <!-- Left: Map + Contact Info -->
    <div class="col-lg-6">
      <div class="map-wrapper rounded shadow mb-4 overflow-hidden">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.902172370235!2d90.39614321498169!3d23.81033159472621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf3f3160d6f1%3A0xf2a599c7d3e8cb0e!2sDhaka%2C%20Bangladesh!5e0!3m2!1sen!2sus!4v1691678276593!5m2!1sen!2sus"
          width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>

      <div class="contact-info text-white">
        <p class="mb-3 fs-5 contact-item">
          <i class="fa fa-phone"></i>
          <a href="tel:+880123456789" class="text-white text-decoration-none">+880 1234 56789</a>
        </p>
        <p class="mb-3 fs-5 contact-item">
          <i class="fa fa-envelope"></i>
          <a href="mailto:support@example.com" class="text-white text-decoration-none">support@example.com</a>
        </p>
        <p class="fs-5 contact-item">
          <i class="fa fa-map-marker-alt"></i>
          123, Some Street, Dhaka, Bangladesh
        </p>
      </div>
    </div>

    <!-- Right: Contact Form -->
    <div class="col-lg-6">
      <form id="contact-form" class="contact-form p-4 rounded shadow">
        @csrf
        <div class="mb-4">
          <label for="name" class="form-label text-white fw-semibold">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required />
        </div>
        <div class="mb-4">
          <label for="email" class="form-label text-white fw-semibold">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="your.email@example.com" required />
        </div>
        <div class="mb-4">
          <label for="message" class="form-label text-white fw-semibold">Message</label>
          <textarea class="form-control" id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100 fw-bold">Send Message</button>
        <div id="form-alert" class="mt-3 text-center" role="alert" style="display:none;"></div>
      </form>
    </div>
  </div>
</section>

@push('scripts')
<script>
  $(function() {
    $('#contact-form').on('submit', function(e) {
      e.preventDefault();
      $('#form-alert').hide().removeClass('text-danger text-success').text('');
      const form = $(this);
      const submitBtn = form.find('button[type="submit"]');
      submitBtn.prop('disabled', true).text('Sending...');

      // Replace with real AJAX
      setTimeout(() => {
        submitBtn.prop('disabled', false).text('Send Message');
        $('#form-alert').addClass('text-success').text('Your message has been sent!').show();
        form.trigger('reset');
      }, 1500);
    });
  });
</script>
@endpush
