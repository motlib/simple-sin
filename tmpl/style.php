<?php /* -*- mode:css -*- */

//header('Content-Type: text/css');

//include_once '../cfg/config.php';
//include_once '../cfg/styles.php';

//$style = $styles[$config['web']['style']];

?>

/* Styles for general page elements. */

body {
    
    font-family: Calibry, sans-serif;
    color: <?= $style['text-color'] ?>;
    background-color: <?= $style['background-color'] ?>;
}

h1 {
    font-size: 10pt;
    font-weight: bold;
}

/* Developer info footer */
p.devinfo {
    font-size: 8pt;
    color: gray;
    text-align: center;
}


/* Toolbox styles */

.toolbox {
    font-size: <?= $config['web']['fontsize'] ?>;
    margin-top: 5pt;
    border: 2pt solid <?= $style['border-color'] ?>;
}

.toolbox .heading {
    font-size: <?= $config['web']['fontsize'] ?>;
    background-color: <?= $style['head-color'] ?>;
    padding: 2px;
    margin: 0;
}

.toolbox:hover {
    border-color: <?= $style['border-hover-color'] ?>;
}

.toolbox .content {
    padding: 2pt
}

.toolbox .content  pre {
    margin: 0;
    overflow: auto;
}

.toolbox .content p {
    margin: 2pt;
}

/* Styles for data tables */

.datatable, .datatable * th, .datatable * td {
    font-size: <?= $config['web']['fontsize'] ?>;
    border-collapse: collapse;
    border: 1px solid gray;
}

.datatable * th, .datatable * td {
    padding: 1.5pt;
}
