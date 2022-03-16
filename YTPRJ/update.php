<?php

if(isset($_POST['edit']) && isset($admin)){
    $id = x($_POST['id']);
    $name =x($_POST['name']);
    $age= x($_POST['age']);
    $job =x($_POST['job']);
  $query=mysqli_query($db , "UPDATE `person` SET `name` ='$name' ,`age`='$age' ,`name_job`='$job' WHERE `id` = '$id' ");
  if($query){
    header("location:index.php?success");
  }
  }

  ?>