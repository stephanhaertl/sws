<?= snippet('header') ?>
<?php if($page->slug() != "home"): ?>
  <?= snippet('breadcrumb') ?>
<?php endif ?>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2><?= $page->headline()->toString() ?></h2>
          <?= $page->text()->kt() ?>
        </div>

        <div class="row gy-5">

          <?php foreach($page->children() as $child): ?>
          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item">
              <div class="img">
                <img src="<?= $child->image()->toString() ?>" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                  <i class="bi <?= $child->icon()->toString() ?>"></i>
                </div>
                <a href="<?= $child->url() ?>" class="stretched-link">
                  <h3><?= $child->title()->toString() ?></h3>
                </a>
                <?= $child->text()->kt() ?>
              </div>
            </div>
          </div><!-- End Service Item -->
          <?php endforeach ?>

        </div>
      </div>
    </section><!-- End Services Section -->

<?= snippet('footer') ?>
