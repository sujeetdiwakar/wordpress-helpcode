jQuery(function($){

    $('.js-filters select').on('change',function (){

        var $rating = $('#popularity').val(),
            $cat = $('#cat').val();
        var data = {
          action: 'filter_posts',
          cat:$cat,
          rating:$rating,
        };

        $.ajax({
            url: variables.ajax_url,
            type: 'POST',
            data: data,
            success: function (r) {
                $('.js-content').html(r);
            }

        });

    });

});