/* -*- mode:javascript -*- */

<?php include_once "../config.php"; ?>

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
    
$( document ).ajaxSend(function( event, request, settings ) {
    var script = getScript(settings.url);
    $("#tglind_" + script).css('color', 'red');
});

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
        setInterval(function() {
            $("#content_<?= $script; ?>").load('box.php?script=<?php echo $script; ?>');
        }, <?= $spec['reload_time']; ?>);
<?php endforeach; ?>
    });
})(jQuery);
