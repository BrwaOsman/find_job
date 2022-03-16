<?php include 'includes/nav.php';?>

<?php 
if(isset($_POST['userlogin'])){
$name = $_POST['name'];
$age = $_POST['age'];
$job = $_POST['job'];
$file = $_FILES['file'];

$filename = $file['name'];
$fileType = $file['type'];
$fileTmpName = $file['tmp_name'];
$fileErorr = $file['error'];

if(empty($name) || empty($age)){
  
}else{
 $flieExt=explode('.', $filename);
 $fileActual = strtolower(end($flieExt));
 $fileAllow = ['jpg','svg', 'pdf', 'jpag','png'];
  if(in_array($fileActual , $fileAllow)){
    if($fileErorr == 0){
$fileNewName = rand().rand().'.'.$fileActual;
$fileDesesion = "upload/$fileNewName";
move_uploaded_file($fileTmpName , $fileDesesion);
$query = mysqli_query($db ,"INSERT INTO `person`(`name`,`age`,`job_id`,`is_pass`,`file_cv`) VALUES ('$name','$age','$job',0,'$fileNewName')");
if($query){
    header("location:index.php");
}else{
    echo mysqli_erorr($db);
}
    }else{
        exit('tkaya refrash bka');
    }
  }else{
      exit('filaka gwnjaw nya');
  }


}
}


?>



<?php
if(isset($_POST['adminlogin'])){
    $username = x($_POST['username']);
    $password = x($_POST['password']);

    if(empty($username) || empty($password)){
        header("location:login.php");
    }else{
 
 $query = mysqli_query($db , "SELECT * FROM `admin` WHERE  `username` = '$username' AND `password` = '$password'");
  if(mysqli_num_rows($query) == 1){
    while($row = mysqli_fetch_assoc($query)){
        $_SESSION['admin'] = x($row['id']);
        $_SESSION['username'] = x($row['username']);
    }
    header ("location:index.php");
  }else{
    header("location:login.php");
  }



    }
}
?>
<div class="container bg-light text-center">
    <img src="assets/img/user.svg" class="user" width="200" alt="">
    <img src="assets/img/admin.svg" class="company" width="200" alt="">
<div class="row justify-content-center">
<form action="login.php" method="POST" class="Fcompany d-none col-lg-5 col-md-5 w-25 m-1 p-3 bg-light">
<input type="text" name="username" placeholder="username" class="<?php echo $input; ?>">
<input type="text" name="password" placeholder="password" class="<?php echo $input; ?>">
<button  name="adminlogin" class="btn btn-success w-50 mb-4 radius-10">  login</button>
</form>
<form action="login.php" method="POST" class="Fuser d-none col-lg-5 col-md-5 w-25 m-1 p-3 bg-light" enctype="multipart/form-data">
<input type="text" name="name" placeholder="name" class="<?php echo $input; ?>">
<input type="number" name="age" placeholder="age" class="<?php echo $input; ?>">
<select name="job" class="<?php echo $input; ?>" id="">
<?php 
$query=mysqli_query($db , "SELECT * FROM type_job ");
while($row = mysqli_fetch_assoc($query)){
    echo '<option value="'.$row['job_id'].'">'.$row['name_job'].' </option>';
} ?>
</select>
<input type="file" name="file" class="<?php echo $input; ?>" id="">
<button  name="userlogin" class="btn btn-primary form-control  w-100 m-2 mr-1 radius-10">  Send CV</button>
</form>

</div>
</div>

