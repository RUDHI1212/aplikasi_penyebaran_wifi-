
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row" >
              <div class="col-lg d-none d-lg-block gambarlogin"></div>
              <div class="col-lg">

                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h1 text-gray-700 mb-4">Welcome Back <br> Kantin Online SMK Negeri 11 Bandung</h1>
                  </div>
                                    
                    <form method="POST" action="<?= base_url()?>auth/login">

                    <div class="form-group">
                      <input id="username" name="username"  type="text" class="form-control form-control-user" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <input id="password" name="password" type="password" class="form-control form-control-user"  placeholder="Password" required>
                    </div>
                    <div class="form-group">


                    </div>
<!--                     <a href="index.html" class="btn btn-primary btn-user btn-block">
                      Login
                    </a> -->
                  <button class="btn btn-primary btn-user btn-block" name="submit" id="btn-login" type="submit">
                    Masuk
                  </button>

                  </form>
                    <hr>
                      <div class="text-center">
                      <a class="small" href="forgot-password.html">Forgot Password?</a>
                      </div>
                      <div class="text-center">
                      <a class="small" href="register.html">Create an Account!</a>
                    </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/bootstrap3');?> /vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/bootstrap3');?> /vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/bootstrap3');?> /vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/bootstrap3');?> /js/sb-admin-2.min.js"></script>

</body>

</html>
