<?php

include_once 'utils/render.php';
include_once 'cfg/config.php';

/* These includes are also available in all templates and scripts. So
 * this is for convenience. */
include_once 'utils/style.php';
include_once 'utils/format.php';

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
        $this->setConfigDefaults();
    }

    
    /**
     * Set default values for some config elements.
     */
    protected function setConfigDefaults() {
        $boxspec_defaults = array(
            'collapsed' => false,
            'reload_time' => 0,
        );
        
        /* Set default values in config. */
        foreach($this->cfg['boxspecs'] as &$boxspec) {
            $boxspec = array_merge($boxspec_defaults, $boxspec);
        }

        $web_defaults = array(
            'debug' => false,
            'fontsize' => '10pt',
            'style' => 'default',
        );

        $this->cfg['web'] = array_merge($web_defaults, $this->cfg['web']);
    }

    
    /**
     * Set up debugging functions.
     */
    protected function setupDebug() {
        if($this->cfg['web']['debug']) {

            /* Configure error messages used for debugging. */
            error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
            ini_set("display_errors", 1);
        }
    }


    protected function render_script($script, &$context) {

        /* Update context with script specific data by including the
         * script and calling the sin_get_$script function. */
        $res = include_once "scripts/$script.php";
        
        if($res != true) {
            $context['output'] = "<p>ERR: Script '$script' not found.</p>";
            $context['title'] = 'ERROR';
        } else {
            $fname = "sin_get_$script";
            if(!function_exists($fname)) {
                $context['output'] = "<p>ERR: Function '$fname' not defined in script.</p>";
                $context['title'] = 'ERROR';
            } else {
                
                $fname($this, $context);
            
                $output = render("tmpl/${script}.php", $context);

                $context['output'] = $output;
            }
        }
    }

    
    /**
     * Render a toolbox with the given title. $script is rendered and put
     * as content into the toolbox.
     */
    function render_box($script, $with_toolbox=true) {
        $t_start = microtime();
        
        $boxspec = $this->cfg['boxspecs'][$script];
        
        $context = array(
            'sin' => $this,
            'script' => $script,
            'boxspec' => $boxspec,
            'config' => $this->cfg,
        );


        $this->render_script($script, $context);
        
        /* Render the toolbox */
        if($with_toolbox == false) {
            echo $context['output'];
        } else {
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
