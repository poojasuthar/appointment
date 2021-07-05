<?php
   session_start();
   if(!isset($_SESSION['paitentname'])){
   	header('location:PaitentLogin.php');
   }
   include "header.php";
   include "config_appointment.php";
   $_SESSION['paitentname'];
   $_SESSION['paitentid'];
   	?>
<style>
   body {
   color: #797979;
   background: #f1f2f7;
   font-family: 'Open Sans', sans-serif;
   padding: 0px !important;
   margin: 0px !important;
   font-size: 13px;
   text-rendering: optimizeLegibility;
   -webkit-font-smoothing: antialiased;
   -moz-font-smoothing: antialiased;
   }
   .profile-nav, .profile-info{
   margin-top:30px;   
   }
   .profile-nav .user-heading {
   background: #fbc02d;
   color: #fff;
   border-radius: 4px 4px 0 0;
   -webkit-border-radius: 4px 4px 0 0;
   padding: 30px;
   text-align: center;
   }
   .profile-nav .user-heading.round a  {
   border-radius: 50%;
   -webkit-border-radius: 50%;
   border: 10px solid rgba(255,255,255,0.3);
   display: inline-block;
   }
   .profile-nav .user-heading a img {
   width: 112px;
   height: 112px;
   border-radius: 50%;
   -webkit-border-radius: 50%;
   }
   .profile-nav .user-heading h1 {
   font-size: 22px;
   font-weight: 300;
   margin-bottom: 5px;
   }
   .profile-nav .user-heading p {
   font-size: 12px;
   }
   .profile-nav ul {
   margin-top: 1px;
   }
   .profile-nav ul > li {
   border-bottom: 1px solid #ebeae6;
   margin-top: 0;
   line-height: 30px;
   }
   .profile-nav ul > li:last-child {
   border-bottom: none;
   }
   .profile-nav ul > li > a {
   border-radius: 0;
   -webkit-border-radius: 0;
   color: #89817f;
   border-left: 5px solid #fff;
   }
   .profile-nav ul > li > a:hover, .profile-nav ul > li > a:focus, .profile-nav ul li.active  a {
   background: #f8f7f5 !important;
   border-left: 5px solid #fbc02d;
   color: #89817f !important;
   }
   .profile-nav ul > li:last-child > a:last-child {
   border-radius: 0 0 4px 4px;
   -webkit-border-radius: 0 0 4px 4px;
   }
   .profile-nav ul > li > a > i{
   font-size: 16px;
   padding-right: 10px;
   color: #bcb3aa;
   }
   .r-activity {
   margin: 6px 0 0;
   font-size: 12px;
   }
   .p-text-area, .p-text-area:focus {
   border: none;
   font-weight: 300;
   box-shadow: none;
   color: #c3c3c3;
   font-size: 16px;
   }
   .profile-info .panel-footer {
   background-color:#f8f7f5 ;
   border-top: 1px solid #e7ebee;
   }
   .profile-info .panel-footer ul li a {
   color: #7a7a7a;
   }
   .bio-graph-heading {
   background: #fbc02d;
   color: #fff;
   text-align: center;
   padding: 40px 110px;
   border-radius: 4px 4px 0 0;
   -webkit-border-radius: 4px 4px 0 0;
   font-size: 20px;
   font-weight: 300;
   }
   .bio-graph-info {
   color: #89817e;
   font-size: 16px;
   }
   .bio-graph-info h1 {
   font-size: 22px;
   font-weight: 300;
   margin: 0 0 20px;
   }
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<?php 
   $sql="select * from doctor where id=".$_REQUEST["doctor_id"];
   $result=mysqli_query($link,$sql);
   if(mysqli_affected_rows($link)>0)
   		{	
   			$i=0;
   			while($row=mysqli_fetch_assoc($result))
   		{
   ?>
<div class="container bootstrap snippets bootdey">
   <div class="row">
      <div class="profile-nav col-md-3">
         <div class="panel">
            <div class="user-heading round">
               <a href="#">
               <img src="<?php echo 'admin/upload/' . $row['photo']; ?>" >   </a>
               <h1><?php echo $row['name'];?></h1>
               <p><?php echo $row['email'];?></p>
            </div>
         </div>
      </div>
      <div class="profile-info col-md-9">
         <div class="panel" >
            <div class="bio-graph-heading ">
               Consultation Fees 
               <h1><?php echo $row['fees']?>&#8377;</h1>
            </div>
            <br>
            <div class="panel-body bio-graph-info">
               <div class="row">
                  <div class="col-sm-6">
                     <p><span>Qualification</span>: <?php echo $row['qualification']?></p>
                  </div>
                  <div class="col-sm-6">
                     <p><span>Specialist in</span>: <?php echo $row['category']; ?></p>
                  </div>
                  <div class="col-sm-6">
                     <p><span>Experience </span>: <?php echo $row['experince']; ?> Years</p>
                  </div>
                  <div class="col-sm-6">
                     <p><span>Email </span>: <?php echo $row['email'];?></p>
                  </div>
                  <div class="col-sm-6">
                     <p><span>Gender </span>: <?php echo $row['gender'];?></p>
                  </div>
                  <div class="col-sm-6">
                     <p><span>Location </span>: <?php echo $row['city'];?></p>
                  </div>
                  <div class="col-sm-6">
                     <p><span>Hospital Address </span>: <?php echo $row['hospitaladress'];?></p>
                  </div>
                  <div class="col-sm-6">
                     <p><span>Mediacal ID </span>: <?php echo $row['medicalid'];?></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php $i++; }}?>
   </div>
   <form method="POST" action="">
      <div class="form-group">
         <label for="exampleFormControlTextarea1">
            <h5 style="color:orange;">Symptoms/Reason for appointment :</h5>
         </label>
         <textarea required class="form-control" rows="3" name="reason"></textarea>
         <br>
      </div>
      <div class="row">
         <div class="col-sm-6">
            <input type="date" class="form-control" name="date" id="from" >
         </div>
         <div class="col-sm-6">
            <?php
               $sql="select * from scheduleappointment where doctorid=".$_REQUEST['doctor_id'];
               	$result1=mysqli_query($link, $sql);
               	if(mysqli_affected_rows($link)>0){
               		$i=0;
               		while($row=mysqli_fetch_assoc($result1))
               		{
               ?>
            <div class="input_field">
               <table id="table_field" class="table">
                  <tr>
                     <th> Select Start Time  </th>
                     <th> Select End Time </th>
                  </tr>
                  <tr>
                     <td>
                        <select name="avaliablefrom" class="custom-select">
                           <option value="" disabled selected>Avaliable from</option>
                           <?php  
                              $datetimelocal_explode=explode(",",$row['datetimelocal']);
                              
                              
                              foreach($datetimelocal_explode as $xx=> $value)
                              	{
                              	//echo '<tr><td><input type="time" value='.($value).'></td></tr>';	
                              	?>
                           <option value="<?php echo $value; ?>"><?php echo "(".$xx.") ". $value; ?></option>
                           <?php
                              }
                              
                              	?>	
                        </select>
                     </td>
                     <td>
                        <select name="selected1" class="custom-select">
                           <option value="" disabled selected>Avaliable to</option>
                           <?php 
                              $time_explode=explode(",",$row['time']);
                              
                              foreach($time_explode as $x=> $values)
                              	{
                              
                              		//echo '<tr><td><input type="time" value='.$value.'></td></tr>';	
                              	?>
                           <option value="<?php echo 	$values; ?>"><?php echo "(".$x.") ". $values;?></option>
                           <?php
                              }
                              	?>
                        </select>
                     </td>
                  </tr>
               </table>
            </div>
            <?php
               $i++;}
               }
            ?>
			<p style="color:red;"><strong>NOTE</strong> &nbsp;&nbsp;&nbsp;**Select same index for time.(Eg:-Avaliable From=0 then Avaliable To=0)</p>         </div>
      </div>
      <br>		
      <div class="row">
         <div class="col">
            <button class="btn btn-success btn-block text-uppercase " onclick="alertbox()" type="submit" name="book">
            Book </button>
         </div>
         <div class="col">
            <a href="http://localhost/appointment/index.php"><input type="button" class="btn btn-light btn-block text-uppercase" value="close" ></a>
         </div>
      </div>
      <br>
      <br>
      <br>
      <br>
   </form>
   <?php 
      if(isset($_REQUEST['book'])){
      $vs= $_POST['avaliablefrom'];
      $vc= $_POST['selected1'];
      $p_id=$_SESSION['paitentid'];
      	$d_id=$_REQUEST['doctor_id'];
      	$daytime=$_REQUEST['date'];
      	$reason=$_POST['reason'];
      	$dt = date('Y-m-d');	
      	$status=0;
      	if($daytime<=$dt){
      ?>
   <div class="alert alert-danger" style="  position: fixed;top: 5px; left:2%; width: 96%;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Select your appointment dates after today.</strong>
   </div>
</div>
<?php 
   }
   else if(array_search("$vs",$datetimelocal_explode)!=array_search("$vc",$time_explode)){?>
<div class="alert alert-danger" style="  position: fixed;top: 5px; left:2%; width: 96%;">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Your time slots not Been match</strong>
</div>
<?php 
   }
   else{
   $qry="INSERT INTO `book_appointment` (`from_paitent_id`, `to_doctor_id`, `booked_on`, `appointment_date`, `appointment_start`, `appointment_end`, `reason`, `status`) VALUES ('$p_id', '$d_id','$dt','$daytime','$vs','$vc','$reason','$status')";
   	$d=mysqli_query($link,$qry);
   
   		if($d)
   		 {?>
<script type='text/javascript'>
   if(confirm("Appointment booked successfully!! You will be informed through your mail. Thankyou!!")){
   window.location.href='show_appointment.php';
   }
</script>
<?php 
   }
   
   else { echo " <b>Error occured </b>";}
   }}
include "footer.php";   
   ?>
