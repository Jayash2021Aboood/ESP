<?php
  session_start();
  include('includes/lib.php');
   
  $errors = array();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') 
  {
    if(isset($_POST['createAccount']))
    {

      $first_name = $_POST['first_name'];

      $last_name = $_POST['last_name'];

      $email = $_POST['email'];

      $password = $_POST['password'];

      $confirm_password = $_POST['confirm_password'];

      $specialty = $_POST['specialty'];

      $cv = uploadImage('cv',DIR_PHOTOES);

      $date_of_birth = $_POST['date_of_birth'];

      if( empty($first_name)){
        $errors[] = "<li>First Name is requierd.</li>";
        $_SESSION["fail"] .= "<li>First Name is requierd.</li>";
        }
      if( empty($last_name)){
        $errors[] = "<li>Last Name is requierd.</li>";
        $_SESSION["fail"] .= "<li>Last Name is requierd.</li>";
        }
      if( empty($email)){
        $errors[] = "<li>Email is requierd.</li>";
        $_SESSION["fail"] .= "<li>Email is requierd.</li>";
        }
      if( empty($password)){
        $errors[] = "<li>Password is requierd.</li>";
        $_SESSION["fail"] .= "<li>Password is requierd.</li>";
        }

      if( empty($confirm_password)){
        $errors[] = "<li>confirm_password is requierd.</li>";
        $_SESSION["fail"] .= "<li>confirm_password is requierd.</li>";
        }

      if( $password != $confirm_password ){
        $errors[] = "<li>passwords must be matched </li>";
        $_SESSION["fail"] .= "<li>passwords must be matched </li>";
        }
        
      if( empty($specialty)){
        $errors[] = "<li>specialty is requierd.</li>";
        $_SESSION["fail"] .= "<li>specialty is requierd.</li>";
        }

      if( empty($cv)){
        $errors[] = "<li>cv is requierd.</li>";
        $_SESSION["fail"] .= "<li>cv is requierd.</li>";
        }

      if( empty($date_of_birth)){
        $errors[] = "<li>date_of_birth is requierd.</li>";
        $_SESSION["fail"] .= "<li>date_of_birth is requierd.</li>";
        }

      if(count($errors) == 0)
      {
        
        $webUser = addWebUser($email,'e');
        if($webUser == true)
        {
            $add = addEngineer( $first_name, $last_name, $email, $password, $specialty, $cv, $date_of_birth);
            if($add ==  true)
            {
                $engineers = select("select * from engineer where email like '$email' and password like '$password';");
                if(count($engineers) > 0)
                {
                    $_SESSION["userID"] = $engineers[0]['id'];
                    $_SESSION["user"] = $email;
                    $_SESSION["userType"] = 'e';
                    $_SESSION['success'] = "Welcome ".$engineers[0]['first_name'] ." ". $engineers[0]['last_name'] ;
                    
                    header('Location: engineer/index.php');
                    exit();
                }
            }
            else
            {
                $_SESSION["message"] = "Error when Adding Data";
                $_SESSION["fail"] = "Error when Adding Data";
                $errors[] = "Error when Adding Data";
            }
        }
        
      }
  
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin Pro</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements="" defer=""
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <!-- Basic registration form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Registration form-->
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <!-- Form Row-->
                                        <div class="row gx-3">
                                            <div class="col-md-6">
                                                <!-- Form Group (first name)-->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="inputFirstName">First Name</label>
                                                    <input class="form-control" id="inputFirstName" name="first_name"
                                                        type="text" placeholder="Enter first name" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Form Group (last name)-->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="inputLastName">Last Name</label>
                                                    <input class="form-control" id="inputLastName" name="last_name"
                                                        type="text" placeholder="Enter last name" required />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Form Group (email address)            -->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control" id="inputEmailAddress" type="email"
                                                aria-describedby="emailHelp" placeholder="Enter email address"
                                                name="email" required />
                                        </div>
                                        <!-- Form Row    -->
                                        <div class="row gx-3">
                                            <div class="col-md-6">
                                                <!-- Form Group (password)-->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="inputPassword">Password</label>
                                                    <input class="form-control" id="inputPassword" type="password"
                                                        placeholder="Enter password" name="password" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Form Group (confirm password)-->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="inputConfirmPassword">Confirm
                                                        Password</label>
                                                    <input class="form-control" id="inputConfirmPassword"
                                                        type="password" placeholder="Confirm password"
                                                        name="confirm_password" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gx-3">
                                            <!-- Form Group (specialty)-->
                                            <div class="col-md-6 mb-3">
                                                <label class="small mb-1" for="specialty">Specialty</label>
                                                <input class="form-control" id="specialty" name="specialty" type="text"
                                                    placeholder="Specialty" value="" required />
                                            </div>
                                            <!-- Form Group (cv)-->
                                            <div class="col-md-6 mb-3">
                                                <label class="small mb-1" for="cv">CV</label>
                                                <input class="form-control" id="cv" name="cv" type="file"
                                                    placeholder="CV" value="" required />
                                            </div>
                                            <!-- Form Group (date_of_birth)-->
                                            <div class="col-md-6 mb-3">
                                                <label class="small mb-1" for="date_of_birth">Date of Birth</label>
                                                <input class="form-control" id="date_of_birth" name="date_of_birth"
                                                    type="Date" placeholder="Date of Birth" value="" required />
                                            </div>
                                        </div>
                                        <!-- Form Group (create account submit)-->
                                        <button name="createAccount" class="btn btn-success" type="submit">Create
                                            Account</button>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer-admin mt-auto footer-dark">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright © Your Website 2021</div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a>
                            ·
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>