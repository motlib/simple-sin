<?php

function sin_get_hostlist($sin, &$context) {
    $context['title'] = 'Host List';
    $context['hosts'] = $context['boxspec']['hosts'];
}