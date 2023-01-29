<?php
  session_start();
  include('includes/lib.php');
  include('includes/engineer.php');
  $pageTitle = "Engineer Details";

  ?>

<?php include('template/header.php'); ?>

<!-- التأكد من ان طريق الدخول للصفحة عن طريق الرابط وليس عن طريق فورم بيانات -->
<?php
  if ($_SERVER['REQUEST_METHOD'] === 'GET') 
  {
    // التأكد من ان معرف المهندس تم ارسالة في الرابط 
    if(isset($_GET['id']))
    {
      $_SESSION["message"] = '';
      $id = $_GET['id'];
    //   جلب بيانات المهندس اعتمادا على المعرف وعرضها في الصفحة
      $result = getAllEngineersWithRatesAndServiceTotals($id);

      if( count( $result ) > 0)
       {

         $row = $result[0];
         $total_service = $row['total_service'];
         $total_rate = $row['total_rate'];
            
       }
      else
      {
        // في حال عدم وجود المهندس تحويلة لصفحة غير موجود
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

<?php include('template/startNavbar.php'); ?>

<!-- محتوى الصفحة -->
<main class="page">

    <header class="py-10 mb-0 ">
        <div class="container-xl px-4 text-center">
            <div class="row">
                <div class="col-12">
                    <div class="text-center ">
                        <h1 class="text-primary"><?php echo $row['first_name'] .' '. $row['last_name']; ?></h1>
                        <p class="m-auto mb-0 mt-0 col-lg-5"><?php echo $row['specialty']; ?></p>
                        <div class="progress col-lg-5 m-auto">
                            <div class="progress-bar  bg-<?php echo getRateColor($total_rate); ?>" role="progressbar"
                                style="width: <?php echo $total_rate ?>%" aria-valuenow="<?php echo $total_rate ?>"
                                aria-valuemin="0" aria-valuemax="100">
                                <?php echo floor($total_rate) ?>%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <hr class="mt-2 mb-4" />
    <!-- Main page content-->
    <div class="container-xl px-4">
        <div class="row">
            <?php
                $all = getAllServicesByEngineerID($row['id']);
                if(!(count($all) > 0)) echo /*html*/'<div class="col text-center"> <h2 class="text-danger" >No Service Found To Display. </h2></div>'; 
                else{ 
                    foreach($all as  $row)
                    {
            ?>

            <div class="col-xl-4 col-md-6 mb-4">
                <!-- Dashboard info widget 1-->
                <div class="card border-start-lg border-start-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small fw-bold text-primary mb-1"><?php echo $row['name']; ?></div>
                                <div class="h5">$<?php echo $row['price']; ?></div>
                                <div class="text-xs fw-bold d-inline-flex align-items-center">
                                    <?php echo $row['detail']; ?>
                                </div>
                            </div>
                            <!-- <div class="ms-2"><i class="fas fa-dollar-sign fa-2x text-gray-200"></i></div> -->
                        </div>
                        <div>
                            <a class="btn btn-primary mt-2" href=""> Book now </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php }}?>
        </div>
    </div>
</main>


<?php include('template/footer.php') ?>