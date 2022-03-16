<?php include 'includes/nav.php'; ?>


<div class="container bg-light radius-10 shadow-sm p-3">
<div class="btn btn-secondary radius-10 shadow">
<img src="assets/img/like.svg" class="mr-2" width="40" alt=""> wargerawa
<img src="assets/img/unlike.svg"class="mr-2" width="40" alt=""> warnageraw
<img src="assets/img/wite.svg" class="mr-2" width="40" alt=""> chawarwan kar
</div>

<div class="btn btn-secondary radius-10 shadow">
<img src="assets/img/need.svg" class="mr-2" width="40" alt="">
<?php get_colums("need","num_need",0,1); ?>
</div>

<div class="btn btn-secondary radius-10 shadow">
<img src="assets/img/like.svg" class="mr-2" width="40" alt="">
<?php get_colums("person WHERE `is_pass` = 1 ","is_pass",1,0); ?>
</div>

<div class="btn btn-secondary radius-10 shadow">
<img src="assets/img/unlike.svg" class="mr-2" width="40" alt="">
<?php get_colums("person WHERE `is_pass` = 2 ","is_pass",1,0); ?>
</div>

<div class="btn btn-secondary radius-10 shadow">
<img src="assets/img/wite.svg" class="mr-2" width="40" alt="">
<?php get_colums("person WHERE `is_pass` = 0 ","is_pass",1,0); ?>
</div>







<div class="row m-3 justify-content-center">


<?php
include 'update.php';
$query = mysqli_query($db, "SELECT * FROM `person`  JOIN  `type_job`  ON person.job_id = type_job.job_id ORDER BY   person.id DESC");

include 'includes/card.php';


  ?>
</div>

</div>