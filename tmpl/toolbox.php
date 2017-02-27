<!-- -*- mode:html -*- -->

<div class="toolbox" id="tb_<?= $script ?>">
  <h2 class="heading"
      id="head_<?= $script ?>"
      onclick="toggle_content(this);">
    <span id="tglind_<?= $script ?>">
      [<?= $boxspec['collapsed'] ? '+' : '-' ?>]
    </span>
    <?php echo $boxspec['title']; ?>
  </h2>
  <div class="content"
       id="content_<?php echo $script; ?>"
       style="display:<?= $boxspec['collapsed'] ? 'none' : 'block' ?>">
    <?php echo $output; ?>
  </div>
</div>
