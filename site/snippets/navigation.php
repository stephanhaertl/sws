<nav id="navbar" class="navbar">
  <ul>
  <?php
    $items = $pages->listed();    
    if($items->isNotEmpty()):
  ?>
        <?php foreach($items as $item): ?>
        <li><a<?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a></li>
        <?php endforeach ?>
    <?php endif ?>    
  </ul>
  <i class="bi bi-list mobile-nav-toggle d-none"></i>
</nav><!-- .navbar -->
