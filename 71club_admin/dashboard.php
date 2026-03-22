<?php
session_start();
if ($_SESSION['unohs'] == null) {
  header('location:index.php?msg=unauthorized');
}
date_default_timezone_set('Asia/Kolkata');
?>
<?php
include ('conn.php');

$curdate = date('Y-m-d h:i:s');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css"/>
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars-o.css">
  <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />

  <style>
.content-wrapper {
  padding: 1.5rem;
}

.content-wrapper .row {
  display: flex;
  flex-wrap: wrap;
  margin: -0.75rem;        /* match the column padding below */
  align-items: stretch;    /* make all .col-* equal height */
}
/* Make each column a flex container so its card can flex-grow */
.content-wrapper .row > [class*="col-"] {
  padding: 0.75rem;        /* gutter space */
  display: flex;
}

/* --- DASHBOARD CARD STYLING --- */
.dashboard-card {
  background-color: var(--card-bg) !important;
  color: var(--text-dark) !important;
  border: 1px solid #e5e7eb;
  border-radius: 0.75rem !important;  /* 12px */
  box-shadow: 0 1px 3px rgba(0,0,0,0.07),
              0 1px 2px rgba(0,0,0,0.05);
  padding: 1.5rem !important;         /* 24px */
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  transition: all 0.3s ease-in-out;
  animation: fadeIn 0.5s ease-out forwards;
  /* key new bits: */
  flex: 1;                   /* fill entire column */
  box-sizing: border-box;    /* include border/padding in size */
}
/* Staggered fade-in delays (optional) */
.dashboard-card:nth-child(1)  { animation-delay: 0.1s; }
.dashboard-card:nth-child(2)  { animation-delay: 0.2s; }
.dashboard-card:nth-child(3)  { animation-delay: 0.3s; }
/* … through nth-child(12) … */

.dashboard-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.dashboard-card .card-icon {
  background-color: #eef2ff;
  color: var(--accent-blue);
  border-radius: 50%;
  height: 48px;
  width: 48px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
}

.dashboard-card .card-title {
  color: var(--text-muted-dark);
  font-size: 0.875rem; /* 14px */
  font-weight: 500;
  margin-bottom: 0.5rem;
}

.dashboard-card .card-value {
  color: var(--text-dark);
  font-size: 1.8rem; /* 30px */
  font-weight: 700;
  line-height: 1.2;
}

.dashboard-card .panel-footer {
  margin-top: 1rem;
  border-top: 1px solid #e5e7eb;
  padding-top: 0.75rem;
}
.dashboard-card .panel-footer a {
  text-decoration: none;
  color: var(--accent-blue) !important;
  font-weight: 500;
  font-size: 0.8rem;
  transition: color 0.2s ease;
}
.dashboard-card .panel-footer a:hover {
  color: var(--primary-dark) !important;
}
  </style>
  </head>
