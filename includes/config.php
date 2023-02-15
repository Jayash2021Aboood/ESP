<?php
	$localhost = "localhost";
	$DBusername = "root";
	$dbname = "esp";
	$pwd="";

	$mysqlilink = @mysqli_connect($localhost,$DBusername,$pwd)or die('<center><div>wrong in connect with server</div>'.mysqli_connect_error()."</center>");


	@mysqli_select_db($mysqlilink,$dbname)or die('<center><div>wrong in connect with database</div>'.mysqli_connect_error($mysqlilink)."</center>");

	@mysqli_set_charset($mysqlilink,"UTF8")or die('<center><div>wrong </div>'.mysqli_connect_error($mysqlilink)."</center>");


	//  ======================  Start Path ============================
	//  ====================== =========== ============================

	// HTTP
	// define('HTTP_SERVER', 'http://localhost:90/ESP/admin/');
	$PATH_SERVER 			= 'http://localhost:90/ESP/';
	$PATH_PHOTOES 			= $PATH_SERVER . 'photoes/';

	$PATH_ADMIN 			= $PATH_SERVER . 'admin/';
	$PATH_CUSTOMER 			= $PATH_SERVER . 'customer/';

	$PATH_ENGINEER 			= $PATH_SERVER . 'engineer/';
	$PATH_ENGINEER_BOOKING 			= $PATH_ENGINEER . 'booking/';
	$PATH_ENGINEER_SERVICE 			= $PATH_ENGINEER . 'service/';

	$PATH_ADMIN_ADMIN 	= $PATH_ADMIN . 'admin/';
	$PATH_ADMIN_SCHOOL 	= $PATH_ADMIN . 'school/';

	$PATH_ADMIN_ADMIN = $PATH_ADMIN . 'admin/';
	$PATH_ADMIN_BOOKING = $PATH_ADMIN . 'booking/';
	$PATH_ADMIN_CUSTOMER = $PATH_ADMIN . 'customer/';
	$PATH_ADMIN_ENGINEER = $PATH_ADMIN . 'engineer/';
	$PATH_ADMIN_RATING = $PATH_ADMIN . 'rating/';
	$PATH_ADMIN_SERVICE = $PATH_ADMIN . 'service/';
	$PATH_ADMIN_SERVICE_TYPE = $PATH_ADMIN . 'service_type/';
	
	$PATH_ADMIN_INCLUDES 			= $PATH_ADMIN . 'includes/';
	$PATH_ADMIN_TEMPLATE 			= $PATH_ADMIN . 'template/';
	$PATH_ADMIN_PHOTOES 			= $PATH_ADMIN . 'photoes/';
	

	// DIR
	define('DIR_APPLICATION', 'C:/xampp/htdocs/ESP/');
	define('DIR_ADMIN', 'C:/xampp/htdocs/ESP/admin/');
	define('DIR_ADMIN_INCLUDES', 'C:/xampp/htdocs/ESP/admin/includes/');
	define('DIR_ADMIN_TEMPLATE', 'C:/xampp/htdocs/ESP/admin/template/');
	define('DIR_ADMIN_PHOTOES', 'C:/xampp/htdocs/ESP/admin/photoes/');
	define('DIR_PHOTOES', 'C:/xampp/htdocs/ESP/photoes/');



	//  ======================  End  Path =============================
	//  ====================== =========== ============================


	//  ======================  Start Function ============================
	//  ====================== =============== ============================
	function getTitle() {

		global $pageTitle;

		if (isset($pageTitle)) {

			echo $pageTitle;

		} else {

			echo 'Default';

		}
	}


  function checkAdminSession($path = "http://localhost:90/ESP/" , $page = "login.php")
  {
            if (!isset($_SESSION['user']))
            {
				header('Location:'. $path . $page);
            }
			if (!(isset($_SESSION['userType'])))
			{
				header('Location:'. $path . $page);
			} 
			if($_SESSION['userType'] != 'a')
			{
				header('Location:'. $path . $page);
			}
  }

  function checkEngineerSession($path = "http://localhost:90/ESP/" , $page = "login.php")
  {
            if (!isset($_SESSION['user']))
            {
				header('Location:'. $path . $page);
            }
			if (!(isset($_SESSION['userType'])))
			{
				header('Location:'. $path . $page);
			} 
			if($_SESSION['userType'] != 'e')
			{
				header('Location:'. $path . $page);
			}
  }

  function checkCustomerSession($path = "http://localhost:90/ESP/" , $page = "login.php")
  {
            if (!isset($_SESSION['user']))
            {
				header('Location:'. $path . $page);
            }
			if (!(isset($_SESSION['userType'])))
			{
				header('Location:'. $path . $page);
			} 
			if($_SESSION['userType'] != 'c')
			{
				header('Location:'. $path . $page);
			}
  }

  function isLogin()
  {
	if(isset($_SESSION['user']))
	{
		if(isset($_SESSION['userType']))
		{
			if($_SESSION['userType'] == 'a' || $_SESSION['userType'] == 'c' || $_SESSION['userType'] == 'e')
			{
				return true;
			}
		}
	}
	return false;	
  }

  function getLoginType()
  {
	if(isLogin())
	{
		return $_SESSION['userType'];
	}
	else
	{
		return null;
	}
  }

  function isAdmin() { if(getLoginType() == 'a') return true; }
  function isEngineer() { if(getLoginType() == 'e') return true; }
  function isCustomer() { if(getLoginType() == 'c') return true; }
  function getLoginEmail() { return $_SESSION['user'] ;}

//   function checkAdminSession($path = "http://localhost:90/ESP/" , $page = "login.php")
//   {
// 	// global $PATH_ADMIN;
//     // if(isset($loginRequire))
//     // {
//     //     if($loginRequire == true)
//     //     {
//             if (!(isset($_SESSION['adminID'])) || !(isset($_SESSION['adminName']))) 
//             {
//                 //header('Location:'. $path .'login.php');
//                 header('Location:'. $path . $page);
//                 //echo $_SESSION['adminID'];
//                 //echo '<script> window.location.replace("login.php"); </script>';
//             }
//     //     }
//     // }
//   }
	//  ======================  End Function ============================
	//  ====================== ============= ============================
?>