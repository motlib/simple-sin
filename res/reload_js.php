/* -*- mode:javascript -*- */

<?php include_once "../config.php"; ?>

(function($) {
    $(document).ready(function() {
        $.ajaxSetup( {
            cache: false,
        });

<?php foreach($config['boxspecs'] as $script => $spec): ?>
        var refreshId = setInterval(function() {
            $("#content_<?= $script; ?>").load('box.php?script=<?php echo $script; ?>');
        }, <?= $spec['reload_time']; ?>);
<?php endforeach; ?>
    });
})(jQuery);
