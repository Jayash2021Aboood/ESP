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



  ?>