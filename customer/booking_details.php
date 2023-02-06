<?php
  session_start();
  include('../includes/lib.php');
  include('../includes/service.php');
  include('../includes/engineer.php');
  include('../includes/service_type.php');
  include('../includes/booking.php');
  include('../includes/booking_note.php');
  
  checkCustomerSession();

  $pageTitle = "Booking Details";
  ?>

<?php include('../template/header.php'); ?>

<!-- التأكد من ان طريق الدخول للصفحة عن طريق الرابط وليس عن طريق فورم بيانات -->
<?php
  if ($_SERVER['REQUEST_METHOD'] === 'GET') 
  {
    // التأكد من ان معرف المهندس تم ارسالة في الرابط 
    if(isset($_GET['id']))
    {
      $_SESSION["message"] = '';
      $id = $_GET['id'];
    //   جلب بيانات الخدمة اعتمادا على المعرف وعرضها في الصفحة
      $result = getBookingById($id);

      if( count( $result ) > 0)
       {

         $row = $result[0];
         $engineer =  getEngineerById($row['engineer_id'])[0];
         $service =  getServiceById($row['service_id'])[0];   
       }
      else
      {
        // في حال عدم وجود الخدمة تحويلة لصفحة غير موجود
        $_SESSION["message"] = 'There is No data for this id';
        $_SESSION["fail"] = 'There is No data for this id';
        //echo ' <script> location.replace("index.php"); </script>';
        header('Location: index.php');
        exit();
        
      }

      
    }
    else
    {
      $_SESSION["message"] = 'No data for display';
      $_SESSION["fail"] = 'No data for display';
      header('Location: index.php');
      exit();
    }
  }

?>

<?php include('../template/startNavbar.php'); ?>

