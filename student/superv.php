<?php 
  // include ('dbsession.php');
  // if($_SESSION['c_ic']!='ADMIN')
  // {
  // header('location:../index.php');
  // }
 include ('dbconnect.php');
  $sqla= "SELECT * FROM tb_proposal
  LEFT JOIN tb_status on tb_proposal.statID = tb_status.statusID
  LEFT JOIN pojname on tb_proposal.proptype = pojname.projTypeID";
  $resulta = mysqli_query($con, $sqla) ;
  $row=mysqli_fetch_array($resulta);
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PSMOne</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="admin.php">PSMOne</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <!-- <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"> -->
        <div class="input-group-append">
         <!--  <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button> -->
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">

      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      
      <li class="nav-item">
        <a class="nav-link" href="student.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Proposal</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="superv.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Supervisor</span></a>
      </li>

    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="admin.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           List of Lecture</div>
          <div class="card-body">
        <!--     ADD ID HERE -->
            <div class="card-body"> <b>CURRENT SUPERVISOR: <?php " "; echo $row['supName'] ; ?></b> </div>
          </div>

            <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                   <tr>
                    <th>Proposal Title</th>
                    <th>Proposal Type</th>
                    <th>Upload Form</th>
                    <th>Proposal Status</th>
                    <th>Evaluator Comment</th>
                  </tr>
              </thead>
              <tbody>
                   <?php
                    $sqla= "SELECT * FROM tb_proposal
                            LEFT JOIN tb_status on tb_proposal.statID = tb_status.statusID
                            LEFT JOIN pojname on tb_proposal.proptype = pojname.projTypeID";
                    //WHERE studnName = session ID";
                    $resulta = mysqli_query($con, $sqla) ;
                      while($row=mysqli_fetch_array($resulta))
                      {
                        echo "<tr>";
                        echo "<td>".$row['propName']."</td>";
                          
                        echo "<td>".$row['projName']."</td>";
                        
                        echo "<td>";
                        echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#formModal" data-whatever="'.$row['proposalID'].'">
                                  Upload
                                </button>';
                        echo "</td>";

                        echo "<td>".$row['statInfo']."</td>";

                        echo "<td>".$row['evalComment']."</td>";

                        echo "</tr>";
                      }
                      ?>
                </tbody>
              </table>
              <br>
              <button type="button" class="btn btn-primary" style="float: right" data-toggle="modal" data-target="#myModal">Add Proposal</button>
            </div>
          </div>

        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <!-- <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer> -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

<!--   ADD PROPOSAL MODAL  -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
          <h4 style="align-self: "> Add Proposal </h4>
          <button type="button btn-primary" class="close" data-dismiss="modal">×</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
        <form method="POST" action="addprocess.php">

        <div class="form-group">
        <label for="LectID">Proposal Title</label>
        <input type="text" class="form-control" id="LectID" placeholder="Proposal Title" name="propName" onkeypress="return isNumberKey(event)" required>
        </div>

        <div class="form-group">
        <label for="Role">Proposal Domain Type</label> <br>
        
        <?php
                $sqls = "SELECT * FROM pojname";
                $results = mysqli_query($con,$sqls);

                echo '<select class="form-control" id="Role" name="Role">';
                 while($rows=mysqli_fetch_array($results))
                {

                    echo"<option value= '".$rows['projTypeID']."'>".$rows['projName']."</option>";

                }
                echo '</select>';
                ?>
        </div>

        <!-- ADD HIDDEN ID HERE -->
        <button type="submit" class="button btn-info">Add</button>
        <button type="reset" class="button btn-warning">Reset</button>
        <br><br>
        </form>
        </div>
           <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="button btn-danger" data-dismiss="modal">Close</button>
        </div>         
      </div>
    </div>
  </div>


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
     <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

       <!--Upload Form Modal-->
  <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Form</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="uploadformprocess.php" method="post" enctype="multipart/form-data">
             <!--  INSERT HIDDEN ID HERE -->
              <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="fileName" name="fileName">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>      
              <div class="mt-3">
                <button type="submit" class="button btn-primary">Submit</button>
              </div>
            </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>





  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>   

  <script>
    $('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('WARNING ' + recipient)
    modal.find('.modal-body input').val(recipient)
    // modal.find('.modal-footer').attr('action="test.php?"'+ recipient)
    $('#userForm').attr("action", 'workshopdelete.php?id=' + recipient);
  })
  </script> 

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>