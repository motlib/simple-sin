var toggle_content = function(el_h) {
    var el_div = el_h.parentNode.getElementsByTagName('div')[0];

    if(el_div.style.display == 'none')
    {
        el_div.style.display = 'block';
    }
    else
    {
        el_div.style.display = 'none';
    }
}
