<?php
  session_start();

  include('../../includes/lib.php');
  include_once('../../includes/webuser.php');
  checkAdminSession();

  $pageTitle = "Edit WebUser";
  //$row = new WebUser(null);
   $id =  $email =  $usertype = "";
  //$id = $name = $manager = $managerPhone = $agent = $agentPhone = $kindergarten = $earlyChildhood = $elementary = $intermediate = $secondary = $active = "";
  include('../../template/header.php'); 
  $errors = array();


  if ($_SERVER['REQUEST_METHOD'] === 'GET') 
  {
    if(isset($_GET['id']))
    {
      $_SESSION["message"] = '';
      $id = $_GET['id'];
      $result = getWebUserById($id);

      if( count( $result ) > 0)
      {
        $row = $result[0];
        $id = $row['id'];
        $email = $row['email'];
        $usertype = $row['usertype'];
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
    if(isset($_POST['updateWebUser']))
    {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $usertype = $_POST['usertype'];
      if( empty($email)){
        $errors[] = "<li>Email is requierd.</li>";
        $_SESSION["fail"] .= "<li>Email is requierd.</li>";
        }
      if( empty($usertype)){
        $errors[] = "<li>User Type  is requierd.</li>";
        $_SESSION["fail"] .= "<li>User Type  is requierd.</li>";
        }
      
      if(count($errors) == 0)
      {

        $result = getWebUserById($id);
        if( count( $result ) > 0)
          $row = $result[0];
        
        $update = updateWebUser( $id,  $email,  $usertype, );
        if($update ==  true)
        {
  
          $_SESSION["message"] = "WebUser Updated successfuly!";
          $_SESSION["success"] = "WebUser Updated successfuly!";
          header('Location:'. $PATH_ADMIN_WEBUSER .'index.php');
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
                            Edit WebUser
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="index.php">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Back to WebUsers List
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
                <!-- WebUser details card-->
                <div class="card mb-4">
                    <div class="card-header">WebUser Details </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
                                <!-- Form Group (email)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="email">Email</label>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Email"
                                        value="<?php echo $email;?>" required />
                                </div>
                                <!-- Form Group (usertype)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="usertype">User Type </label>
                                    <input class="form-control" id="usertype" name="usertype" type="text" placeholder="User Type "
                                        value="<?php echo $usertype;?>" required />
                                </div>
 
                            </div>
                            <!-- Submit button-->
                            <button name="updateWebUser" class="btn btn-success" type="submit">Save</button>
                            <a href="index.php" class="btn btn-danger" type="button">Back To List</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include('../../template/footer.php'); ?>

