<?php 
include_once 'utils/storage.php';

function sin_get_storage($sin, &$context) {
    $context['title'] = 'Storage';
    
    $stinfo = storage_get_info();

    foreach($sin->cfg['storage']['mount_points'] as $mp) {
        $mpinfo = $stinfo[$mp];

        $mpinfo['mountpoint'] = $mp;
        $mpinfo['pct'] = $mpinfo['used'] / $mpinfo['size'];

        $mpinfos[] = $mpinfo;
    }

    $context['mpinfos'] = $mpinfos;
}
