<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth">
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left p-5">
            <div class="brand-logo">
              <img src="<?php echo KAYNAK; ?>yonetici/assets/images/logo.svg">
            </div>
            <h4>Merhaba, Hoşgeldiniz</h4>

            <h6 class="font-weight-light">Lütfen Giriş Yapınız</h6>
            <form id="giris_form">
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="kuladi" placeholder="Kullanıcı Adı " />
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-lg" name="sifre" placeholder="Şifre" />
              </div>
              <div class="mt-3">
                <input class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn text-white" value="Giriş Yap" type="submit">
              </div>
              <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                </div>
                <a href="#" class="auth-link text-black">Forgot password?</a>
              </div>
              <div class="mb-2">
                <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                  <i class="mdi mdi-facebook me-2"></i>Connect using facebook </button>
              </div>
              <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.html" class="text-primary">Create</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?php echo KAYNAK; ?>yonetici/assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->