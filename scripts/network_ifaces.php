<pre><?php
include_once 'utils/cmd.php';

foreach($config['network']['ifaces'] as $iface) {
    echo trim(get_cmd_output("ifconfig $iface"));
    echo "\n\n";
}


?></pre>
