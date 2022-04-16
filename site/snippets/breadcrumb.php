    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?= $page->title()->toString() ?></h2>
          <ol>
          <?php foreach($site->breadcrumb() as $crumb): ?>
            <li>
              <a href="<?= $crumb->url() ?>" <?= e($crumb->isActive(), 'aria-current="page"') ?>>
                <?= html($crumb->title()) ?>
              </a>
            </li>
          <?php endforeach ?>
          </ol>
        </div>

      </div>
    </div>