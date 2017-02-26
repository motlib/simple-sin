/* Function to expand / collape a toolbox when clicking the toolbox
 * heading. */
var toggle_content = function(el_h) {
    // heading id is head_script, so script name starts at char 5
    var scriptname = el_h.id.substring(5);
    
    /* Get content area div tag */
    var el_content = document.getElementById('content_' + scriptname);
    /* Get toggle indicator span tag */
    var el_tglind = document.getElementById('tglind_' + scriptname);

    if(el_content.style.display == 'none') {
        el_content.style.display = 'block';
        el_tglind.innerHTML = '[-]';
    } else {
        el_content.style.display = 'none';
        el_tglind.innerHTML = '[+]';
    }
}
