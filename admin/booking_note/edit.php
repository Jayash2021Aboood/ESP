<?php
  session_start();

  include('../../includes/lib.php');
  include_once('../../includes/booking_note.php');
  checkAdminSession();

  $pageTitle = "Edit BookingNote";
  //$row = new BookingNote(null);
   $id =  $booking_id =  $engineer_id =  $customer_id =  $note = "";
  //$id = $name = $manager = $managerPhone = $agent = $agentPhone = $kindergarten = $earlyChildhood = $elementary = $intermediate = $secondary = $active = "";
  include('../../template/header.php'); 
  $errors = array();


  if ($_SERVER['REQUEST_METHOD'] === 'GET') 
  {
    if(isset($_GET['id']))
    {
      $_SESSION["message"] = '';
      $id = $_GET['id'];
      $result = getBookingNoteById($id);

      if( count( $result ) > 0)
      {
        $row = $result[0];
        $id = $row['id'];
        $booking_id = $row['booking_id'];
        $engineer_id = $row['engineer_id'];
        $customer_id = $row['customer_id'];
        $note = $row['note'];
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
    if(isset($_POST['updateBookingNote']))
    {
        $id = $_POST['id'];
        $booking_id = $_POST['booking_id'];
        $engineer_id = $_POST['engineer_id'];
        $customer_id = $_POST['customer_id'];
        $note = $_POST['note'];
      if( empty($booking_id)){
        $errors[] = "<li>Booking is requierd.</li>";
        $_SESSION["fail"] .= "<li>Booking is requierd.</li>";
        }
      if( empty($engineer_id)){
        $errors[] = "<li>Engineer is requierd.</li>";
        $_SESSION["fail"] .= "<li>Engineer is requierd.</li>";
        }
      if( empty($customer_id)){
        $errors[] = "<li>Customer is requierd.</li>";
        $_SESSION["fail"] .= "<li>Customer is requierd.</li>";
        }
      if( empty($note)){
        $errors[] = "<li>Note is requierd.</li>";
        $_SESSION["fail"] .= "<li>Note is requierd.</li>";
        }
      
      if(count($errors) == 0)
      {

        $result = getBookingNoteById($id);
        if( count( $result ) > 0)
          $row = $result[0];
        
        $update = updateBookingNote( $id,  $booking_id,  $engineer_id,  $customer_id,  $note, );
        if($update ==  true)
        {
  
          $_SESSION["message"] = "BookingNote Updated successfuly!";
          $_SESSION["success"] = "BookingNote Updated successfuly!";
          header('Location:'. $PATH_ADMIN_BOOKINGNOTE .'index.php');
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
                            Edit BookingNote
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="index.php">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Back to BookingNotes List
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
                <!-- BookingNote details card-->
                <div class="card mb-4">
                    <div class="card-header">BookingNote Details </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
                                <!-- Form Group (booking_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="booking_id">Booking</label>
                                    <input class="form-control" id="booking_id" name="booking_id" type="text" placeholder="Booking"
                                        value="<?php echo $booking_id;?>" required />
                                </div>
                                <!-- Form Group (engineer_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="engineer_id">Engineer</label>
                                    <input class="form-control" id="engineer_id" name="engineer_id" type="text" placeholder="Engineer"
                                        value="<?php echo $engineer_id;?>"  />
                                </div>
                                <!-- Form Group (customer_id)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="customer_id">Customer</label>
                                    <input class="form-control" id="customer_id" name="customer_id" type="text" placeholder="Customer"
                                        value="<?php echo $customer_id;?>"  />
                                </div>
                                <!-- Form Group (note)-->
                                <div class="col-md-4 mb-3">
                                    <label class="small mb-1" for="note">Note</label>
                                    <input class="form-control" id="note" name="note" type="text" placeholder="Note"
                                        value="<?php echo $note;?>" required />
                                </div>
 
                            </div>
                            <!-- Submit button-->
                            <button name="updateBookingNote" class="btn btn-success" type="submit">Save</button>
                            <a href="index.php" class="btn btn-danger" type="button">Back To List</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include('../../template/footer.php'); ?>

