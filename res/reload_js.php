/* -*- mode:javascript -*- */

<?php include_once '../cfg/config.php'; ?>

/* Extract the script name from the ajax request URL. Used to
 * associate a ajax request event with a toolbox being updated. */
var getScript = function(url) {
    var regex = /script=([^&]+)/;

    m = url.match(regex);
    
    if(m != null) {
        return m[1];
    }
    else
    {
        return null;
    }
}

/* Register 'ajaxSend' event handler. Fires when an ajax request is
 * started. */
$( document ).ajaxSend(function( event, request, settings ) {
    var script = getScript(settings.url);
    $("#tglind_" + script).css('color', 'red');
});

/* Register 'ajaxComplete' event handler. Fires when an ajax request
 * is completed. */
$( document ).ajaxComplete(function( event, request, settings ) {
    var script = getScript(settings.url);
    $("#tglind_" + script).css('color', 'black');
});    


(function($) {
    $(document).ready(function() {
        $.ajaxSetup( {
            cache: false,
        });

<?php foreach($config['boxspecs'] as $script => $spec): ?>
<?php if($spec['reload_time'] == 0) continue; ?>
        setInterval(function() {
            $("#content_<?= $script; ?>").load('box.php?script=<?php echo $script; ?>');
        }, <?= $spec['reload_time']; ?>);
<?php endforeach; ?>
    });
})(jQuery);
