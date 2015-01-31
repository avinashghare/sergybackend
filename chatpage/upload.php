<?php
//$allowedExts = array("gif", "jpeg", "jpg", "png");
//$temp = explode(".", $_FILES["file"]["name"]);
//$extension = end($temp);
//
//if ((($_FILES["file"]["type"] == "image/gif")
//|| ($_FILES["file"]["type"] == "image/jpeg")
//|| ($_FILES["file"]["type"] == "image/jpg")
//|| ($_FILES["file"]["type"] == "image/pjpeg")
//|| ($_FILES["file"]["type"] == "image/x-png")
//|| ($_FILES["file"]["type"] == "image/png"))
//&& ($_FILES["file"]["size"] < 200200000)
//&& in_array($extension, $allowedExts)) {
//  if ($_FILES["file"]["error"] > 0) {
//    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
//  } else {
//   
//    if (file_exists("../uploads/" . $_FILES["file"]["name"])) {
//      echo $_FILES["file"]["name"] . " already exists. ";
//    } else {
//      move_uploaded_file($_FILES["file"]["tmp_name"],
//      "../uploads/" . $_FILES["file"]["name"]);
//      echo $_FILES["file"]["name"];
//    }
//  }
//} else {
//  echo "Invalid file";
//}
?>



<?php
$fname=$_FILES['file']['name'];
$fsize=$_FILES['file']['size'];
$ftype=$_FILES['file']['type'];
$ftmp=$_FILES['file']['tmp_name'];
$randno=rand();
$storage_path="../uploads/".$randno.".jpg";
$storingin="../uploads/".$randno.".jpg";
if(move_uploaded_file($ftmp,$storingin))
{
    echo $path=$storage_path;
}
?>