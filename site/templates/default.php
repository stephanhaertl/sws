<?= snippet('header') ?>
<?php if($page->slug() != "home"): ?>
  <?= snippet('breadcrumb') ?>
<?php endif ?>
<section id="hero-animated" class="hero-animated d-flex align-items-center">
  <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">          
          <img src="<?= $page->image()->url() ?>" class="img-fluid animated">                        
    <?= $page->text()->kt() ?>
    <div class="d-flex">
      <a href="<?= $page->buttonLink()->toString() ?>" class="btn-get-started scrollto"><?= $page->buttonText()->toString() ?></a>
      <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
    </div>
  </div>
</section>



<!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container">

        <div class="row gy-4">
        <?php foreach($page->teaser()->toStructure() as $teaser): ?>
          <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi <?= $teaser->icon()->toString() ?> icon"></i></div>
              <h4><a href="<?= $teaser->link()->toString() ?>" class="stretched-link"><?= $teaser->headline()->toString() ?></a></h4>
              <?= $teaser->text()->kt() ?>
            </div>
          </div><!-- End Service Item -->
        <?php endforeach ?>
        </div>

      </div>
    </section><!-- End Featured Services Section -->


    <!-- ======= On Focus Section ======= -->
    <section id="onfocus" class="onfocus">
      <div class="container-fluid p-0" data-aos="fade-up">

        <div class="row g-0">
          <div class="col-lg-6 video-play position-relative">
            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
          </div>
          <div class="col-lg-6">
            <div class="content d-flex flex-column justify-content-center h-100">
              <h3>Voluptatem dignissimos provident quasi corporis</h3>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
              </ul>
              <a href="#" class="read-more align-self-start"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End On Focus Section -->

    

   

    

    <?= snippet('faq', ['data' => $site->faq(), 'headline' => $site->faqHeadline(), 'intro' => $site->faqIntro()]) ?>

    

<?= snippet('footer') ?>
