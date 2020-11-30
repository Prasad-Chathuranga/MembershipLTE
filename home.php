<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>HOME</title>

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/sandstone/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- -->
     <!-- datatable lib -->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>

  <body>


    <nav class="navbar navbar-expand-lg navbar-light shadow-lg bg-light">
      <a class="navbar-brand" href="#">Membership Application</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" style="font-size: 15px;" href="home.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-size: 15px;" data-toggle="modal" data-target="#newUser" href="#">New User<i class="fa fa-user ml-2" style="color: #1F77D7;" aria-hidden="true"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-size: 15px;" href="#">New Submission<i class="fa fa-clock-o ml-2" style="color: #F2C244 ;" aria-hidden="true"></i></a>
          </li>

          <a class="nav-link" href="logout.php" style="font-size: 15px; color: #131531; ">Welcome , <?php echo $_SESSION['name']; ?> ! <i class="fa fa-power-off ml-2" style="color: red;" aria-hidden="true"></i></a>

        </ul>
      </div>
    </nav>

    <div class="modal" id="newUser">
      <div class="modal-dialog modal-dialog-center" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add New User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form method="POST" action="addUser.php">
              <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your User Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your User Name">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Mobile Number</label>
                <input type="tel" name="mobile" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Contact Number">
              </div>


          </div>
          <div class="modal-footer">
            <button type="submit" name="add" class="btn btn-primary">Add User</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <style>
      .modal-dialog-center {
        margin-top: 10%;
      }
    </style>


    <script type="text/javascript">
      swal("", " <?php echo $_SESSION['result'] ?> ", "success");
    </script>

    <!---------------------------------------- Table -------------------------------------->

  



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
      $(function() {
        $('.navbar-toggler').click(function() {
          $('body').toggleClass('noscroll');
        })
      });
    </script>
  </body>

  </html>

  <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script> 

<?php
} else {
  header("Location: index.php");
  exit();
}
?>