<!-- محتوى الصفحة -->
<main class="page">

    <header class="pt-5 mt-4 mb-0 ">
        <div class="container-xl  text-center">
            <div class="row">
                <div class="col-12">
                    <div class="text-center ">
                        <h1 class="text-primary">Booking Details</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <hr class="mb-1" />
    <!-- Main page content-->
    <div class="container-xl px-4">
        <div class="row">
            <div class="card border-start-lg border-start-primary card-header-actions card-scrollable">
                <div class="card-header border-bottom ">
                    <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="overview-tab" href="#overview" data-bs-toggle="tab"
                                role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="payment-tab" href="#payment" data-bs-toggle="tab" role="tab"
                                aria-controls="payment" aria-selected="false">Payment</a>
                        </li>
                        <?php if( !($row['state'] == 'request' || $row['state'] == 'reject') ){  ?>
                        <li class="nav-item">
                            <a class="nav-link" id="notes-tab" href="#notes" data-bs-toggle="tab" role="tab"
                                aria-controls="notes" aria-selected="false">Notes</a>
                        </li>
                        <?php }  ?>
                    </ul>
                    <div>
                        <?php
                            if($row['state'] == 'request')
                                echo /*html*/'<span class="badge bg-gray-600">'.$row['state'].'</span>';
                            else if($row['state'] == 'reject')
                                echo /*html*/'<span class="badge bg-red ">'.$row['state'].'</span>';
                            else if($row['state'] == 'working')
                                echo /*html*/'<span class="badge bg-purple ">'.$row['state'].'</span>';
                            else if($row['state'] == 'ready')
                                echo /*html*/'<span class="badge bg-blue">'.$row['state'].'</span>';
                            else if($row['state'] == 'done')
                                echo /*html*/'<span class="badge bg-green">'.$row['state'].'</span>';

                            ?>
                    </div>
                </div>
                <div class="card-body p-5">
                    <div class="tab-content" id="cardTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                            aria-labelledby="overview-tab">
                            <h5 class="card-title text-primary"><?php echo $service['name']; ?></h5>
                            <h5>$<?php echo $row['service_price']; ?></h5>
                            <div class="text-s fw-bold d-inline-flex align-items-center">
                                <?php echo $row['detail']; ?>
                            </div>
                            <p class="card-text"> Provided By:
                                <span
                                    class="text-success"><?php echo $engineer['first_name'] . ' ' . $engineer['last_name'];?></span>
                            </p>
                            <?php if( $row['state'] == 'ready'){  ?>
                            <form class="d-inline-block mb-2" action="bookingManager.php" method="POST"
                                enctype="multipart/form-data">
                                <!-- Form Group (booking_id)-->
                                <input type="hidden" name="booking_id" id="booking_id" value="<?php echo $row['id'];?>"
                                    required>
                                </input>
                                <!-- Submit button-->
                                <button name="customerAcceptBookingDone" class="btn btn-success" type="submit">
                                    Service Completed!</button>
                            </form>

                            <form class="d-inline-block mb-2" action="bookingManager.php" method="POST"
                                enctype="multipart/form-data">
                                <!-- Form Group (booking_id)-->
                                <input type="hidden" name="booking_id" id="booking_id" value="<?php echo $row['id'];?>"
                                    required>
                                </input>
                                <!-- Submit button-->
                                <button name="customerBackBookingToEnginner" class="btn btn-primary" type="submit">
                                    Back To Engineer!</button>
                            </form>
                            <?php } ?>
                        </div>
                        <!--  Start Payment Tab  -->
                        <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                            <h5 class="card-title">Payment and Notes</h5>
                            <p class="card-text"></p>
                            <form action="" method="GET" enctype="multipart/form-data">
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (engineer_id)-->

                                    <input class="form-control" type="hidden" name="engineer_id" id="engineer_id"
                                        value="<?php echo $engineer['id'];?>" required>
                                    </input>
                                    <!-- Form Group (service_id)-->
                                    <input type="hidden" name="service_id" id="service_id"
                                        value="<?php echo $row['id'];?>" required>
                                    </input>


                                    <!-- Form Group (card_number)-->
                                    <div class="col-md-4 mb-3">
                                        <label class="small mb-1" for="card_number">Card Number</label>
                                        <input class="form-control" id="card_number" name="card_number" type="text"
                                            placeholder="Card Number" value="<?php echo $row['card_number'];?>"
                                            readonly />
                                    </div>
                                    <!-- Form Group (service_price)-->
                                    <div class="col-md-4 mb-3">
                                        <label class="small mb-1" for="service_price">Service Price</label>
                                        <input class="form-control" id="service_price" name="service_price" type="text"
                                            placeholder="Service Price" value="<?php echo $row['service_price'];?>"
                                            readonly />
                                    </div>
                                    <!-- Form Group (paid_price)-->
                                    <div class="col-md-4 mb-3">
                                        <label class="small mb-1" for="paid_price">Paid Price</label>
                                        <input class="form-control" id="paid_price" name="paid_price" type="text"
                                            placeholder="Paid Price" value="<?php echo $row['paid_price'];?>"
                                            readonly />
                                    </div>
                                    <!-- Form Group (detail)-->
                                    <div class="col-md-4 mb-3">
                                        <label class="small mb-1" for="detail">Detail</label>
                                        <input class="form-control" id="detail" name="detail" type="text"
                                            placeholder="Detail" value="<?php echo $row['detail'];?>" readonly />
                                    </div>
                                    <!-- Form Group (end_date)-->
                                    <div class="col-md-4 mb-3">
                                        <label class="small mb-1" for="end_date">EndDate</label>
                                        <input class="form-control" id="end_date" name="end_date" type="Date"
                                            placeholder="EndDate" value="<?php echo $row['end_date'];?>" readonly />
                                    </div>
                                </div>
                                <!-- Submit button-->
                                <!-- <button name="customerAddBooking" class="btn btn-success" type="submit">Process</button> -->
                            </form>
                        </div>
                        <!-- End Payment Tab -->


                        <?php if( !($row['state'] == 'request' || $row['state'] == 'reject') ){  ?>
                        <!--  Start Notes Tab  -->
                        <div class="tab-pane fade h-100" id="notes" role="tabpanel" aria-labelledby="notes-tab">
                            <?php if($row['state'] != 'done' && $row['state'] != 'working'){  ?>
                            <form action="bookingManager.php" method="POST" enctype="multipart/form-data">
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (customer_id)-->

                                    <input class="form-control" type="hidden" name="customer_id" id="customer_id"
                                        value="<?php if(isCustomer()) echo $_SESSION['userID'];?>" required>
                                    </input>
                                    <!-- Form Group (booking_id)-->
                                    <input type="hidden" name="booking_id" id="booking_id"
                                        value="<?php echo $row['id'];?>" required>
                                    </input>


                                    <!-- Form Group (note)-->
                                    <div class="col-10 mb-3">
                                        <!-- <label class="small mb-1" for="note">Note</label> -->
                                        <input class="form-control" id="note" name="note" type="text"
                                            placeholder="Enter Your Note" value="" required />
                                    </div>

                                    <div class="col-2">

                                        <!-- Submit button-->
                                        <button name="customerAddBookingNote" class="btn btn-success"
                                            type="submit">Send</button>
                                    </div>
                                </div>
                            </form>
                            <?php }  ?>

                            <?php if($row['state'] == 'done'){  ?>
                            <!-- Rating Form -->
                            <form action="bookingManager.php" method="POST" enctype="multipart/form-data">
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (customer_id)-->

                                    <input class="form-control" type="hidden" name="customer_id" id="customer_id"
                                        value="<?php if(isCustomer()) echo $_SESSION['userID'];?>" required>
                                    </input>
                                    <!-- Form Group (booking_id)-->
                                    <input type="hidden" name="booking_id" id="booking_id"
                                        value="<?php echo $row['id'];?>" required>
                                    </input>


                                    <!-- Form Group (rate)-->
                                    <div class="col-10 mb-3">
                                        <!-- <label class="small mb-1" for="note">Note</label> -->
                                        <input class="form-control" id="rate" name="rate" type="range" min="0" max="100"
                                            value="20" required oninput="this.nextElementSibling.value = this.value" />
                                        <output>20</output>
                                    </div>
                                    <div class="col-2">

                                        <!-- Submit button-->
                                        <button name="customerAddRating" class="btn btn-success"
                                            type="submit">Rate</button>
                                    </div>
                                </div>
                            </form>
                            <!-- End Rating Form -->
                            <?php } ?>

                            <div class="col-12 noteMessage">
                                <?php 
                                    $allNotes = getAllBookingNote($row['id']);
                                    if(count($allNotes ) > 0)
                                    {
                                        foreach($allNotes as $note)
                                        {                                    
                                ?>
                                <?php if(isCustomer() && $note['customer_id'] == $_SESSION['userID']){ ?>
                                <div>
                                    <p class="bg-blue-soft p-2 rounded-1 d-inline-block"><?php echo $note['note'];?></p>
                                </div>
                                <?php } else {?>
                                <div style="text-align: right;">
                                    <p class="bg-cyan-soft p-2 rounded-1 d-inline-block"><?php echo $note['note'];?></p>
                                </div>
                                <?php } ?>
                                <?php } }?>
                            </div>
                        </div>
                        <!-- End Notes Tab -->
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>


<?php include('../template/footer.php') ?>