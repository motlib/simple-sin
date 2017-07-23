<?php

include_once "utils/sensors.php";

function sin_get_sensors($sin, &$context) {
    $context['title'] = "Sensor Readings";

    $context['bme280'] = bme280_get_data();
    
}