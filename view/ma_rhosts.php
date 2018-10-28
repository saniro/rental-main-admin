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
</head>
<body>
    <div id="wrapper">
        <?php
            require("ma_navigation.php");
        ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Rejected Host Applicants</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <!-- <button title="Add New Tenant" class="btn btn-info" id="btnAdd"><span class="glyphicon glyphicon-plus"></span> Add</button> -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="tblhosts">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Contact No.</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $rejected_host = rejected_host();
                                    $rejected_host = json_decode($rejected_host);

                                    foreach ($rejected_host as $value) {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $value -> {'host_id'}; ?></td>
                                        <td><?php echo $value -> {'name'}; ?></td>
                                        <td><?php echo $value -> {'contact_no'}; ?></td>
                                        <td><?php echo $value -> {'email'}; ?></td>
                                        <td class="center">
                                            <button data-toggle="tooltip" title="View Full Details" class="btn btn-info btn_details" id = "btnDetails" data-id="<?php echo $value -> {'host_id'}; ?>"><span class="fa fa-file-text-o"></span></button>
                                            <!-- <button data-toggle="tooltip" title="Edit" class="btn btn-success btn_edit" id="btnEdit"><span class="fa fa-edit"></span></button>
                                            <button data-toggle="tooltip" title="Delete" class="btn btn-danger" id="btnDelete"><span class="glyphicon glyphicon-trash"></span></button> -->
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
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


 <!-- modalDetails -->
      <div class = "modal fade" id = "modalDetails" role = "dialog">
        <div class = "modal-dialog">

          <div class="modal-content">
            <div class = "modal-header">
              <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title"> Host Details </h4>
                  </div>
                  <div class="modal-body">
                    <center><br><h4>Host</h4></center>
                    <form>    
                        <center>
                                <img src="" alt="Host Profile Picture">
                        </center>
                        <form>
                            <div class="form-group">
                                <label> Contact Person: </label>
                                <label class="form-control" id="v_name"></label>
                            </div>
                            <div class="form-group">
                                <label>Birthdate:</label>
                                <label class="form-control" id="v_birthdate"></label>
                            </div>
                            <div class="form-group">
                                <label>Gender:</label>
                                <label class="form-control" id="v_gender"></label>
                            </div>
                            <div class="form-group">
                                <label>Contact No:</label>
                                <label class="form-control" id="v_contactno"></label>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <label class="form-control" id="v_email"></label>
                            </div>
                        </form>
                    </form>
                </div>

                  <div class = "modal-footer">
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
                    <h4 class ="modal-title"> Edit Host Details </h4>
                  </div>
                  <div class="modal-body">
                                <center><br><h4>Host</h4></center>
                                <form>    
                                    <center>
                                            <img src="users/defaultprofpic.jpg" alt="Host Profile Picture">
                                    </center>
                                    <form>
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

                  <div class = "modal-footer">
                    <button type ="button" class= "btn btn-success">UPDATE </button>
                    <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CANCEL </button>
                  </div>
                </div>
          </div>
        </div>




    <!-- This is the Modal that will be called for delete btn -->
    <div id = "modalDelete" class = "modal fade"  role = "dialog">
        <div class = "modal-dialog">
            <div class="modal-content">
                <div class = "modal-header">
                    <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    <h4 class ="modal-title"> Confirmation </h4>
                </div>
                <div class="modal-body">
                    &emsp; &emsp; By clicking yes, this host record will be removed and all records related will be deleted from this platform.
                                <form>    
                                    <center>
                                            <img src="" alt="Host Profile Picture">
                                    </center>
                                    <form>
                                        <div class="form-group">
                                            <label> Host Name: </label>
                                            <label class="form-control"></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Birthdate:</label>
                                            <label class="form-control"></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <label class="form-control"></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact No:</label>
                                            <label class="form-control"></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <label class="form-control"></label>
                                        </div>
                                    </form>
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
    <script type="text/javascript" src = "lib\jQuery-3.3.1\jquery-3.3.1.min.js"></script>

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
            $('#tblhosts').DataTable({
                responsive: true
            });

            // var table = $('#tblhosts').DataTable();
            // var table_row;
            
            $('[data-toggle="tooltip"]').tooltip();

            
            $(document).on('click', '#btnDetails', function(){
                var view_rejected_applicants_details = 'selected';
                var host_id = $(this).attr('data-id');
                table_row = $(this).parents('tr');

                $.ajax({
                    url: 'functions/select_function.php',
                    method: 'POST',
                    data: {
                        view_rejected_applicants_details_data: view_rejected_applicants_details,
                        host_id_data: host_id
                    },
                    success: function(data) {
                        var data = JSON.parse(data);

                        if(data.success == "true"){
                            $('#v_name').html(data.name);
                            $('#v_birthdate').html(data.birthdate);
                            $('#v_gender').html(data.gender);
                            $('#v_contactno').html(data.contact_no);
                            $('#v_email').html(data.email);

                            //$('#SubmitUpdate').attr('data-id', data.tnc_id);
                            $('#modalDetails').modal('show');

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

            // $(document).on('click', '#btnDetails', function(){
            //     var tenant_id = $(this).attr('data-id');
            //     var view_tenant_selected = 'selected';

            //     $.ajax({
            //         url: 'functions/select_function.php',
            //         method: 'POST',
            //         data: {
            //             view_tenant_selected_data: view_tenant_selected,
            //             tenant_id_data: tenant_id
            //         },
            //         success: function(data) {
            //             var data = JSON.parse(data);
            //             if(data.success == "true"){
            //                 $('#v_user_id').html(data.user_id);
            //                 $('#v_name').html(data.name);
            //                 $('#v_birthdate').html(data.birth_date);
            //                 $('#v_gender').html(data.gender);
            //                 $('#v_contactno').html(data.contact_no);
            //                 $('#v_email').html(data.email);

            //                 $('#v_room_id').html(data.room_id);
            //                 $('#v_room_name').html(data.room_name);
            //                 $('#v_rent_rate').html(data.rent_rate);
            //                 $('#v_room_description').html(data.room_description);

            //                 $('#modalDetails').modal('show');
            //             }
            //             else if(data.success == "false"){
            //                 alert(data.message);
            //             }
            //         },
            //         error: function(xhr) {
            //             console.log(xhr.status + ":" + xhr.statusText);
            //         }
            //     });
            // });

            // $(document).on('click', '#btnEdit', function(){
            //     $('#modalEdit').modal('show');
            //     var tenant_selected = 'selected';
            //     var tenant_id = $(this).attr('data-id');
            //     $("#SubmitEdit").attr('data-id', tenant_id);
            //     $.ajax({
            //         url: 'functions/select_function.php',
            //         method: 'POST',
            //         data: {
            //             tenant_selected_data: tenant_selected,
            //             tenant_id_data: tenant_id
            //         },
            //         success: function(data) {
            //             var data = JSON.parse(data);
            //             $("#view_profilepic").html(data.profilepic);
            //             $("#view_id").html(data.user_id);
            //             $("#view_name").html(data.name);
            //             $("#view_roomname").html(data.room_name);
            //             $("#view_birthdate").html(data.birth_date);     
            //             $("#view_gender").html(data.gender);
            //             $("#view_contactno").html(data.contact_no);                                
            //             $("#view_email").html(data.email);
            //         },
            //         error: function(xhr) {
            //             console.log(xhr.status + ":" + xhr.statusText);
            //         }
            //     });
            // });

            // $(document).on('click', '#SubmitEdit', function(){
            //     var tenant_id = $(this).attr('data-id');
            //     var tenant_selected = 'selected';
            //     $.ajax({
            //         url: 'functions/select_function.php',
            //         method: 'POST',
            //         data: {
            //             tenant_selected_data: tenant_selected,
            //             tenant_id_data: tenant_id
            //         },
            //         success: function(data) {
            //             var data = JSON.parse(data);
            //             $("#delete_profilepic").html(data.profilepic);
            //             $("#delete_id").html(data.user_id);
            //             $("#delete_name").html(data.name);
            //             $("#delete_roomname").html(data.room_name);
            //             $("#delete_birthdate").html(data.birth_date);     
            //             $("#delete_gender").html(data.gender);
            //             $("#delete_contactno").html(data.contact_no);                                
            //             $("#delete_email").html(data.email);
            //             $("#SubmitDelete").attr('data-id', data.user_id);
            //         },
            //         error: function(xhr) {
            //             console.log(xhr.status + ":" + xhr.statusText);
            //         }
            //     });
            // });

            // $(document).on('click', '#btnDelete', function(){
            //     $('#modalDelete').modal('show');
            //     var tenant_selected = 'selected';
            //     var tenant_id = $(this).attr('data-id');
            //     $.ajax({
            //         url: 'functions/select_delete_function.php',
            //         method: 'POST',
            //         data: {
            //             tenant_selected_data: tenant_selected,
            //             tenant_id_data: tenant_id
            //         },
            //         success: function(data) {
            //             var data = JSON.parse(data);
            //             $("#delete_profilepic").html(data.profilepic);
            //             $("#delete_id").html(data.user_id);
            //             $("#delete_name").html(data.name);
            //             $("#delete_roomname").html(data.room_name);
            //             $("#delete_birthdate").html(data.birth_date);     
            //             $("#delete_gender").html(data.gender);
            //             $("#delete_contactno").html(data.contact_no);                                
            //             $("#delete_email").html(data.email);
            //             $("#SubmitDelete").attr('data-id', data.user_id);
            //         },
            //         error: function(xhr) {
            //             console.log(xhr.status + ":" + xhr.statusText);
            //         }
            //     });
            // });
            // $(document).on('click', '#SubmitDelete', function(){
            //     var tenant_id = $(this).attr('data-id');
            //     var tenant_selected = 'selected';
            //     $.ajax({
            //         url: 'functions/delete_function.php',
            //         method: 'POST',
            //         data: {
            //             tenant_delete_data: tenant_selected,
            //             tenant_id_data: tenant_id
            //         },
            //         success: function(data) {
            //             var data = JSON.parse(data);
            //             if(data.success = "true"){
            //                 alert(data.message);
            //                 table.row('#'+tenant_id).remove().draw();
            //             }
            //         },
            //         error: function(xhr) {
            //             console.log(xhr.status + ":" + xhr.statusText);
            //         }
            //     });
            // });
        });
    </script>
</body>

</html>
