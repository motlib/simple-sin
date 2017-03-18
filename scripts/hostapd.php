<?php

include_once 'utils/hostapd.php';

function sin_get_hostapd($sin, &$context) {

    $stations = hostapd_get_stations();

    print('<pre>');
    print_r($stations[0]);
    print('</pre>');

    $context['title'] = 'Access Point Statistics';
    $context['num'] = count($stations);
    $context['stations'] = $stations;
}