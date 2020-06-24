<div class="main d-flex" role="main">
  <section class="section section-login border-0 m-0">
    <div class="container">
      <div class="row py-5">
        <div class="col py-5">
          <?php if ($this->session->flashdata('message') != null): ?>
            <div class="" id="message">
              <?= $this->session->flashdata('message') ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
</div>
