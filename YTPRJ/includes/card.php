<?php
// $query = mysqli_query($db, "SELECT * FROM `person` JOIN `type_job` ON person.job_id = type_job.job_id ORDER BY   person.id DESC");

while($row = mysqli_fetch_assoc($query)){ $is_pass = x($row['is_pass']); $personid = x($row['id']); //amde valuya wardagrn bo kam krdnawa nwsynaka ay xayn naw while bo away lahamw kar dakan hamn eishman bo bkat ?>

<div class="modal fade" id="exampleModal<?php echo x($row['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body text-center">
       <form method="POST" action="index.php">
       <input type="text" value= "<?php echo x($row['id']);?>" name="id" hidden> <!-- lera boya hidden bakar dahenyn bo away id kaman bo peshan nadatawa -->
       <input name="name" type="text" value=" <?php echo x($row['name']);?>" class="form-control form-control-lg m-2">
       <input name="age" type="text" value=" <?php echo x($row['age']);?> "class="form-control form-control-lg m-2">
       <input  name="job" type="text" value=" <?php echo x($row['name_job']);?> "class="form-control form-control-lg m-2">
   
        <button type="button" class="btn btn-secondary w-25  mb-3" data-dismiss="modal">Close</button>
        <button  name="edit"  class="btn btn-primary w-25 mb-3">update</button>
         </form>
          </div>
    </div>
  </div>
</div>



<div class="card m-2 border-0 p-3 radius-10 shadow-sm" style="width: 18rem;">
  <img src="assets/img/<?php echo x($row['photo_job']);?>" class="w-50 m-auto">
  <div class="card-body text-center">
    <h5 class="card-title">Name : <?php echo x($row['name']);?></h5>
    <p class="card-text">Age : <?php echo x($row['age']);?></p>
    <p class="card-text">Job : <?php echo x($row['name_job']);?></p>
    <?php if(isset($admin))  { ?>
    <a href="upload/<?php echo $row['file_cv'];?> ">View CV</a>  <?php } ?>
    <img src="assets/img/<?php if($is_pass == 0){echo "wite.svg"; }else if($is_pass == 1){echo "like.svg";}else{echo "unlike.svg";} ?> " width="40" style="position: absolute;top:0;left:0; margin:10px;" alt="">
  </div>
  <?php if(isset($admin))  { ?>
  <a href="?d=<?php echo x($row['id']);?>"><img src="assets/img/remove.svg" width="40" style="position:absolute;top:0;right:0;margin:10px" alt=""></a>
<span data-toggle="modal" data-target="#exampleModal<?php echo x($row['id']); ?>" ><img src="assets/img/eidt.svg"width="40px" ></span>
<?php  }  if(isset($admin)) {  // lera isset($admin) bakar dahenyn wata katy admin kara bw ama ish bkat yan peshan bdreyt ?> 
<?php if($is_pass == 0 ){?>
<div class="d-flex justify-content-center bg-secondary p-2 radius-10">
<a href="?like=<?php echo $personid; ?>" class="m-2"> <img src="assets/img/like.svg" width="40" alt=""></a>
<a href="?unlike=<?php echo $personid; ?>" class="m-2"> <img src="assets/img/unlike.svg" width="40" alt=""></a>
</div>
<?php }  } ?>
</div>

  <?php } ?>
  