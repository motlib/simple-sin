<?php

namespace Motlib\SIN;

use \Motlib\WebFW\PageResponse;
use \Motlib\WebFW\RawResponse;
use \Motlib\WebFW\Template;

class IndexActions {

    public function dispatch_index($context) {

        $data = [
            'boxes' => 't.b.d.',
        ];

        $cfg = $context->getConfig();

        return new PageResponse('hello world!');
    }

    public function dispatch_style($context) {
        $data = [];
        
        $style = Template::render('style.php', $data);
        
        return new RawResponse('text/css', $style);
    }
}