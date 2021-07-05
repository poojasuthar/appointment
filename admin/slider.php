  <?php include"header.php";?>
  <style type="text/css">
  
    .page-wrapper .sidebar-wrapper,
    .sidebar-wrapper .sidebar-brand > a,
    .sidebar-wrapper .sidebar-dropdown > a:after,
    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before,
    .sidebar-wrapper ul li a i,
    .page-wrapper .page-content,
    .sidebar-wrapper .sidebar-search input.search-menu,
    .sidebar-wrapper .sidebar-search .input-group-text,
    .sidebar-wrapper .sidebar-menu ul li a,
    #show-sidebar,
    #close-sidebar {
      -webkit-transition: all 0.3s ease;
      -moz-transition: all 0.3s ease;
      -ms-transition: all 0.3s ease;
      -o-transition: all 0.3s ease;
      transition: all 0.3s ease;
    }
    .page-wrapper {
      height: 100vh;
    }

    .page-wrapper .theme {
      width: 40px;
      height: 40px;
      display: inline-block;
      border-radius: 4px;
      margin: 2px;
    }

    .page-wrapper .theme.chiller-theme {
      background: #1e2229;
    }
    .page-wrapper.toggled .sidebar-wrapper {
      left: 0px;
    }

    @media screen and (min-width: 768px) {
      .page-wrapper.toggled .page-content {
        padding-left: 300px;
      }
    }
    #show-sidebar {
      position: fixed;
      left: 0;
      top: 10px;
      border-radius: 0 4px 4px 0px;
      width: 35px;
      transition-delay: 0.3s;
    }
    .page-wrapper.toggled #show-sidebar {
      left: -40px;
    }
    .sidebar-wrapper {
      width: 260px;
      height: 100%;
      max-height: 100%;
      position: fixed;
      top: 10;
      left: -300px;
      z-index: 999;
    }
    .sidebar-wrapper ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }
    .sidebar-wrapper a {
      text-decoration: none;
    }
    .sidebar-wrapper .sidebar-header {
      padding: 20px;
      overflow: hidden;
    }

    .sidebar-wrapper .sidebar-header .user-pic {
      float: left;
      width: 60px;
      padding: 2px;
      border-radius: 12px;
      margin-right: 15px;
      overflow: hidden;
    }

    .sidebar-wrapper .sidebar-header .user-pic img {
      object-fit: cover;
      height: 100%;
      width: 100%;
    }

    .sidebar-wrapper .sidebar-header .user-info {
      float: left;
    }

    .sidebar-wrapper .sidebar-header .user-info > span {
      display: block;
    }

    .sidebar-wrapper .sidebar-header .user-info .user-role {
      font-size: 2em;
    }

    .sidebar-wrapper .sidebar-header .user-info .user-status {
      font-size: 11px;
      margin-top: 4px;
    }

    .sidebar-wrapper .sidebar-header .user-info .user-status i {
      font-size: 8px;
      margin-right: 4px;
      color: #5cb85c;
    }
    .sidebar-wrapper .sidebar-menu {
      padding-bottom: 10px;
    }

    .sidebar-wrapper .sidebar-menu .header-menu span {
      font-weight: bold;
      font-size: 20px;
      padding: 15px 20px 5px 20px;
      display: inline-block;
    }

    .sidebar-wrapper .sidebar-menu ul li a {
      display: inline-block;
      width: 100%;
      text-decoration: none;
      position: relative;
      padding: 8px 30px 8px 20px;
    }

    .sidebar-wrapper .sidebar-menu ul li a i {
      margin-right: 10px;
      font-size: 12px;
      width: 30px;
      height: 30px;
      line-height: 30px;
      text-align: center;
      border-radius: 4px;
    }

    .sidebar-wrapper .sidebar-menu ul li a:hover > i::before {
      display: inline-block;
      animation: swing ease-in-out 0.5s 1 alternate;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown > a:after {
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
      content: "\f105";
      font-style: normal;
      display: inline-block;
      font-style: normal;
      font-variant: normal;
      text-rendering: auto;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      text-align: center;
      background: 0 0;
      position: absolute;
      right: 15px;
      top: 14px;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu ul {
      padding: 5px 0;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li {
      padding-left: 25px;
      font-size: 13px;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before {
      content: "\f111";
      font-family: "Font Awesome 5 Free";
      font-weight: 400;
      font-style: normal;
      display: inline-block;
      text-align: center;
      text-decoration: none;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      margin-right: 10px;
      font-size: 8px;
    }

    .sidebar-wrapper .sidebar-menu ul li a span.label,
    .sidebar-wrapper .sidebar-menu ul li a span.badge {
      float: right;
      margin-top: 8px;
      margin-left: 5px;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .badge,
    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .label {
      float: right;
      margin-top: 0px;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-submenu {
      display: none;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active > a:after {
      transform: rotate(90deg);
      right: 17px;
    }

    /*--------------------------page-content-----------------------------*/

    .page-wrapper .page-content {
      display: inline-block;
      width: 100%;
      padding-left: 0px;
      padding-top: 20px;
    }

    .page-wrapper .page-content > div {
      padding: 20px 40px;
    }

    .page-wrapper .page-content {
      overflow-x: hidden;
    }
    /*-----------------------------chiller-theme-------------------------------------------------*/
    .chiller-theme .sidebar-wrapper {
        background: #31353D;
    }

    .chiller-theme .sidebar-wrapper .sidebar-header,
    .chiller-theme .sidebar-wrapper .sidebar-search,
    .chiller-theme .sidebar-wrapper .sidebar-menu {
        border-top: 1px solid #3a3f48;
    }

    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
    .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
        border-color: transparent;
        box-shadow: none;
    }

    .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-role,
    .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-status,
    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
    .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text,
    .chiller-theme .sidebar-wrapper .sidebar-brand>a,
    .chiller-theme .sidebar-wrapper .sidebar-menu ul li a,
    .chiller-theme .sidebar-footer>a {
        color: #818896;
    }

    .chiller-theme .sidebar-wrapper .sidebar-menu ul li:hover>a,
    .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active>a,
    .chiller-theme .sidebar-wrapper .sidebar-header .user-info,
    .chiller-theme .sidebar-wrapper .sidebar-brand>a:hover,
    .chiller-theme .sidebar-footer>a:hover i {
        color: #b8bfce;
    }

    .page-wrapper.chiller-theme.toggled #close-sidebar {
        color: #bdbdbd;
    }

    .page-wrapper.chiller-theme.toggled #close-sidebar:hover {
        color: #ffffff;
    }

    .chiller-theme .sidebar-wrapper ul li:hover a i,
    .chiller-theme .sidebar-wrapper .sidebar-dropdown .sidebar-submenu li a:hover:before,
    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu:focus+span,
    .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active a i {
        color: #16c7ff;
        text-shadow:0px 0px 10px rgba(22, 199, 255, 0.5);
    }
    .chiller-theme .sidebar-wrapper .sidebar-menu ul li a i,
    .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown div,
    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
    .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
        background: #3a3f48;
    }
    .chiller-theme .sidebar-wrapper .sidebar-menu .header-menu span {
        color: #6c7b88;
    }
  </style>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

   <script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "22.5%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>
</head>
</head>
  <div class="w3-sidebar w3-card w3-animate-left" style="display:none; background-color: #212F3D; color: #979A9A ;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large pull-right btn-sm" onclick="w3_close()"><i style="font-size:40px;">&times;</i></button>
  <center></center>
 
    <div class="page-wrapper chiller-theme toggled">
	
      <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
      </a>
      <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
          <div class="sidebar-header">
            <div class="user-pic">
              <a href="admin_dashboard.php" target="_blank" style="text-decoration:none; color:gray"> <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                alt="User picture">
            </div>
            <div class="user-info">
             <span class="user-name">Admin
              </span></a>
              <span class="user-status">
                <i class="fa fa-circle"></i>
                <span>Online</span>
              </span>
            </div>
          </div>
          <div class="sidebar-menu">
            <ul>
            
              <li class="header-menu">
                <span>DOCTOR</span>
              </li>
              <li>
                <a href="doctor_request.php">
                  <span>->Pending Doctor's Request</span>
                </a>
              </li>
			  <li>
                <a href="add_doctor.php">
                  <span>-> Add New Doctor</span>
                </a>
              </li>
              <li>
                <a href="display_doctor.php">
                  <span>-> View Doctors</span>
                </a>
              </li>
              <li>
                <a href="rejected_doctors.php">
                  <span>->Rejected Doctor's</span>
                </a>
              </li>
			   
              <li class="header-menu">
                <span>PATIENT</span>
              </li>
               <li>
                <a href="add_paitent.php">
                  <span>-> Add New Patient</span>
                </a>
              </li>
              <li>
                <a href="display_paitent.php"
                  <span>-> View Patient's</span>
                </a>
              </li>

               <li class="header-menu">
                <span>APPOINTMENT</span>
              </li>
              <li>
                <a href="accepted_appointments.php">
                  <span>-> Accepted Appointment</span>
                </a>
              </li>
			  <li>
                <a href="rejected_appointments.php">
                  <span>-> Rejected Appointment</span>
                </a>
              </li>
              <li>
                <a href="pending_appointments.php">
                  <span>-> Pending Appointment</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
	  </div>
	  </div>
	<div id="main">
		<div class="" style="background: -webkit-linear-gradient(left,  white ,#212F3D);">
		<button id="openNav" class="w3-button w3-xlarge" onclick="w3_open()" >&#9776;</button>
		</div>
	</div>
