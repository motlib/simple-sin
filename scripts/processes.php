<?php
include_once 'utils/cmd.php';

function sin_get_processes($sin, &$context) {
    $context['title'] = 'Processes';

    $context['process_list'] = get_cmd_output('ps aux');
}
