<?php
session_start();



if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Customer | Membership LTE  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="logout.php"role="button">
        <i class="fas fa-power-off mr-2"></i>Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Membership LTE </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Hello <?php echo $_SESSION['name']; ?> !</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      
  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Customer Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addCustomerForm.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Add New Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="viewCustomers.php" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>View All Customers</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Submission Details
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addSubmissionForm.php" class="nav-link">
                  <i class="fa fa-clock nav-icon"></i>
                  <p>Add New Submission</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="viewAllSubmissions.php" class="nav-link">
                  <i class="fa fa-th nav-icon"></i>
                  <p>View All Submissions</p>
                </a>
              </li>
            </ul>
          </li>
      
           </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Total Amount</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">View Total By MEM_ID</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 <!-- Main content -->
 <section class="content mt-3">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <!-- general form elements -->
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Search By MEM_ID</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="getTotalAmount.php" method="POST">
              <?php $_POST = array(); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter Membership ID</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="mem_id" placeholder="Enter Membership ID">
                  </div> 
                  <div class="form-group">
                  <button type="submit" name="get_amount" class="btn btn-danger">Search</button>
                </div>
                </div>
                <!-- /.card-body -->
               
              </form>
            </div>
            <!-- /.card -->

            <?php if(isset($_SESSION['total_error'])){ ?>

<script type="text/javascript">
swal("", " <?php echo $_SESSION['total_error'] ?> ", "warning");
</script>


<?php }
    unset ($_SESSION['total_error']);
?>


          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-9">
            <!-- general form elements disabled -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Total Amount Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                  <thead>
                  <tr>
                    <th>Customer Name</th>
                    <th>Toatal Amount</th>
                    <th>Membership ID</th>
     
                  </tr>
                  </thead>


                  <?php if (isset($_SESSION['customer'])) { ?>
                 
                  <tr>
                  <th><?php echo $_SESSION['customer'] ?></th>
                    <th><?php echo $_SESSION['total_amount'] ?></th>
                    <th><?php echo $_SESSION['member'] ?></th>

                    <?php } ?>

                    <?php 
  unset($_SESSION['customer']);
  unset($_SESSION['total_amount']);
  unset($_SESSION['member']); ?>


               
                  </tr>
               
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->

</body>
</html>
<?php
} else {
  header("Location: index.php");
  exit();
}
?>