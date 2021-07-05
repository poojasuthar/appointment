<?php
session_start();
   if(!isset($_SESSION['admin'])){
   	header('location:AdminLogin.php');
   }
   include "header.php";
   include "slider.php";
   include "config_appointment.php";
   ?>
<div class="py-5 team3 bg-light">
   <div class="container">
      <div class="row justify-content-center mb-4">
         <div class="col-md-7 text-center">
            <h1><i class="fa fa-user"></i> &nbsp;Admin Dashboard</h1>
         </div>
      </div>
      <div class="row">
         <!-- column  -->
         <div class="col-lg-4 mb-4">
            <!-- Row -->
            <div class="row">
               <a href="display_paitent.php">
                  <div class="col-md-12">
                     <img src="totalpatient.png" alt="wrapkit" class="img-fluid" width="80%;" />
                  </div>
                  <div class="col-md-12">
                     <div class="pt-2">
                        <h4 class="mt-4 font-weight-medium mb-0">Total Patient &nbsp;&nbsp;
                           <strong>
                           <?php 
                              foreach($link->query('SELECT COUNT(*) FROM paitent') as $row) {
                              echo $row['COUNT(*)'];
                              }
                              ?>
                           </strong>
                        </h4>
                     </div>
                  </div>
               </a>
            </div>
            <!-- Row -->
         </div>
         <!-- column  -->
         <!-- column  -->
         <div class="col-lg-4 mb-4">
            <!-- Row -->
            <div class="row">
               <a href="display_doctor.php">
                  <div class="col-md-12 pro-pic">
                     <img src="totaldoctor.png" alt="wrapkit" class="img-fluid" width="80%;"/>
                  </div>
                  <div class="col-md-12">
                     <div class="pt-2">
                        <h4 class="mt-4 font-weight-medium mb-0">Total Doctor &nbsp;&nbsp;
                           <strong>
                           <?php 
                              foreach($link->query('SELECT COUNT(*) FROM doctor where status=1') as $row) {
                              echo $row['COUNT(*)'];
                              }
                              ?>
                           </strong>
                        </h4>
                     </div>
                  </div>
               </a>
            </div>
            <!-- Row -->
         </div>
         <!-- column  -->
         <div class="col-lg-4 mb-4">
            <!-- Row -->
            <div class="row">
               <a href="pending_appointments.php">
                  <div class="col-md-12 pro-pic">
                     <img src="totalappointment.png" alt="wrapkit" class="img-fluid" width="80%;"/>
                  </div>
                  <div class="col-md-12">
                     <div class="pt-2">
                        <h4 class="mt-4 font-weight-medium mb-0">Pending Appointment &nbsp;&nbsp;
                           <strong>
                           <?php 
                              foreach($link->query('SELECT COUNT(*) FROM book_appointment where status=0') as $row) {
                              echo $row['COUNT(*)'];
                              }
                              ?>
                           </strong>
                        </h4>
                     </div>
                  </div>
               </a>
            </div>
            <!-- Row -->
         </div>
         <!-- column  -->
      </div>
   </div>
</div>
</body>
</html>