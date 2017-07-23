<?php /* -*- mode:html coding:utf-8 -*- */ ?>

<p>
Temperature: <?= fmt_bold(fmt_sig($bme280['temperature'], 3)) ?>&#x2103;,
Humidity: <?= fmt_bold(fmt_sig($bme280['humidity'], 3)) ?>%
Pressure: <?= fmt_bold(fmt_sig($bme280['pressure'], 6)) ?>hPa
</p>
