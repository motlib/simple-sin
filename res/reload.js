/**
 * Function to be called in onload event to set up automatic page
 * reloading.
 */
var setup_reload = function(reload_time) {
    if(reload_time != 0) {
        setTimeout(
            'location.reload(true);',
            1000 * reload_time);
    }
}
