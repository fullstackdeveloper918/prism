'use strict';
(function ($) {
    var $trigger = $('.menu-toggle');
    var $mp_menu = $('#opal-canvas-menu');
    // Return early if menuToggle is missing.
    if (!$trigger.length) {
        return;
    }

    if ($mp_menu.length > 0) {
        if ($('#mp-pusher').length < 1) {
            $('#page').wrap('<div class="mp-pusher" id="mp-pusher"></div>');
        }
        $mp_menu.find('ul').wrap('<div class="mp-level"></div>');
        $mp_menu.find('li.menu-item-has-children > a').append('<i class="fa fa-chevron-right trigger"></i>');
        $('<a class="mp-back text-center" href="#"><i class="fa fa-arrow-left"></i></a>').insertBefore($mp_menu.find('ul.sub-menu'));
        $mp_menu.detach().insertAfter('#page');
        $('#page').addClass('scroller');
        new mlPushMenu($mp_menu.get(0), $trigger.get(0), {
            type: 'cover'
        });
    }
})(jQuery);