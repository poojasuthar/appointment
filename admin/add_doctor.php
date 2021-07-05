<?php 
	include "header.php";
	include "slider.php";
?>
      <script>
         function myfun(){
         var a=document.getElementById("p1").value;
         if(a.length < 5){
         document.getElementById("message").innerHTML="**Password length must be greater than 5 characters";
         return false;
         }
         if(a.length > 25){
         document.getElementById("message").innerHTML="**Password length must be smaller than 25 characters";
         return false;
         }
         if(a.search(/[A-Z]/)==-1){
         document.getElementById("message").innerHTML="**Password must have atleast one capital letter";
         return false;
         }
         var b=document.getElementById("p2").value;
         if(a!=b){
         document.getElementById("message").innerHTML="**Passwords are not same";
         return false;
         }
         
         }
      </script>
   </head>
   <body>
      <div class="container">
         <div class="row d-flex">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
               <div class="card card-signin my-5" style="width:100%;">
                  <div class="card-body">
                     <h5 class="card-title text-center"><b>Doctor</b>Registration</h5>
                     <br>
                     <form class="form-signin" method="post" enctype="multipart/form-data" onsubmit="return myfun()">
                        <div class="form-group">
                           <input type="text" name="name" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                           <input type="number" name="mobile" class="form-control" placeholder="Mobile Number"required>
                        </div>
                        <div class="form-group">
                           <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <span id="message" style="color:red"></span>
                        <div class="input-group mb-2">
                           <input type="password" id="p1" name="password"  class="form-control" placeholder="Password" >
                           &nbsp;&nbsp;&nbsp;
                           <input type="password" id="p2" name="password"  class="form-control" placeholder="Conform  Password" >
                           <span id="messages"> </span>
                        </div>
                      
                        <div class="form-group">
                           Select Your Gender::
                           <br>
                           <input  type="radio" name="gender" value="male" required >Male<br>
                           <input type="radio" name="gender" value="female" required>Female<br>
                           <input type="radio" name="gender" value="other" required>Other<br>
                        </div>
                        <div class="form-group">
                           <label class="form-control-label" for="input-country">Select DOB</label>
                           <input type="DATE" name="dateofbirth" class="form-control" required>
                        </div>
                        <div class="form-group">
                           <label class="form-control-label" for="input-country">Specialist in</label>
                           <select name="category" class="form-control">
                              <option value="General Physicians"/>General Physicians<br>
                              <option value="Pediatricians"/>Pediatricians<br>
                              <option value="General Surgeon" />General Surgeon<br>
                              <option value="Cardiologist" />Cardiologist<br>
                              <option value="Dentist" />Dentist<br>
                              <option value="Dermatologists"/>Dermatologists<br>
                              <option value="Gynecologist" />Gynecologist<br>
                              <option value="ENT Specialist" />ENT Specialist<br>
                           </select>
                        </div>
                        <div class="form-group" >
                           <input type="number" name="experince" class="form-control" placeholder="Experience" required>
                        </div>
						<div class="form-group" >
                           <input type="text" name="city" class="form-control" placeholder="City" required>
                        </div>
                        <div class="form-group">
                           <textarea name="hospitaladress" class="form-control" placeholder="Hospita/clinic Address" required></textarea>
                        </div>
                        <div class="form-group">
                           <input type="text" name="medicalid" class="form-control" placeholder="Medical ID" required>
                        </div>
                        <div class="form-group">
                           <input type="text" name="fees" class="form-control" placeholder="Fees" required>
                        </div>
                        <div class="form-group">
                           <input type="text" name="qualification" class="form-control" placeholder="Qualification" required>
                        </div>
                        <div class="form-group">
                           <input type="file" name="photo" id="photo" class="form-control"> 
                        </div>
                        <button class="btn btn-lg btn-success btn-block text-uppercase" name="b1" type="submit">Sign in</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
<?php
   include "config_appointment.php";
   if(isset($_POST["b1"]))
   {
   	$Name=$_POST["name"];
   	$Mobile=$_POST["mobile"];
   	$Email=$_POST["email"];
   	$Password=$_POST["password"];
   	$Gender=$_POST["gender"];
   	$dob= date('Y-m-d',strtotime($_POST['dateofbirth']));
   	$Category=$_POST["category"];
   	$Experince=$_POST["experince"];
   	$City=$_POST["city"];
   	$Hospitaladress=$_POST["hospitaladress"];
   	$Medicalid=$_POST["medicalid"];
   	$Fees=$_POST["fees"];
   	$Qualification=$_POST["qualification"];
   	$fn1=time().$_FILES["photo"]["name"];
   //check email exists 	
   	$check=mysqli_query($link,"select email from doctor where email='$Email'");
   	$qry2=mysqli_num_rows($check);
   	if(($qry2)>0)
   	{
   ?>
<div class="alert alert-danger" style="  position: fixed;top: 5px; left:2%; width: 96%;">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Email</strong>&nbsp;already exists.
</div>
<?php 
   }
     else
     {
     $qry="insert into doctor(name,mobile,email,password,gender,dob,category,experince,city,hospitaladress,medicalid,fees,qualification,photo,status) values ('$Name','$Mobile','$Email','$Password','$Gender','$dob','$Category','$Experince','$City','$Hospitaladress','$Medicalid','$Fees','$Qualification','$fn1',0)";
     mysqli_query($link,$qry);
  	 if($qry){
		 ?>		
		<script language="javascript">
			alert("Your Registration request has been sent successfully. Just wait!! You will be notified in your email");
		</script>
	
<?php 
		}
      if($_FILES["photo"]["size"]>0)
     		{
     			move_uploaded_file($_FILES["photo"]["tmp_name"],"../admin/upload/$fn1");
     		}	
     mysqli_close($link);
   }}
     ?>