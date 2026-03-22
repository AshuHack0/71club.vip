<?php  
// Enable error display for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['unohs']) || $_SESSION['unohs'] == null) {
    header("Location: index.php?msg=unauthorized");
    exit;
}

// Include database connection (mysqli)
include "conn.php";
if ($conn->connect_error) {
    die("<strong>Connection Error:</strong> " . htmlspecialchars($conn->connect_error));
}
// Initialize messages
$message = '';
$errorMsg = '';
$currentStatus = null;

// Handle ban/unban action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'], $_POST['uid'])) {
    $uid = intval($_POST['uid']);
    $newStatus = ($_POST['action'] === 'ban') ? 0 : 1;
    $stmt = $conn->prepare("UPDATE shonu_subjects SET status = ? WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param('ii', $newStatus, $uid);
        if ($stmt->execute()) {
            $message = ($newStatus === 0) ? "User has been banned." : "User has been unbanned.";
        } else {
            $errorMsg = "<strong>Update Error:</strong> " . htmlspecialchars($stmt->error);
        }
        $stmt->close();
    } else {
        $errorMsg = "<strong>Prepare Error:</strong> " . htmlspecialchars($conn->error);
    }
}

// Fetch user status if UID is provided via GET
if (isset($_GET['uid']) && $_GET['uid'] !== '') {
    $uid = intval($_GET['uid']);
    $stmt = $conn->prepare("SELECT status FROM shonu_subjects WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param('i', $uid);
        if ($stmt->execute()) {
            $stmt->bind_result($status);
            if ($stmt->fetch()) {
                $currentStatus = (int)$status;
            }
        } else {
            $errorMsg = "<strong>Fetch Execute Error:</strong> " . htmlspecialchars($stmt->error);
        }
        $stmt->close();
    } else {
        $errorMsg = "<strong>Prepare Error:</strong> " . htmlspecialchars($conn->error);
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
  <title>Manage User Status</title>
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
</head>
<body>
     <div class="container-scroller">
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
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="images/faces/face28.png">
          </div>
          <div class="user-name">
              GWINYT
          </div>
          <div class="user-designation">
              Admin
          </div>
        </div>
    <?php include 'compasss.php';?>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0">
              <h4 class="font-weight-bold text-dark">Hi, Mr GWINYT!</h4>
              <p class="font-weight-normal mb-2 text-muted"><?php echo date("F d, Y"); ?></p>
            </div>
          </div>
  <div class="container mt-5">
    <h2 class="mb-4">Search User</h2>
    <?php if ($errorMsg): ?>
      <div class="alert alert-danger"><?php echo $errorMsg; ?></div>
    <?php endif; ?>
    <form method="GET" action="">
      <div class="form-group">
        <label for="uid">Enter User UID:</label>
        <input type="text" id="uid" name="uid" class="form-control" value="<?php echo isset($_GET['uid']) ? htmlspecialchars($_GET['uid']) : ''; ?>" required>
      </div>
      <button type="submit" class="btn btn-primary mt-2">Search</button>
    </form>

    <?php if ($message): ?>
      <div class="alert alert-info mt-3"><?php echo $message; ?></div>
    <?php endif; ?>

    <?php if ($currentStatus !== null): ?>
      <div class="mt-4">
        <p><strong>Current Status:</strong> <?php echo $currentStatus === 1 ? 'Not Banned' : 'Banned'; ?></p>
        <form method="POST" action="">
          <input type="hidden" name="uid" value="<?php echo $uid; ?>">
          <?php if ($currentStatus === 1): ?>
            <button type="submit" name="action" value="ban" class="btn btn-danger">Ban User</button>
          <?php else: ?>
            <button type="submit" name="action" value="unban" class="btn btn-success">Unban User</button>
          <?php endif; ?>
        </form>
      </div>
    <?php elseif (isset($_GET['uid'])): ?>
      <div class="alert alert-warning mt-3">No user found with UID <?php echo htmlspecialchars($_GET['uid']); ?>.</div>
    <?php endif; ?>
  </div>
   <!-- Vendor scripts -->
  <!-- DataTables JS (optional) -->
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <script src="js/dashboard.js"></script>
  <script>
    // Initialize DataTable for enhanced table features
    $(document).ready(function() {
      $('#paymentTable').DataTable({
        fixedHeader: true,
        pageLength: 10,
        lengthMenu: [5, 10, 20, 50],
        responsive: true
      });
    });
  </script>
</body>
</html>