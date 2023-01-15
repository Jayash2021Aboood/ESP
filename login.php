<?php
  session_start();
    
  if (isset($_SESSION['user'])) 
  {
    if(isset($_SESSION['userType']))
    {
        if($_SESSION['userType'] == 'a')
            header('Location: admin/index.php');
        else if($_SESSION['userType'] == 'e')
            header('Location: engineer/index.php');
        else if($_SESSION['userType'] == 'c')
            header('Location: customer/index.php');
    }
    header('Location: index.php');
  }
  
  include('includes/lib.php');
  $errors = array();

  $email = "";
  $password = "";
  if(isset($_POST['login']))
  {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if( empty($email))
      $errors[] = "Email is requierd.";

    if( empty($password))
      $errors[] = "Passowrd is requierd.";
    
    if(count($errors) == 0)
    {
      //$logins = loginAdmin($username, $password);
      $logins = select("select * from webuser where email like '$email';");
      if(count($logins) > 0)
      {
        $userType = $logins[0]['usertype'];
        if($userType == 'a')
        {
            $admins = select("select * from admin where email like '$email' and password like '$password';");
            if(count($admins) > 0)
            {
                $_SESSION["userID"] = $admins[0]['id'];
                $_SESSION["user"] = $email;
                $_SESSION["userType"] = 'a';
                $_SESSION['success'] = "Welcome ".$admins[0]['email'];
                header('Location: admin/index.php');
            }
        }
        else if($userType == 'e')
        {
            $engineers = select("select * from engineer where email like '$email' and password like '$password';");
            if(count($engineers) > 0)
            {
                $_SESSION["userID"] = $engineers[0]['id'];
                $_SESSION["user"] = $email;
                $_SESSION["userType"] = 'e';
                $_SESSION['success'] = "Welcome ".$engineers[0]['first_name'] ." ". $engineers[0]['last_name'] ;
                header('Location: engineer/index.php');
            }
        }
        else if($userType == 'c')
        {
            $customers = select("select * from customer where email like '$email' and password like '$password';");
            if(count($customers) > 0)
            {
                $_SESSION["userID"] = $customers[0]['id'];
                $_SESSION["user"] = $email;
                $_SESSION["userType"] = 'c';
                $_SESSION['success'] = "Welcome ".$customers[0]['first_name'] ." ". $customers[0]['last_name'] ;
                header('Location: customer/index.php');
            }
        }
      }
      else
      {
        $_SESSION["message"] = "Email or password not correct!";
        $_SESSION["fail"] = "Email or password not correct!";
        $errors[] = "Email or password not correct!";
      }
      
    }
    else
    {
        $_SESSION["message"] = "We cant found any acount for this email.";
        $_SESSION["fail"] = "We cant found any acount for this email.";
        $errors[] = "We cant found any acount for this email.";
    }

  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin Pro</title>
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
                        <div class="col-lg-5">
                            <!-- Basic login form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Login form-->
                                    <form action="" method="POST">
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="email">Email</label>
                                            <input class="form-control" id="email" name="email" type="email"
                                                placeholder="Enter Email " />
                                        </div>
                                        <!-- Form Group (password)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="password">Password</label>
                                            <input class="form-control" id="password" name="password" type="password"
                                                placeholder="Enter password" />
                                        </div>
                                        <!-- Form Group (remember password checkbox)-->
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" id="rememberPasswordCheck"
                                                    type="checkbox" value="" />
                                                <label class="form-check-label" for="rememberPasswordCheck">Remember
                                                    password</label>
                                            </div>
                                        </div>
                                        <!-- Form Group (login box)-->
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="auth-password-basic.html">Forgot Password?</a>
                                            <button class="btn btn-primary" name="login" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="index.html">Need an account? Sign up!</a>
                                    </div>
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