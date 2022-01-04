      <section class="bg-back">     
            <div class="p-2"></div>
      </section>

      <section >
            <div class="container h-100">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                              <div class="card bg-dark text-white rounded" >
                                    <div class="card-body p-5 text-center">
                                          <div>
                                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                                <p class="text-white-50 mb-5">Please enter your Username and Password!</p>

                                                <form action="./_forms/login_form.php" method="post">
                                                      <div class="form-outline form-white mb-4">
                                                            <input type="text" name="username" class="form-control form-control-lg" required>
                                                            <label class="form-label" >Username</label>
                                                      </div>

                                                      <div class="form-outline form-white mb-4">
                                                            <input type="password" name="password" class="form-control form-control-lg" required>
                                                            <label class="form-label" >Password</label>
                                                      </div>

                                                      <p class="mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                                                      <?php
                                                            if(isset($_SESSION['error'])){
                                                                  echo $_SESSION['error'];
                                                                  unset($_SESSION['error']);
                                                            }
                                                      ?>

                                                      <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Login</button>
                                                </form>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </section>