<?php
    session_start();
    if($_SESSION['unohs'] == null){
        header("location:index.php?msg=unauthorized");
        exit;
    }
    include("conn.php");
    
    $msg = "";
    // Process form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        // A checkbox only sends a value when ticked, so if it's not set, use 0.
        $copy_trends = isset($_POST['copy_trends']) ? 1 : 0;
        $sql = "UPDATE parametredepaiement SET copy_trends = $copy_trends WHERE suckit = 1";
        if(mysqli_query($conn, $sql)){
            $msg = "Setting updated successfully.";
        } else {
            $msg = "Error updating setting: " . mysqli_error($conn);
        }
    }
    
    // Retrieve current value for the tick box
    $sql = "SELECT copy_trends FROM parametredepaiement WHERE suckit = 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $current = isset($row['copy_trends']) ? $row['copy_trends'] : 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard - Update Withdrawal Gateway</title>
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css"/>
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars-o.css">
  <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css">
  <link rel="shortcut icon" href="images/favicon.png" />
  <style>
	.cool-input {
        border: 2px solid #007bff;
        border-radius: 0.25rem;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    .cool-input:focus {
        border-color: #0056b3;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .cool-input::placeholder {
        color: #6c757d;
        opacity: 1;
    }
	.cool-button {
        padding: 0.5rem 1rem;
        font-size: 1rem;
        border-radius: 0.25rem;
        transition: all 0.3s ease;
    }
    .cool-button:hover {
        background-color: #0056b3;
        color: #fff;
    }
    .cool-button.btn-secondary:hover {
        background-color: #343a40;
        color: #fff;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- Navbar -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="dashboard.php"><img src="images/logo.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="images/logo-mini.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>       
        <ul class="navbar-nav navbar-nav-right">           
          <li class="nav-item dropdown d-flex mr-4 ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>              
              <a class="dropdown-item preview-item" href="logout.php">
                  <i class="icon-inbox"></i> Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    
    <!-- Sidebar and Main Panel -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="images/faces/sparky.png">
          </div>
          <div class="user-name">
            Heisenberg x sXm
          </div>
          <div class="user-designation">
            Developer
          </div>
        </div>
        <?php include 'compass.php'; ?>
      </nav>
      
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0"><h4>Update Copy Trends Setting</h4></div>
          </div>
          <?php if($msg != "") { ?>
              <div class="alert alert-info"><?php echo $msg; ?></div>
          <?php } ?>
          <div class="row">
            <div class="col-md-12">
              <form action="" method="post" id="gatewayForm" autocomplete="off">
                <div class="form-group">
                  <label for="copy_trends">Copy Trends</label><br>
                  <input type="checkbox" id="copy_trends" name="copy_trends" value="1" <?php if($current == 1) echo "checked"; ?>>
                  <label for="copy_trends">Tick this box to enable copy trends (If enabled, manual prediction won't work)</label>
                </div>
                <button type="submit" class="btn btn-primary cool-button">Save</button>
              </form>
            </div>
          </div>
        </div>
        
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">© Heisenberg x sXm</span>
          </div>
        </footer>
      </div>
    </div>
  </div>
  
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <script src="js/dashboard.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
  </script>
</body>
</html>