<?= snippet('header') ?>
<?= snippet('breadcrumb') ?>

<?php foreach ($page->children()->listed() as $comment): ?>
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-out">

        <div class="row g-5">

          <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
            <h3><?= $comment->title() ?> <small>by <?= $comment->user() ?></small></h3>
            <p><?= $comment->text() ?></p>
            <a class="cta-btn align-self-start" href="<?= $comment->url() ?>">Ansehen</a>
          </div>

          <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
            
          </div>

        </div>

      </div>
    </section>
<?php endforeach ?>



<?= snippet('footer') ?>
