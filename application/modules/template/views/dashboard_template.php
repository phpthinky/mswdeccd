<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MSWD ECCD</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('assets')?>/plugins/bootstrap-select-1.13.14/css/bootstrap-select.css">

  <link rel="stylesheet" href="<?=base_url('assets')?>/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=base_url('assets')?>/main-style.v-0.0.0.css">
  <style type="text/css">
    
  </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:forestgreen !important; color: #fff !important;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=site_url()?>" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link"  data-widget="fullscreen" href="<?=site_url('login/signout')?>" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:forestgreen !important;">
    <!-- Brand Logo -->
    <a href="<?=site_url()?>" class="brand-link">
      <img src="<?=base_url('assets')?>/img/mswdlogo45x38.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MSWD ECCD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">


          <?php $id = $this->session->userdata('workersId');
                $profile = base_url('assets/dist/img/user2-160x160.jpg');
                $activeuser = 'Administrator';
                if($info = $this->workers_model->getWorker($id)){

                $activeuser = $info->fName;
                $profile = $info->profile;
                if(empty($profile)){
                  switch ($info->gender) {
                    case '2':
                      // code...
                      break;
                      $profile = base_url('assets/dist/img/user4-128x128');
                    default:
                      // code...
                      $profile = base_url('assets/dist/img/user2-160x160.jpg');
                      break;
                  }
                }
                }
           ?>
                   <div class="image">
          <img src="<?=$profile?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">

          <a href="#" class="d-block"><?=$activeuser?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=site_url('dashboard')?>" class="nav-link active-out">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>

          <?php if ($this->aauth->is_admin()): ?>
            
          <li class="nav-item">
            <a href="<?=site_url('pupils')?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                ECCD Records
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('workers')?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Daycare Worker
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('centers')?>" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Daycare Center
              </p>
            </a>
          </li>

          <?php endif ?>

<?php if (!$this->aauth->is_admin()): ?>
  
          <li class="nav-item">
            <a href="<?=site_url('workers/profile/'.$this->session->userdata('workersId'))?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                My Account
              </p>
            </a>
          </li>

<?php endif ?>
<?php if ($this->aauth->is_admin()): ?>
  
          <li class="nav-item">
            <a href="#<?=site_url('report/nutritions')?>" class="nav-link">
              <i class="nav-icon fas fa-cross"></i>
              <p>
                Nutrition
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#<?=site_url('report/assessments')?>" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Assessment
              </p>
            </a>
          </li>
          

          <li class="nav-item">
            <a href="#<?=site_url('reports')?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          
<?php endif ?>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">8</span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="<?=site_url('settings/rawscoretable')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Raw Score Table</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?=site_url('settings/sumscaledscore')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sum of Scaled Score</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?=site_url('settings/schoolyear')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>School Year</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?=site_url('weighing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Weighing Schedule</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?=site_url('settings/zscore')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Z-Score Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('settings/feeding')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Feeding Schedule</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?=site_url('settings/assessment')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assessment Schedule</p>
                </a>
              </li>

          <?php if ($this->aauth->is_admin()): ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Site Settings</p>
                </a>
              </li>
          <?php endif ?>
              
              <li class="nav-item">
                <a href="<?=site_url('users')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Account Settings</p>
                </a>
              </li>

          <?php if ($this->aauth->is_admin()): ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Backup Data</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    <!-- Main content -->
    <?php $this->load->view($content); ?>
    <!-- /.content -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2023 <a href="#">MSWD ECCD</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url('assets')?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('assets')?>/plugins/bootstrap-select-1.13.14/js/bootstrap-select.min.js"></script>

<!-- AdminLTE App -->
<script src="<?=base_url('assets')?>/dist/js/adminlte.min.js"></script>

<script src="<?=base_url('assets')?>/plugins/chart.js/Chart.min.js"></script>

<script src="<?=base_url('assets')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets')?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('assets')?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('assets')?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url('assets')?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url('assets')?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url('assets')?>/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url('assets')?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script type="text/javascript">
    var current_url  ='<?=current_url()?>';
    var site_url  ='<?=site_url()?>';
    var base_url  ='<?=base_url()?>';
</script>
<script src="<?=base_url('assets/main-script.js')?>"></script>

<?php $this->load->view('core/js'); ?>
</body>
</html>
