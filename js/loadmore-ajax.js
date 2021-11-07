(function ($) {
    'use strict';

    //  Eventcon load more button Ajax

    var $loadbutton = $('.loadAjax');

    if ($loadbutton.length) {

        var postNumber = eventconloadajax.postNumber,
            Incr = 0;
        //
        $loadbutton.on('click', function () {


            Incr = Incr + parseInt(postNumber);

            var $button = $(this),
                $data;

            $data = {
                'action': 'eventcon_eventcon_ajax',
                'postNumber': postNumber,
                'postIncrNumber': Incr,
                'elsettings': eventconloadajax.elsettings
            };

            $.ajax({

                url: eventconloadajax.action_url,
                data: $data,
                type: 'POST',


                success: function (data) {

                    $('.eventcon-eventcon-load').html(data);

                    var $container = $('.eventcon-eventcon');

                    $container.isotope('reloadItems').isotope({
                        itemSelector: '.single_gallery_item',
                        percentPosition: true,
                        masonry: {
                            columnWidth: '.single_gallery_item'
                        }
                    });

                    var loaditems = parseInt(Incr) + parseInt(postNumber);

                    if (eventconloadajax.totalitems == loaditems) {
                        $button.hide();
                    }

                }

            });

            return false;

        });


    }


})(jQuery);