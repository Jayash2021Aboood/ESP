<?php
  session_start();

  include('../../includes/lib.php');
  include_once('../../includes/engineer.php');
  checkAdminSession();

  $pageTitle = "Edit Engineer";
  //$row = new Engineer(null);
   $id =  $first_name =  $last_name =  $email =  $password =  $specialty =  $cv =  $date_of_birth =  $phone =  $state = "";
  //$id = $name = $manager = $managerPhone = $agent = $agentPhone = $kindergarten = $earlyChildhood = $elementary = $intermediate = $secondary = $active = "";
  include('../../template/header.php'); 
  $errors = array();


  if ($_SERVER['REQUEST_METHOD'] === 'GET') 
  {
    if(isset($_GET['id']))
    {
      $_SESSION["message"] = '';
      $id = $_GET['id'];
      $result = getEngineerById($id);

      if( count( $result ) > 0)
      {
        $row = $result[0];
        $id = $row['id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $password = $row['password'];
        $specialty = $row['specialty'];
        $cv = $row['cv'];
        $date_of_birth = $row['date_of_birth'];
        $phone = $row['phone'];
        $state = $row['state'];
      }
      else
      {
        $_SESSION["message"] = ' There is No data for this id';
        $_SESSION["fail"] = ' There is No data for this id';
      }

    }
    else
    {
      $_SESSION["message"] = 'No data for display';
      $_SESSION["fail"] = 'No data for display';
      
    }
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') 
  {
    if(isset($_POST['updateEngineer']))
    {
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $specialty = $_POST['specialty'];
        $cv = $_POST['cv'];
        $date_of_birth = $_POST['date_of_birth'];
        $phone = $_POST['phone'];
        $state = $_POST['state'];
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
      if( empty($specialty)){
        $errors[] = "<li>Specialty is requierd.</li>";
        $_SESSION["fail"] .= "<li>Specialty is requierd.</li>";
        }
      if( empty($cv)){
        $errors[] = "<li>CV is requierd.</li>";
        $_SESSION["fail"] .= "<li>CV is requierd.</li>";
        }
      if( empty($date_of_birth)){
        $errors[] = "<li>Date of Birth is requierd.</li>";
        $_SESSION["fail"] .= "<li>Date of Birth is requierd.</li>";
        }
      if( empty($phone)){
        $errors[] = "<li>Phone is requierd.</li>";
        $_SESSION["fail"] .= "<li>Phone is requierd.</li>";
        }
      if( empty($state)){
        $errors[] = "<li>State is requierd.</li>";
        $_SESSION["fail"] .= "<li>State is requierd.</li>";
        }
      
      if(count($errors) == 0)
      {

        $result = getEngineerById($id);
        if( count( $result ) > 0)
          $row = $result[0];
        
        $update = updateEngineer( $id,  $first_name,  $last_name,  $email,  $password,  $specialty,  $cv,  $date_of_birth,  $phone,  $state, );
        if($update ==  true)
        {
  
          $_SESSION["message"] = "Engineer Updated successfuly!";
          $_SESSION["success"] = "Engineer Updated successfuly!";
          header('Location:'. $PATH_ADMIN_ENGINEER .'index.php');
          exit();
        }
        else
        {
          $_SESSION["message"] = "Error when Update Data";
          $_SESSION["fail"] = "Error when Update Data";
          $errors[] = "Error when Update Data";
        }
        
      }
      else
      {
      }
  
    }
  }
?>

<?php include('../../template/startNavbar.php'); ?>


<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fa fa-school"></i></div>
                            Edit Engineer
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="index.php">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Back to Engineers List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-12">
                <!-- Engineer details card-->
                <div class="card mb-4">
                    <div class="card-header">Engineer Details </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
                                <!-- Form Group (first_name)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="first_name">First Name</label>
                                    <input class="form-control" id="first_name" name="first_name" type="text"
                                        placeholder="First Name" value="<?php echo $first_name;?>" required />
                                </div>
                                <!-- Form Group (last_name)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="last_name">Last Name</label>
                                    <input class="form-control" id="last_name" name="last_name" type="text"
                                        placeholder="Last Name" value="<?php echo $last_name;?>" required />
                                </div>
                                <!-- Form Group (email)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="email">Email</label>
                                    <input class="form-control" id="email" name="email" type="text" placeholder="Email"
                                        value="<?php echo $email;?>" required />
                                </div>
                                <!-- Form Group (password)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="password">Password</label>
                                    <input class="form-control" id="password" name="password" type="text"
                                        placeholder="Password" value="<?php echo $password;?>" required />
                                </div>
                                <!-- Form Group (specialty)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="specialty">Specialty</label>
                                    <input class="form-control" id="specialty" name="specialty" type="text"
                                        placeholder="Specialty" value="<?php echo $specialty;?>" required />
                                </div>
                                <!-- Form Group (cv)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="cv">CV</label>
                                    <input class="form-control" id="cv" name="cv" type="text" placeholder="CV"
                                        value="<?php echo $cv;?>" required />
                                </div>
                                <!-- Form Group (date_of_birth)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="date_of_birth">Date of Birth</label>
                                    <input class="form-control" id="date_of_birth" name="date_of_birth" type="text"
                                        placeholder="Date of Birth" value="<?php echo $date_of_birth;?>" required />
                                </div>
                                <!-- Form Group (phone)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="phone">Phone</label>
                                    <input class="form-control" id="phone" name="phone" type="text" placeholder="Phone"
                                        value="<?php echo $phone;?>" required />
                                </div>
                                <!-- Form Group (state)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="state">State</label>
                                    <select class="form-select" name="state" id="state" required>
                                        <option <?php if($state == "request") echo "selected";?> value="request">Request
                                        </option>
                                        <option <?php if($state == "reject") echo "selected";?> value="reject"> Reject
                                        </option>
                                        <option <?php if($state == "accept") echo "selected";?> value="accept"> Accept
                                        </option>
                                    </select>
                                    <!-- <input class="form-control" id="state" name="state" type="text" placeholder="State"
                                        value="<?php //echo $state;?>" required /> -->
                                </div>

                            </div>
                            <!-- Submit button-->
                            <button name="updateEngineer" class="btn btn-success" type="submit">Save</button>
                            <a href="index.php" class="btn btn-danger" type="button">Back To List</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include('../../template/footer.php'); ?>