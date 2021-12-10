<!DOCTYPE html>
<html lang="en">

<?php
      $css = '<link rel="stylesheet" href="./CSS/.header_template1.css">'."\n";
      $titleName = "SIMS CS-Org - Log In";

      include_once './MetaScript/meta.php';

      if (isset($_POST['submit'])){
        
        $password = $_POST['password'];
        $username = $_POST['username'];
        
        if ($userdata=mysqli_fetch_assoc(mysqli_query($db->con,"SELECT * FROM user_tb WHERE username='$username'"))) {
              echo 'test2';
                  if ($userdata['password'] == $password) {
                        $_SESSION['login']= "<p class='success'>Login Successfully</p>";
                        $_SESSION['user'] = $userdata['email'];
                        header("Location:http://localhost/PHP-Codes/BSCS-3-Profiling-System/PHP_Style/admin_page.php?back=1");
                  }else{
                        $_SESSION['error'] = "<p class='error'>Wrong Password</p>";
                  }
                  
            }else{
                  $_SESSION['error'] = "<p class='error'>User Not Registered</p>";
            }   
      }
?>

<body >

      <?php 
            include './SectionTemplate/header_1.php';
      ?>

      <section class="bg-primary" style="height:2rem;">
        <div class="m-5 p-5"></div>
      </section>

<section class="mb-5 pb-5" style="height: auto;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div>

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your Username and Password!</p>

              <form method="post">
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
<?php 
  include_once './SectionTemplate/footer.php';
?>


</body>
</html>