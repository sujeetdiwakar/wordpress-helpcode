jQuery(function($){

    $('.js-drop select').on('change',function (){

        var $rating = $('#js-rating').val(),
            $cat = $('#js-cat').val();
        var data = {
            action: 'filter_posts',
            cat:$cat,
            rating:$rating,
        };

        $.ajax({
            url: object.ajaxurl,
            type: 'POST',
            data: data,
            success: function (r) {
                $('.js-posts').html(r);
            }

        });

    });
});