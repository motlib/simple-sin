<?php 

function sin_get_debug($sin, &$context) {
    $context['title'] = 'Debug Info';

    $total = 0;
    foreach($sin->times as $name => $time) {
        $total += $time;
    }

    $sin->times['total'] = $total;
    
    $context['times'] = $sin->times;
}

