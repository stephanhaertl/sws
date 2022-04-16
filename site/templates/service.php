<?= snippet('header') ?>
  <?= snippet('breadcrumb') ?>

    <!-- ======= Services Section ======= -->
<section id="service-details" class="portfolio-details">
  <div class="container" data-aos="fade-up">

    <div class="row gy-4">

      <div class="col-lg-8">
        <div class="portfolio-details-slider swiper">
          <div class="swiper-wrapper align-items-center">

            <div class="swiper-slide">
              <img src="<?= $page->image()->url() ?>" alt="">
            </div>

            <?php foreach($page->slider()->toStructure() as $item): ?>
              <div class="swiper-slide">
                <img src="<?= $item->image()->toFile()->url() ?>" alt="">
              </div>
            <?php endforeach ?>

          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="portfolio-description">
          <h2><?= $page->title()->toString() ?></h2>
          <?= $page->text()->kt() ?>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Portfolio Details Section --><!-- End Services Section -->

<?= snippet('footer') ?>
