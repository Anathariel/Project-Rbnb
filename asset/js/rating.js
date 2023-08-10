$(document).ready(function () {
    // Default star path
    let emptyStar = $('.rating-stars').data('empty-star');
    $('.star-label').css('background-image', 'url(' + emptyStar + ')');

    // Hover effect
    $('.star-label').hover(
        function () {
            let rating = $(this).data('rating');
            let fullStar = $('.rating-stars').data('full-star');
            $('.star-label').each(function (index) {
                if (index < rating) {
                    $(this).css('background-image', 'url(' + fullStar + ')');
                } else {
                    $(this).css('background-image', 'url(' + emptyStar + ')');
                }
            });
        },
        function () {
            // Reset stars to initial state
            $('.star-label').css('background-image', 'url(' + emptyStar + ')');
            $('.star-checked').css('background-image', 'url(' + $('.rating-stars').data('full-star') + ')');
        }
    );

    // Click event
    $('.star-label').on('click', function () {
        let rating = $(this).data('rating');
        let fullStar = $('.rating-stars').data('full-star');
        $('.star-label').removeClass('star-checked');
        $('.star-label').each(function (index) {
            if (index < rating) {
                $(this).addClass('star-checked');
                $(this).css('background-image', 'url(' + fullStar + ')');
            } else {
                $(this).css('background-image', 'url(' + emptyStar + ')');
            }
        });
    });
});