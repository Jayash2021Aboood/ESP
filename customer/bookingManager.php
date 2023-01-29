<?php
  session_start();
  include('../includes/lib.php');
  include_once('../includes/booking.php');
  include_once('../includes/engineer.php');
  include_once('../includes/service.php');
  include_once('../includes/customer.php');
  checkCustomerSession();


  
  $pageTitle = "Add Booking";
  //include('../../template/header.php'); 
  $errors = array();


  if ($_SERVER['REQUEST_METHOD'] === 'POST') 
  {
    
    if(isset($_POST['customerAddBooking']))
    {

    
      $engineer_id = $_POST['engineer_id'];

      $service_id = $_POST['service_id'];

      $customer_id = $_SESSION["userID"];

      $card_number = $_POST['card_number'];

      $service_price = $_POST['service_price'];

      $paid_price = $_POST['paid_price'];

      $detail = $_POST['detail'];

      $end_date = $_POST['end_date'];
      

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
      if( empty($card_number)){
        $errors[] = "<li>Card Number is requierd.</li>";
        $_SESSION["fail"] .= "<li>Card Number is requierd.</li>";
        }
      if( empty($service_price)){
        $errors[] = "<li>Service Price is requierd.</li>";
        $_SESSION["fail"] .= "<li>Service Price is requierd.</li>";
        }
      if( empty($paid_price)){
        $errors[] = "<li>Paid Price is requierd.</li>";
        $_SESSION["fail"] .= "<li>Paid Price is requierd.</li>";
        }     
        if(!empty($service_price) && !empty($paid_price)){
            if($service_price > $paid_price){
                $errors[] = "<li>Paid Price is Must be the same Service Price</li>";
                $_SESSION["fail"] .= "<li>Paid Price is Must be the same Service Price</li>";
            }
        }


      
      if(count($errors) == 0)
      {
        $add = addBooking(
                                    $engineer_id,
                                    $service_id,
                                    $customer_id,
                                    $card_number,
                                    $service_price,
                                    $paid_price,
                                    $detail,
                                    $end_date,
                                    'request',
                                    );
        if($add ==  true)
        {
          $_SESSION["message"] = "Booking Added successfuly!";
          $_SESSION["success"] = "Booking Added successfuly!";
          header('Location: ' . $_SERVER['HTTP_REFERER']);
          exit();
        }
        else
        {
          $_SESSION["message"] = "Error when Adding Data";
          $_SESSION["fail"] = "Error when Adding Data";
          $errors[] = "Error when Adding Data";
          header('Location: ' . $_SERVER['HTTP_REFERER']);
          exit();
        }
        
      }
  
    }
  }
?>