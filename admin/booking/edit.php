<?php
  session_start();

  include('../../includes/lib.php');
  include_once('../../includes/booking.php');
  checkAdminSession();

  $pageTitle = "Edit Booking";
  //$row = new Booking(null);
   $id =  $engineer_id =  $service_id =  $customer_id =  $detail =  $end_date =  $state = "";
  //$id = $name = $manager = $managerPhone = $agent = $agentPhone = $kindergarten = $earlyChildhood = $elementary = $intermediate = $secondary = $active = "";
  include('../../template/header.php'); 
  $errors = array();


  if ($_SERVER['REQUEST_METHOD'] === 'GET') 
  {
    if(isset($_GET['id']))
    {
      $_SESSION["message"] = '';
      $id = $_GET['id'];
      $result = getBookingById($id);

      if( count( $result ) > 0)
      {
        $row = $result[0];
        $id = $row['id'];
        $engineer_id = $row['engineer_id'];
        $service_id = $row['service_id'];
        $customer_id = $row['customer_id'];
        $detail = $row['detail'];
        $end_date = $row['end_date'];
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
    if(isset($_POST['updateBooking']))
    {
        $id = $_POST['id'];
        $engineer_id = $_POST['engineer_id'];
        $service_id = $_POST['service_id'];
        $customer_id = $_POST['customer_id'];
        $detail = $_POST['detail'];
        $end_date = $_POST['end_date'];
        $state = $_POST['state'];
      if( empty($engineer_id)){
        $errors[] = "<li>Engineer is requierd.</li>";
        $_SESSION["fail"] .= "<li>Engineer is requierd.</li>";
        }
      if( empty($service_id)){
        $errors[] = "<li>Service is requierd.</li>";
        $_SESSION["fail"] .= "<li>Service is requierd.</li>";
        }
      if( empty($customer_id)){
        $errors[] = "<li>Customer is requierd.</li>";
        $_SESSION["fail"] .= "<li>Customer is requierd.</li>";
        }
      if( empty($detail)){
        $errors[] = "<li>Detail is requierd.</li>";
        $_SESSION["fail"] .= "<li>Detail is requierd.</li>";
        }
      if( empty($end_date)){
        $errors[] = "<li>EndDate is requierd.</li>";
        $_SESSION["fail"] .= "<li>EndDate is requierd.</li>";
        }
      if( empty($state)){
        $errors[] = "<li>State is requierd.</li>";
        $_SESSION["fail"] .= "<li>State is requierd.</li>";
        }
      
      if(count($errors) == 0)
      {

        $result = getBookingById($id);
        if( count( $result ) > 0)
          $row = $result[0];
        
        $update = updateBooking( $id,  $engineer_id,  $service_id,  $customer_id,  $detail,  $end_date,  $state, );
        if($update ==  true)
        {
  
          $_SESSION["message"] = "Booking Updated successfuly!";
          $_SESSION["success"] = "Booking Updated successfuly!";
          header('Location:'. $PATH_ADMIN_BOOKING .'index.php');
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
                            Edit Booking
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="index.php">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Back to Bookings List
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
                <!-- Booking details card-->
                <div class="card mb-4">
                    <div class="card-header">Booking Details </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
                                <!-- Form Group (engineer_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="engineer_id">Engineer</label>
                                    <input class="form-control" id="engineer_id" name="engineer_id" type="text" placeholder="Engineer"
                                        value="<?php echo $engineer_id;?>" required />
                                </div>
                                <!-- Form Group (service_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="service_id">Service</label>
                                    <input class="form-control" id="service_id" name="service_id" type="text" placeholder="Service"
                                        value="<?php echo $service_id;?>" required />
                                </div>
                                <!-- Form Group (customer_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="customer_id">Customer</label>
                                    <input class="form-control" id="customer_id" name="customer_id" type="text" placeholder="Customer"
                                        value="<?php echo $customer_id;?>" required />
                                </div>
                                <!-- Form Group (detail)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="detail">Detail</label>
                                    <input class="form-control" id="detail" name="detail" type="text" placeholder="Detail"
                                        value="<?php echo $detail;?>" required />
                                </div>
                                <!-- Form Group (end_date)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="end_date">EndDate</label>
                                    <input class="form-control" id="end_date" name="end_date" type="text" placeholder="EndDate"
                                        value="<?php echo $end_date;?>" required />
                                </div>
                                <!-- Form Group (state)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="state">State</label>
                                    <input class="form-control" id="state" name="state" type="text" placeholder="State"
                                        value="<?php echo $state;?>" required />
                                </div>
 
                            </div>
                            <!-- Submit button-->
                            <button name="updateBooking" class="btn btn-success" type="submit">Save</button>
                            <a href="index.php" class="btn btn-danger" type="button">Back To List</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include('../../template/footer.php'); ?>