<body>
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
            <img src="images/faces/sparky.png">
          </div>
          <div class="user-name">
              SPA4KY
          </div>
          <div class="user-designation">
              Admin
          </div>
        </div>
        <?php include 'compass.php'; ?>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
          <?php
          $chkserial = mysqli_query($conn, "select * from `nirvahaka_shonu` where `unohs`='" . $_SESSION['unohs'] . "'");
          $salu = mysqli_fetch_array($chkserial);
          $dashboard = $salu['dashboard'];
          if ($dashboard == 1) {
            ?>
          <div class="row">
            <!-- User Stats -->
            <div class="col-md-3 grid-margin stretch-card">
              <div class="dashboard-card bg-primary-gradient">
                <div class="card-icon">
                  <i class="mdi mdi-account-multiple"></i>
                </div>
                <div class="card-title">Today User Join</div>
                <div class="card-value">
                  <?php
                  $result = mysqli_query($conn, "SELECT count(*) as 'total_user' FROM shonu_subjects where status = 1 AND id NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(createdate) = DATE('" . $curdate . "')");
                  if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $total_user = $row['total_user'];
                    echo $total_user;
                  } else {
                    echo '0';
                  }
                  ?>
                </div>
                <div class="card-footer">
                  <a href="manage_user.php">View Details <i class="mdi mdi-arrow-right"></i></a>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 grid-margin stretch-card">
              <div class="dashboard-card bg-info-gradient">
                <div class="card-icon">
                  <i class="mdi mdi-account-group"></i>
                </div>
                <div class="card-title">Total Users</div>
                <div class="card-value">
                  <?php
                  $result = mysqli_query($conn, "SELECT count(*) as 'total_user' FROM shonu_subjects where id NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND status = 1");
                  if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $total_user = $row['total_user'];
                    echo $total_user;
                  } else {
                    echo '0';
                  }
                  ?>
                </div>
                <div class="card-footer">
                  <a href="manage_user.php">View Details <i class="mdi mdi-arrow-right"></i></a>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 grid-margin stretch-card">
              <div class="dashboard-card bg-purple-gradient">
                <div class="card-icon">
                  <i class="mdi mdi-wallet"></i>
                </div>
                <div class="card-title">User Balance</div>
                <div class="card-value">
                  <?php
                  $result = mysqli_query($conn, "SELECT sum(motta) as 'wallt' FROM shonu_kaichila where balakedara NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND motta > 0");
                  if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $zero_bl = $row['wallt'];
                    echo number_format($zero_bl, 2);
                  } else {
                    echo '0';
                  }
                  ?>
                </div>
                <div class="card-footer">
                  <a href="manage_user.php">View Details <i class="mdi mdi-arrow-right"></i></a>
                </div>
              </div>
            </div>
            
            <!-- Recharge Stats -->
            <div class="col-md-3 grid-margin stretch-card">
              <div class="dashboard-card bg-success-gradient">
                <div class="card-icon">
                  <i class="mdi mdi-cash-multiple"></i>
                </div>
                <div class="card-title">Today's Recharge</div>
                <div class="card-value">
                  <?php
                  $result = mysqli_query($conn, "SELECT sum(motta) as 'pending' FROM thevani WHERE sthiti = '1' AND balakedara NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(dinankavannuracisi) = DATE('" . $curdate . "')");
                  if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $pending = $row['pending'];
                    echo number_format($pending, 0);
                  } else {
                    echo '0';
                  }
                  ?>
                </div>
                <div class="card-footer">
                  <a href="deposit_update.php">View Details <i class="mdi mdi-arrow-right"></i></a>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 grid-margin stretch-card">
              <div class="dashboard-card bg-warning-gradient">
                <div class="card-icon">
                  <i class="mdi mdi-cash-clock"></i>
                </div>
                <div class="card-title">Pending Recharge</div>
                <div class="card-value">
                  <?php
                  $result = mysqli_query($conn, "SELECT sum(motta) as '2' FROM thevani where balakedara NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND sthiti = '0'");
                  if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $pending = $row['2'];
                    echo number_format($pending);
                  } else {
                    echo '0';
                  }
                  ?>
                </div>
                <div class="card-footer">
                  <a href="deposit_update.php">View Details <i class="mdi mdi-arrow-right"></i></a>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 grid-margin stretch-card">
              <div class="dashboard-card bg-teal-gradient">
                <div class="card-icon">
                  <i class="mdi mdi-cash-check"></i>
                </div>
                <div class="card-title">Success Recharge</div>
                <div class="card-value">
                  <?php
                  $result = mysqli_query($conn, "SELECT sum(motta) as 'pending' FROM thevani where balakedara NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND sthiti = '1'");
                  if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $pending = $row['pending'];
                    echo number_format($pending, 0);
                  } else {
                    echo '0';
                  }
                  ?>
                </div>
                <div class="card-footer">
                  <a href="deposit_update.php">View Details <i class="mdi mdi-arrow-right"></i></a>
                </div>
              </div>
            </div>
            
            <!-- Withdrawal Stats -->
            <div class="col-md-3 grid-margin stretch-card">
              <div class="dashboard-card bg-danger-gradient">
                <div class="card-icon">
                  <i class="mdi mdi-bank-transfer-out"></i>
                </div>
                <div class="card-title">Today's Withdrawal</div>
                <div class="card-value">
                  <?php
                  $result = mysqli_query($conn, "SELECT sum(motta) as 'succ_w' FROM hintegedukolli where sthiti = 1 AND balakedara NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(dinankavannuracisi) = DATE('" . $curdate . "')");
                  if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $succ_w = $row['succ_w'];
                    echo number_format($succ_w, 0);
                  } else {
                    echo '0';
                  }
                  ?>
                </div>
                <div class="card-footer">
                  <a href="withdraw_accept_list.php">View Details <i class="mdi mdi-arrow-right"></i></a>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 grid-margin stretch-card">
              <div class="dashboard-card bg-pink-gradient">
                <div class="card-icon">
                  <i class="mdi mdi-bank-transfer"></i>
                </div>
                <div class="card-title">Total Withdrawal</div>
                <div class="card-value">
                  <?php
                  $result = mysqli_query($conn, "SELECT sum(motta) as 'pending_w' FROM hintegedukolli where balakedara NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND sthiti = '1'");
                  if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $pending_w = $row['pending_w'];
                    echo number_format($pending_w);
                  } else {
                    echo '0';
                  }
                  ?>
                </div>
                <div class="card-footer">
                  <a href="withdraw_accept_list.php">View Details <i class="mdi mdi-arrow-right"></i></a>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 grid-margin stretch-card">
              <div class="dashboard-card bg-indigo-gradient">
                <div class="card-icon">
                  <i class="mdi mdi-bank-transfer-in"></i>
                </div>
                <div class="card-title">Withdrawal Requests</div>
                <div class="card-value">
                  <?php
                  $result = mysqli_query($conn, "SELECT sum(motta) as 'approve_withdrawal' FROM hintegedukolli where balakedara NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND sthiti = '0'");
                  if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    $approve_withdrawal = $row['approve_withdrawal'];
                    echo number_format($approve_withdrawal);
                  } else {
                    echo '0';
                  }
                  ?>
                </div>
                <div class="card-footer">
                  <a href="manage_withdraw.php">View Details <i class="mdi mdi-arrow-right"></i></a>
                </div>
              </div>
            </div>
            
            <!-- Betting Stats -->
            <div class="col-md-3 grid-margin stretch-card">
              <div class="dashboard-card bg-warning-gradient">
                <div class="card-icon">
                  <i class="mdi mdi-dice-multiple"></i>
                </div>
                <div class="card-title">Today's Total Bet</div>
                <div class="card-value">
                  <?php
                  $bet_wingo_1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(ketebida) as total FROM `bajikattuttate` where byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_wingo_3 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(ketebida) as total FROM `bajikattuttate_drei` where byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_wingo_5 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(ketebida) as total FROM `bajikattuttate_funf` where byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_wingo_10 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(ketebida) as total FROM `bajikattuttate_zehn` where byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_k3_1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(ketebida) as total FROM `bajikattuttate_kemuru` where byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_k3_3 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(ketebida) as total FROM `bajikattuttate_kemuru_drei` where byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_k3_5 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(ketebida) as total FROM `bajikattuttate_kemuru_funf` where byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_k3_10 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(ketebida) as total FROM `bajikattuttate_kemuru_zehn` where byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_5d_1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(ketebida) as total FROM `bajikattuttate_aidudi` where byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_5d_3 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(ketebida) as total FROM `bajikattuttate_aidudi_drei` where byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_5d_5 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(ketebida) as total FROM `bajikattuttate_aidudi_funf` where byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_5d_10 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(ketebida) as total FROM `bajikattuttate_aidudi_zehn` where byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $total_bet = $bet_wingo_1['total'] + $bet_wingo_3['total'] + $bet_wingo_5['total'] + $bet_wingo_10['total'] + $bet_k3_1['total'] + $bet_k3_3['total'] + $bet_k3_5['total'] + $bet_k3_10['total'] + $bet_5d_1['total'] + $bet_5d_3['total'] + $bet_5d_5['total'] + $bet_5d_10['total'];
                  $asila = $total_bet;
                  echo number_format($total_bet, 2);
                  ?>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 grid-margin stretch-card">
              <div class="dashboard-card bg-success-gradient">
                <div class="card-icon">
                  <i class="mdi mdi-trophy"></i>
                </div>
                <div class="card-title">Today's Total Win</div>
                <div class="card-value">
                  <?php
                  $bet_wingo_1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(sesabida) as total FROM `bajikattuttate` where `phalaphala` = 'gagner' AND byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_wingo_3 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(sesabida) as total FROM `bajikattuttate_drei` where `phalaphala` = 'gagner' AND byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_wingo_5 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(sesabida) as total FROM `bajikattuttate_funf` where `phalaphala` = 'gagner' AND byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_wingo_10 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(sesabida) as total FROM `bajikattuttate_zehn` where `phalaphala` = 'gagner' AND byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_k3_1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(sesabida) as total FROM `bajikattuttate_kemuru` where `phalaphala` = 'gagner' AND byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_k3_3 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(sesabida) as total FROM `bajikattuttate_kemuru_drei` where `phalaphala` = 'gagner' AND byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_k3_5 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(sesabida) as total FROM `bajikattuttate_kemuru_funf` where `phalaphala` = 'gagner' AND byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_k3_10 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(sesabida) as total FROM `bajikattuttate_kemuru_zehn` where `phalaphala` = 'gagner' AND byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_5d_1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(sesabida) as total FROM `bajikattuttate_aidudi` where `phalaphala` = 'gagner' AND byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_5d_3 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(sesabida) as total FROM `bajikattuttate_aidudi_drei` where `phalaphala` = 'gagner' AND byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_5d_5 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(sesabida) as total FROM `bajikattuttate_aidudi_funf` where `phalaphala` = 'gagner' AND byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $bet_5d_10 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(sesabida) as total FROM `bajikattuttate_aidudi_zehn` where `phalaphala` = 'gagner' AND byabaharkarta NOT IN (SELECT balakedara FROM `demo` WHERE `sthiti`='1') AND DATE(tiarikala) = DATE('" . $curdate . "')"));
                  $total_bet = $bet_wingo_1['total'] + $bet_wingo_3['total'] + $bet_wingo_5['total'] + $bet_wingo_10['total'] + $bet_k3_1['total'] + $bet_k3_3['total'] + $bet_k3_5['total'] + $bet_k3_10['total'] + $bet_5d_1['total'] + $bet_5d_3['total'] + $bet_5d_5['total'] + $bet_5d_10['total'];
                  $gala = $total_bet;
                  echo number_format($total_bet, 2);
                  ?>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 grid-margin stretch-card">
              <div class="dashboard-card bg-danger-gradient">
                <div class="card-icon">
                  <i class="mdi mdi-chart-line"></i>
                </div>
                <div class="card-title">Today's Profit</div>
                <div class="card-value">                  
                  <?php
                  $amount = $asila - $gala;
                  echo round($amount, 2);
                  ?>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Powered by SPA4KY Admin</span>
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
</body>
</html>