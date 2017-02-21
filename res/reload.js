/**
 * Function to be called in onload event to set up automatic page
 * reloading.
 */
//var setup_reload = function(reload_time) {
//    if(reload_time != 0) {
        //setTimeout(
        //    'location.reload(true);',
        //    1000 * reload_time);
//    }
//}


(function($) {
    $(document).ready(function() {
        $.ajaxSetup( {
            cache: false,
            beforeSend: function() {
//                $('#sysinfo').hide();
//                $('#loading').show();
            },
            complete: function() {
//                $('#loading').hide();
//                $('#sysinfo').show();
            },
            success: function() {
//                $('#loading').hide();
//                $('#sysinfo').show();
            }
        });
        var $container = $("#sysinfo");
        $container.load("box.php?title=Sysinfo&script=sysinfo");
        var refreshId = setInterval(function() {
            $container.load('box.php?title=Sysinfo&script=sysinfo');
        }, 9000);
    });
})(jQuery);
