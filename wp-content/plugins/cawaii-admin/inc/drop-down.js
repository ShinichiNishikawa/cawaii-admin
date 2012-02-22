jQuery(function($) {
    // Global menu
    jQuery('#colog-admin-nav li').hover(function() {
        jQuery(this).addClass('hover');
    }, function() {
        jQuery(this).removeClass('hover');
    });

    var eachTimeout = [],
        target = jQuery('#colog-admin-nav ul');

    target.each(function(i) {
        var $this = $(this);
        $this.parent().hover(function() {
            target.hide();
            for ( var i=0; i<eachTimeout.length; i++ ) {
                clearTimeout(eachTimeout[i]);
            }
            $this.show();
        }, function() {
            eachTimeout[i] = setTimeout(function() {
                $this.hide();
            }, 500); // length before hiding after cursle out
        });
    });
});
jQuery.noConflict();