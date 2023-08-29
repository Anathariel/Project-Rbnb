// Attend que le document soit prêt
$(document).ready(function () {
    // Chemin par défaut de l'étoile vide
    let emptyStar = $('.rating-stars').data('empty-star');
    
    // Applique l'image d'étoile vide aux étiquettes d'étoiles
    $('.star-label').css('background-image', 'url(' + emptyStar + ')');

    // Effet de survol sur les étoiles
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
            // Réinitialise les étoiles à leur état initial
            $('.star-label').css('background-image', 'url(' + emptyStar + ')');
            $('.star-checked').css('background-image', 'url(' + $('.rating-stars').data('full-star') + ')');
        }
    );

    // Événement de clic sur les étoiles
    $('.star-label').on('click', function () {
        let rating = $(this).data('rating');
        let fullStar = $('.rating-stars').data('full-star');
        
        // Supprime la classe 'star-checked' de toutes les étiquettes d'étoiles
        $('.star-label').removeClass('star-checked');
        
        // Modifie les étiquettes d'étoiles en fonction de la note sélectionnée
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
