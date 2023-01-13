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

	$PATH_ADMIN 			= $PATH_SERVER . 'admin/';
	$PATH_CUSTOMER 			= $PATH_SERVER . 'customer/';
	$PATH_ENGINEER 			= $PATH_SERVER . 'engineer/';

	$PATH_ADMIN_ADMIN 	= $PATH_ADMIN . 'admin/';
	$PATH_ADMIN_SCHOOL 	= $PATH_ADMIN . 'school/';

	$PATH_ADMIN_ADMIN = $PATH_ADMIN . 'admin/';
	$PATH_ADMIN_AUTHER = $PATH_ADMIN . 'auther/';
	$PATH_ADMIN_BOOK = $PATH_ADMIN . 'book/';
	$PATH_ADMIN_BORROWER = $PATH_ADMIN . 'borrower/';
	$PATH_ADMIN_BORROWER_TYPE = $PATH_ADMIN . 'borrower_type/';
	$PATH_ADMIN_CATEGORY = $PATH_ADMIN . 'categorie/';
	$PATH_ADMIN_COLLEGE = $PATH_ADMIN . 'college/';
	$PATH_ADMIN_DEPARTMENT = $PATH_ADMIN . 'department/';
	$PATH_ADMIN_FINE = $PATH_ADMIN . 'fine/';
	$PATH_ADMIN_JOBHOLDER = $PATH_ADMIN . 'jobholder/';
	$PATH_ADMIN_LANGUAGE = $PATH_ADMIN . 'language/';
	$PATH_ADMIN_LIBRARY = $PATH_ADMIN . 'library/';
	$PATH_ADMIN_PROJECT = $PATH_ADMIN . 'project/';
	$PATH_ADMIN_PUBLISHER = $PATH_ADMIN . 'publisher/';
	$PATH_ADMIN_RESERVATION = $PATH_ADMIN . 'reservation/';
	$PATH_ADMIN_STUDENT = $PATH_ADMIN . 'student/';
	$PATH_ADMIN_UNIVERSITY = $PATH_ADMIN . 'university/';
	$PATH_ADMIN_UNIVERSITY_COLLEGE = $PATH_ADMIN . 'university_college/';
	
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
	// global $PATH_ADMIN;
    // if(isset($loginRequire))
    // {
    //     if($loginRequire == true)
    //     {
            if (!(isset($_SESSION['adminID'])) || !(isset($_SESSION['adminName']))) 
            {
                //header('Location:'. $path .'login.php');
                header('Location:'. $path . $page);
                //echo $_SESSION['adminID'];
                //echo '<script> window.location.replace("login.php"); </script>';
            }
    //     }
    // }
  }
	//  ======================  End Function ============================
	//  ====================== ============= ============================
?>