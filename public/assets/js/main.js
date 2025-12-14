$(document).ready(function () {
    $(window).on('scroll', function () {
        if ($(this).scrollTop() >= 100) {
            $('body').addClass('body-scrolled');
        } else {
            $('body').removeClass('body-scrolled');
        }
    });

    $('.menu-btn').on('click', function () {
        $('.overlayer-menu').toggleClass('show');
        $(this).toggleClass('active');
        $('body').toggleClass('menu-opended');
    });

    $(document).on('click', '.book-btn', function () {
        const slotId = $(this).data('slot-id');
        const bookingUrl = $(this).data('booking-url');
        const date = $('#date-select').val();
        if (!date) {
            alert('Please select a date');
            return;
        }
        $.ajax({
            url: bookingUrl,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                slot_id: slotId,
                date: date,
            },
            success: function (response) {
                if (response.success) {
                    window.location.href = response.redirect_url;
                } else {
                    alert('Slot booking failed');
                }
            }
        })
    })
});