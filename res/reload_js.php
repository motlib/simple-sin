/* -*- mode:javascript -*- */

<?php include_once "../config.php"; ?>

(function($) {
    $(document).ready(function() {
        $.ajaxSetup( {
            cache: false,
//            beforeSend: function() {
//                $('#sysinfo').hide();
//                $('#loading').show();
//            },
//            complete: function() {
//                $('#loading').hide();
//                $('#sysinfo').show();
//            },
//            success: function() {
//                $('#loading').hide();
//                $('#sysinfo').show();
//            }
        });
//        var $container = $("#sysinfo");
//        $container.load("box.php?title=Sysinfo&script=sysinfo");

<?php foreach($config['boxspecs'] as $script => $spec): ?>
        var refreshId = setInterval(function() {
            $("#<?php echo $script; ?>").load('box.php?script=<?php echo $script; ?>');
        }, <?php echo $spec['reload_time']; ?>);
<?php endforeach; ?>
    });
})(jQuery);
