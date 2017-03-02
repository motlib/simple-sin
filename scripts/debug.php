<?php 

function sin_get_debug($sin, &$context) {
    $context['total_time'] = $sin->get_total_time();
}

