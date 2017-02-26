<!-- -*- mode:html -*- -->

<div class="toolbox">
  <h2 class="heading" id="head_<?= $script ?>" onclick="toggle_content(this);">
    <span id="tglind_<?= $script ?>">[-]</span> <?php echo $boxspec['title']; ?>
  </h2>
  <div class="content" id="content_<?php echo $script; ?>">
    <?php echo $output; ?>
  </div>
</div>
