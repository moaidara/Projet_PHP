<div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Dev Mo</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Connecter-vous</h5>
                    <p class="text-center small">Entrer votre nom d'utilisateur et votre mot de passe</p>
                  </div>

                  <form class="row g-3 needs-validation" action="userMainController.php" method="POST" id="formLogin">


                    <div class="form-group m-b-20">
                      <label for="yourUsername" class="form-label">Nom d'utilisateur</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" id="email" name="email" class="form-control form-control-lg inverse-mode" placeholder="Entrer votre email" required />
                        <div class="invalid-feedback">S'il vous plait entrer le nom de l'utilisateur.</div>
                      </div>
                    </div>

                    <div class="form-group m-b-20">
                      <label for="yourPassword" class="form-label">Mot de passe</label>
                      <input type="password" id="password" name="password"class="form-control form-control-lg inverse-mode" placeholder="Entrer votre mot de passe" required />
                      <div class="invalid-feedback">S'il vous plait ajouter votre mot de passe!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                      </div>
                    </div>
                    <div class="login-buttons">
                    <button class="btn btn-success btn-block btn-lg" name="formLogin" type="submit" id="btnSubmit">Connexion</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Avez-vous un compte? <a href="pages-register.html">Créer un compte</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
