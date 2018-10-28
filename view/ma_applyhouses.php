<?php
    if(!isset($_SESSION['m_admin_id'])){
        header("location:index");
    }
?>
<?php
    require("functions/select_all_function.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rental Platform</title>
    <link rel="icon" href="img/apicon.png">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Rooms Map -->
    <link href="dist/css/map.css" rel="stylesheet">


</head>

<body>

    <div id="wrapper">

        <?php
            require("ma_navigation.php");
        ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Apartment Applications</h1>
                    <div class="floordivider"></div>
                </div>
            </div>
            

<!-- room table start -->
<div class="row">
                <div class="col-lg-12">
                   <!--  <h1 class="page-header">Complaints</h1> -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <!-- <button title="Add New Room" class="btn btn-info" id="btnAdd"><span class="glyphicon glyphicon-plus"></span> Add</button> -->
                            <!-- <button data-toggle="tooltip" title="Add Complaint" class="btn btn-info" id="btnAdd"><span class="glyphicon glyphicon-plus"></span> Add</button> -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="tblhouses">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Apartment Name</th>
                                        <th>Address</th>
                                        <th>Contact Person</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $all_applyhouse = all_applyhouse();
                                    $all_applyhouse = json_decode($all_applyhouse);

                                    foreach ($all_applyhouse as $value) {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $value -> {'apartment_id'}; ?></td>
                                        <td><?php echo $value -> {'apartment_name'}; ?></td>
                                        <td><?php echo $value -> {'apartment_address'}; ?></td>
                                        <td><?php echo $value -> {'host'}; ?></td>
                                        <td class="center">
                                            <center>
                                                <button data-toggle="tooltip" title="View Details and See More Available Actions Here" class="btn btn-info" id="btnViewDetails" data-id="<?php echo $value -> {'apartment_id'}; ?>"><span class="fa fa-file-text-o"></span></button>
                                                <!-- <button data-toggle="tooltip" title="Edit Details" class="btn btn-success" id="btnEdit"><span class="fa fa-edit"></span></button>
                                                <button data-toggle="tooltip" title="Delete" class="btn btn-danger" id="btnDelete"><span class="glyphicon glyphicon-remove"></span></button> -->
                                            </center>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

<!-- room table end -->




        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->



 <!-- modalViewDetails -->
      <div class = "modal fade" id = "modalViewDetails" role = "dialog">
        <div class = "modal-dialog">

          <div class="modal-content">
            <div class = "modal-header">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title"> Apartment Details </h4>
                  </div>
                  <div class="modal-body">
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#dhouse" data-toggle="tab" aria-expanded="false">Apartment</a>
                            </li>
                            <li class=""><a href="#dhost" data-toggle="tab" aria-expanded="true">Host</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="dhouse">
                                <center><br><h4>Apartment Information</h4></center>
                                <form>    
                                    <center>
                                            <img src="" alt="Apartment Picture">
                                    </center>
                                    <form>
                                        <div class="form-group">
                                            <label>ID:</label>
                                            <label class="form-control" id="v_apartment_id"></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Apartment Name:</label>
                                            <label class="form-control" id="v_apartment_name"></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <label class="form-control" id="v_address"></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <textarea class="form-control" disabled="true" id="v_description"></textarea>
                                        </div>
                                    </form>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="dhost">
                                <center><br><h4>Host</h4></center>
                                <form>    
                                    <center>
                                            <img src="" alt="Host Profile Picture">
                                    </center>
                                    <form>
                                        <div class="form-group">
                                            <label> Contact Person: </label>
                                            <label class="form-control" id="v_contact"></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Birthdate:</label>
                                            <label class="form-control" id="v_birth"></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <label class="form-control" id="v_gender"></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact No:</label>
                                            <label class="form-control" id="v_number"></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <label class="form-control" id="v_email"></label>
                                        </div>
                                    </form>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                  <div class = "modal-footer">
                    <button type ="button" class = "btn btn-primary" data-dismiss = "modal" id="SubmitApprove"> APPROVE </button>
                    <button type ="button" class = "btn btn-danger" data-dismiss = "modal" id="SubmitReject"> REJECT </button>
                    <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                  </div>
                </div>
          </div>
        </div>



 <!-- modalEdit -->
      <div class = "modal fade" id = "modalEdit" role = "dialog">
        <div class = "modal-dialog">

          <div class="modal-content">
            <div class = "modal-header">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title"> Edit Apartment Details </h4>
                  </div>
                  <div class="modal-body">
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#ehouse" data-toggle="tab" aria-expanded="false">Apartment</a>
                            </li>
                            <li class=""><a href="#ehost" data-toggle="tab" aria-expanded="true">Host</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="ehouse">
                                <center><br><h4>Apartment Information</h4></center>
                                <form>    
                                    <center>
                                            <img src="users/defaultprofpic.jpg" alt="Apartment Picture">
                                    </center>
                                    <form>
                                        <div class="form-group">
                                            <label>ID:</label>
                                            <label class="form-control"></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Apartment Name:</label>
                                            <input type="text" class="form-control" placeholder="Apartment Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <input type="text" class="form-control" placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                            <label>Picture:</label>
                                            <input class="form-control" type="file">
                                        </div>
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <input type="text" class="form-control" placeholder="Description">
                                        </div>
                                    </form>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="ehost">
                                <center><br><h4>Host</h4></center>
                                <form>    
                                    <center>
                                            <img src="users/defaultprofpic.jpg" alt="Host Profile Picture">
                                    </center>
                                    <form>
                                        <!-- <div class="form-group">
                                            <label> Picture: </label>
                                            <label id="" class="form-control"></label>
                                        </div> -->
                                        <div class="form-group">
                                            <label> Contact Person: </label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Birthdate:</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <div class="form-control">
                                                <input style="width:30%;" type="radio" name="gender" id="gender" checked />Male
                                                <input style="width:30%;" type="radio" name="gender" id="gender"/>Female
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact No:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Profile Picture:</label>
                                            <input type="file" class="form-control">
                                        </div>
                                    </form>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                  <div class = "modal-footer">
                    <button type ="button" class= "btn btn-success">UPDATE </button>
                    <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CANCEL </button>
                  </div>
                </div>
          </div>
        </div>

    <!-- This is the Modal that will be called for add btn -->
    <!-- <div id = "modalAdd" class = "modal fade"  role = "dialog">
        <div class = "modal-dialog">
            <div class="modal-content">
                <div class = "modal-header">
                    <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title"> Add New Room </h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label> Room Name: </label>
                            <input class="form-control" id="a_room_name" placeholder="Room name" required />
                        </div>
                        <div class="form-group">
                            <label> Rent Rate: </label>
                            <input class="form-control" id="a_rent_rate" placeholder="Rent rate" required />
                        </div>
                        <div class="form-group">
                            <label> Description: </label>
                            <textarea class="form-control" id="a_description" placeholder="Describe room here ..." required></textarea>
                        </div>
                        <div class="form-group">
                            <label> Room Picture: </label>
                            <input type="file" class="form-control" />
                        </div>
                    </form>
                </div>
                <div class = "modal-footer">
                    <button type="button" class = "btn btn-primary" id="SubmitAdd" data-dismiss = "modal"> ADD ROOM </button>
                    <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                </div>
            </div>
        </div>
    </div>
 -->
    <!-- This is the Modal that will be called for delete btn -->
    <div id = "modalDelete" class = "modal fade"  role = "dialog">
        <div class = "modal-dialog">
            <div class="modal-content">
                <div class = "modal-header">
                    <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title"> Confirmation </h4>
                </div>
                <div class="modal-body">
                    &emsp; &emsp; By clicking yes, this apartment will be deleted and removed from the platform.
                    <form>
                        <div class="form-group">
                            <label> ID: </label>
                            <label class="form-control"></label>
                        </div>
                        <div class="form-group">
                            <label> Apartment Name: </label>
                            <label class="form-control"></label>
                        </div>
                    </form>
                </div>
                <div class = "modal-footer">
                    <button type="button" class = "btn btn-primary" data-dismiss = "modal"> YES </button>
                    <button type ="button" class = "btn btn-danger" data-dismiss = "modal"> NO </button>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            var table_row;

            $('#tblhouses').DataTable({
                responsive: true
            });

            var table = $('#tblhouses').DataTable();

            $('[data-toggle="tooltip"]').tooltip();
            
            $(document).on('click', '#btnViewDetails', function(){
                var view_apartment_application = 'selected';
                var apartment_id = $(this).attr('data-id');
                table_row = $(this).parents('tr');

                $.ajax({
                    url: 'functions/select_function.php',
                    method: 'POST',
                    data: {
                        view_apartment_application_data: view_apartment_application,
                        apartment_id_data: apartment_id
                    },
                    success: function(data) {
                        var data = JSON.parse(data);

                        if(data.success == "true"){
                            $('#v_apartment_id').html(data.apartment_id);
                            $('#v_apartment_name').html(data.apartment_name);
                            $('#v_address').html(data.address);
                            $('#v_description').html(data.description);

                            $('#v_contact').html(data.name);
                            $('#v_birth').html(data.birth);
                            $('#v_gender').html(data.gender);
                            $('#v_number').html(data.contact_no);
                            $('#v_email').html(data.email);

                            $('#SubmitApprove').attr('data-id', data.apartment_id);
                            $('#SubmitReject').attr('data-id', data.apartment_id);
                            $('#modalViewDetails').modal('show');

                        }
                        else if (data.success == "false"){
                            alert(data.message);
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.status + ":" + xhr.statusText);
                    }
                });
            });
            
            $(document).on('click', '#SubmitApprove', function(){
                var submit_approve_application = 'selected';
                var apartment_id = $(this).attr('data-id');

                $.ajax({
                    url: 'functions/update_function.php',
                    method: 'POST',
                    data: {
                        submit_approve_application_data: submit_approve_application,
                        apartment_id_data: apartment_id
                    },
                    success: function(data) {
                        var data = JSON.parse(data);

                        if(data.success == "true"){
                            table.row( table_row ).remove().draw();
                            alert(data.message);
                            // $('#v_apartment_id').html(data.apartment_id);
                            // $('#v_apartment_name').html(data.apartment_name);
                            // $('#v_address').html(data.address);
                            // $('#v_description').html(data.description);

                            // $('#v_contact').html(data.name);
                            // $('#v_birth').html(data.birth);
                            // $('#v_gender').html(data.gender);
                            // $('#v_number').html(data.contact_no);
                            // $('#v_email').html(data.email);

                            // $('#SubmitApprove').attr('data-id', data.apartment_id);
                            // $('#SubmitReject').attr('data-id', data.apartment_id);
                            // $('#modalViewDetails').modal('show');

                        }
                        else if (data.success == "false"){
                            alert(data.message);
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.status + ":" + xhr.statusText);
                    }
                });
            });

            $(document).on('click', '#SubmitReject', function(){
                var submit_reject_application = 'selected';
                var apartment_id = $(this).attr('data-id');

                $.ajax({
                    url: 'functions/update_function.php',
                    method: 'POST',
                    data: {
                        submit_reject_application_data: submit_reject_application,
                        apartment_id_data: apartment_id
                    },
                    success: function(data) {
                        var data = JSON.parse(data);

                        if(data.success == "true"){
                            table.row( table_row ).remove().draw();
                            alert(data.message);
                            // $('#v_apartment_id').html(data.apartment_id);
                            // $('#v_apartment_name').html(data.apartment_name);
                            // $('#v_address').html(data.address);
                            // $('#v_description').html(data.description);

                            // $('#v_contact').html(data.name);
                            // $('#v_birth').html(data.birth);
                            // $('#v_gender').html(data.gender);
                            // $('#v_number').html(data.contact_no);
                            // $('#v_email').html(data.email);

                            // $('#SubmitApprove').attr('data-id', data.apartment_id);
                            // $('#SubmitReject').attr('data-id', data.apartment_id);
                            // $('#modalViewDetails').modal('show');

                        }
                        else if (data.success == "false"){
                            alert(data.message);
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.status + ":" + xhr.statusText);
                    }
                });
            });

            $(document).on('click', '#btnEdit', function(){
                $('#modalEdit').modal('show');
            });
            
            $(document).on('click', '#btnDelete', function(){
                $('#modalDelete').modal('show');
            });
        });
    </script>
</body>

</html>
