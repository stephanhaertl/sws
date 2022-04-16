    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container-fluid" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
            <div class="content px-xl-5">
              <h3><?= $headline->toString() ?></h3>
              <?= $intro->kt() ?>
            </div>
            <div class="accordion accordion-flush px-xl-5" id="faqlist">
            <?php $cnt = 1; ?>
            <?php foreach($data->toStructure() as $item): ?>
              <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?= $cnt ?>">
                    <i class="bi bi-question-circle question-icon"></i>
                    <?= $item->question()->toString() ?>
                  </button>
                </h3>
                <div id="faq-content-<?= $cnt ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                  <?= $item->answer()->kt() ?>
                  </div>
                </div>
              </div><!-- # Faq item-->
              <?php $cnt++; ?>
            <?php endforeach ?>
            </div>
          </div>
          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("dist/img/faq.jpg");'>&nbsp;</div>
        </div>
      </div>
    </section><!-- End F.A.Q Section -->