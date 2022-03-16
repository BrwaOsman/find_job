<?php
session_start();
$db = mysqli_connect('localhost' , 'root' , '' , 'cv');
function x($data){
    global $db;
    $data = mysqli_real_escape_string($db , htmlspecialchars($data));
    return $data;
}
// am claseka day danyn bo away zor dwbary nakaynawa 
$input ="form-control form-control-lg m-2";
// danany session taybat ba admin w user
if(isset($_SESSION['admin'])){
  $admin = $_SESSION['admin'];
}else if(isset($_SESSION['user'])){
  $userid = $_SESSION['user'];
}

// bo delet krdny kardakan
if(isset($_GET['d']) && isset($admin)){
    $id = x($_GET['d']);
    mysqli_query($db , "DELETE FROM `person` WHERE `id` = '$id'");
    header("Location:index.php");
  }
//bodanany like w unlike bakr det
if(isset($_GET['like']) && isset($admin)){
  $personid = x($_GET['like']);
  mysqli_query($db , "UPDATE `person` SET `is_pass` = 1 WHERE `id` = '$personid'");
  mysqli_query($db , "UPDATE `need` SET `num_need` = `num_need`- 1 ");
  header("location:index.php");

}
else if(isset($_GET['unlike']) && isset($admin)){
  $personid = x($_GET['unlike']);
  mysqli_query($db , "UPDATE `person` SET `is_pass` = 2 WHERE `id` = '$personid'");
  header("location:index.php");
}


// bo logut krdn bakar det
if(isset($_GET['logout'])){
  session_unset();
  session_destroy();
  unset($admin);
  unset($userid);
}
// am functiona bakar det bo bang krdnawa data baysaka law shwenay ka damanawyt
// ykam value bakar det bo nawy tablaka 2 bo aw roway ka eishy lasar akan  3 bo zhmardny rowaka bakar det 4 bo wargrtny datay rowaka
function get_colums($condishn ,$rowF ,$states ,$Scolums){
  global $db;
  $query= mysqli_query($db , "SELECT * FROM $condishn");
  $num_rows =mysqli_num_rows($query);
  while($row = mysqli_fetch_assoc($query)){
    if($Scolums == 1){
      echo $row[$rowF];

    }
  }
  if($states == 1){
    echo $num_rows;
  }
}




?>