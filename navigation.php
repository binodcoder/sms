<!doctype html>
<html lang='en'>
<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <a class="nav-link" href="index.php"><font size='4px' color='#000066'><b>Home</b></font></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php"><font size='4px' color='#000066'><b>About us</b></font></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="academic.php"><font size='4px' color='#000066'><b>Academics</b></font></a>
        </li>
        <li>
          <a class="nav-link" href="notice.php"><font size='4px' color='#000066'><b>Notice</b></font></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="event.php"><font size='4px' color='#000066'><b>Event</b></font></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gallary.php"><font size='4px' color='#000066'><b>Gallary</b></font></a>
        </li>

        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="mydropdown" aria-haspopup="true" aria-expanded="false"><font size='5px' color='#000066'><b>Login</b></font></a>
          <div class="dropdown-menu" aria-labelledby="#mydropdown">
           <a href="admin/login.php" class="dropdown-item"> <b>Login As Admin</b></a>
           <a class="dropdown-item" href="teacherlogin.php"> <b>Login As Teacher</b></a>
           <a class="dropdown-item" href="guardianlogin.php"> <b>Login As Guardian</b></a>
           <a class="dropdown-item" href="login.php"><b> Login As Student</b></a>
         </div>
       </li>

     </ul>
     <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src = "js/bootstrap.js"></script>
</body>
</html>