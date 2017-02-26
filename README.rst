==========
Simple SIN
==========

Simple SIN is a small web app written in PHP to display system
information.

I created it to show information from a few Raspberry and Orange PI
computers.


License
=======

GNU General Public License v2.0 or newer. See LICENSE file
for details.


Requirements
============

A web server like apache or nginx and PHP. 


Setup
=====

I assume that the web server is already set up to serve php files. Then:

* Clone the repository into some directory accessible by the web
  server. E.g. for Ubuntu-style OS clone to ``/var/www/html/sin``::

    git clone https://github.com/motlib/simple-sin sin

* Copy the ``config-sample.php`` to ``config.php`` and adjust the
  settings to your preference.

* Now you can access the web page from the browser as
  ``http://HOSTNAME/sin``.


Development
===========

Adding New Infoboxes
--------------------

If you want to add futher boxes to show on the page, you need to place
a php script into the ``scripts`` directory. Here's a small example
for showing OrangePi Zero related information::

  <?php /* -*- mode:html -*- */

   /**
    * OrangePi Zero specific data
    */
   
   include_once 'utils/orangepi_zero.php';
   include_once 'utils/format.php';
   
   $info = orangepi_zero_get_info();
   ?>
   
   <p>
     CPUs running at
     <?= fmt_bold($info['freq_s']) ?>.
     SOC temperature is
     <?= get_html_color($info['soc_temp_s'], $info['soc_temp_pct']) ?>.
   </p>

You can also have a look at the other scripts in this directory for
examples.

Then add the name of the script and a title to the ``boxspecs``
structure in the ``config.php`` file and the output of the script
should show up on the webpage.

The design idea is to keep the files in the ``scripts`` directory as
simple as possible and mostly containing HTML code. Gathering of
system information and processing should be implemented in scripts in
the ``utils`` folder. 
