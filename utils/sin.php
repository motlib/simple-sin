<?php

include_once 'utils/render.php';
include_once 'cfg/config.php';
include_once 'utils/style.php';

class Sin
{
    /* Configuration structure from config file. */
    public $cfg = NULL;

    /* List of timing measurements. */
    public $times = array();

    /**
     * Initialize SIN.
     */
    public function __construct() {
        global $config;
        
        $this->cfg = $config;

        $this->setupDebug();
        
        /* Set default values in config. */
        foreach($this->cfg['boxspecs'] as &$boxspec) {
            if(!array_key_exists('collapsed', $boxspec)) {
                $boxspec['collapsed'] = false;
            }
        }
    }

    /**
     * Set up debugging functions.
     */
    protected function setupDebug() {
        if($this->cfg['web']['debug']) {

            /* Configure error messages used for debugging. */
            error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
            ini_set("display_errors", 1);
            
            /* Add the internal debugging output box. */
            $this->cfg['boxspecs']['debug'] = array(
                'title' => 'Debug Box',
                'reload_time' => 0,
                'new' => true);
        }
    }


    /**
     * Render a toolbox with the given title. $script is rendered and put
     * as content into the toolbox.
     */
    function render_box($script, $with_toolbox=true) {
        $t_start = microtime();
        
        $boxspec = $this->cfg['boxspecs'][$script];
        
        include_once "scripts/$script.php";

        $context = array('sin' => $this);

        $fname = "sin_get_$script";
        
        $fname($this, $context);
        
        $scriptout = render(
            "tmpl/${script}.php",
            $context);

        /* Render the toolbox */
        if($with_toolbox == false) {
            echo $scriptout;
        } else {
            $context = array(
                'script' => $script,
                'title' => $this->cfg['boxspecs'][$script]['title'],
                'boxspec' => $this->cfg['boxspecs'][$script],
                'output' => $scriptout,
                'config' => $this->cfg,
            );

            display('tmpl/toolbox.php', $context);
        }

        /* Store box processing time in ms. */
        $this->times[$script] = 1000 * (microtime() - $t_start);
    }

    /**
     * Render all toolboxes described in the boxspecs structure (list of
     * title, script pairs).
     */
    public function render_boxes() {
        $boxspecs = $this->cfg['boxspecs'];
        
        foreach($boxspecs as $script => $spec) {
            $this->render_box($script, true);
        }
    }
}
