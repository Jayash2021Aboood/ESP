<?php
function uploadImage($filedName, $dirctoryPath)
  {
    if(!empty($_FILES[$filedName]['tmp_name']))
    {
      $file = basename( $_FILES[$filedName]['name']);
      $path = $dirctoryPath . $file;
  
  
      if(move_uploaded_file($_FILES[$filedName]['tmp_name'], $path)) 
      {
        return $file;
      }
      else
      {
        return null;
      }
    }
    return null;
  }


  function getRateColor($rate)
  {
    if(!isset($rate)) return "danger";
    if($rate > 75){
      return "success";
    }
    else if($rate > 50){
      return "primary";
    }
    else if($rate > 25){
      return "warning";
    }
    else{
      return "danger";
    }
  }

  ?>