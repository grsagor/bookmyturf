<!-- Stylish Preloader -->
<style>
    @keyframes bounce {

        0%,
        80%,
        100% {
            transform: scale(0);
        }

        40% {
            transform: scale(1);
        }
    }
</style>

{{-- <div id="preloader"
    class="position-fixed top-0 start-0 w-100 vh-100 bg-white d-flex justify-content-center align-items-center"
    style="z-index: 1050;">
    <div class="d-flex gap-3">
        <div
            style="width: 15px; height: 15px; background-color: #0d6efd; border-radius: 50%; animation: bounce 1.4s infinite ease-in-out both;">
        </div>
        <div
            style="width: 15px; height: 15px; background-color: #0d6efd; border-radius: 50%; animation: bounce 1.4s infinite ease-in-out both; animation-delay: 0.2s;">
        </div>
        <div
            style="width: 15px; height: 15px; background-color: #0d6efd; border-radius: 50%; animation: bounce 1.4s infinite ease-in-out both; animation-delay: 0.4s;">
        </div>
    </div>
</div> --}}

<script>
    window.addEventListener('load', () => {
        const preloader = document.getElementById('preloader');
        if (!preloader) return;
        // Fade out
        setTimeout(() => {
            preloader.style.transition = 'opacity 0.5s ease';
            preloader.style.opacity = '0';
        }, 1000);
        // Remove from DOM after fade
        setTimeout(() => preloader.remove(), 600);
    });
</script>
