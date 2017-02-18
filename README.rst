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

Clone the repository into some directory accessible by the web server,
e.g. to ``/var/www/html/sin``. The you can access the web page from
the browser as ``http://HOSTNAME/sin``.


Development
===========

Adding more information
-----------------------

If you want to add more information, you need to place a php script
into the ``scripts`` directory and add the name of the script and a
title to the ``boxspecs`` structure in the ``config.php`` file.
