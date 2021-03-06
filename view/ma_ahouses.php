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
                    <h1 class="page-header">Current Apartments</h1>
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
                                    $current_apartments = current_apartments();
                                    $current_apartments = json_decode($current_apartments);

                                    foreach ($current_apartments as $value) {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $value -> {'apartment_id'}; ?></td>
                                        <td><?php echo $value -> {'apartment_name'}; ?></td>
                                        <td><?php echo $value -> {'apartment_address'}; ?></td>
                                        <td><?php echo $value -> {'host'}; ?></td>
                                        <td class="center">
                                            <center>
                                                <button data-toggle="tooltip" title="View Full Details" class="btn btn-info" id="btnViewDetails" data-id="<?php echo $value -> {'apartment_id'}; ?>"><span class="fa fa-file-text-o"></span></button>
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
            
            $(document).on('click', '#btnViewDetails', function(){
                var view_apartment_details = 'selected';
                var apartment_id = $(this).attr('data-id');
                table_row = $(this).parents('tr');

                $.ajax({
                    url: 'functions/select_function.php',
                    method: 'POST',
                    data: {
                        view_apartment_details_data: view_apartment_details,
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

                            //$('#SubmitApprove').attr('data-id', data.host_id);
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
            
            $(document).on('click', '#btnEdit', function(){
                $('#modalEdit').modal('show');
            });
            
            $(document).on('click', '#btnDelete', function(){
                $('#modalDelete').modal('show');
            });

        //     $(document).on('click', '#SubmitAdd', function(){
        //         var add_room = 'selected';
        //         var room_name = $('#a_room_name').val();
        //         var rent_rate = $('#a_rent_rate').val();
        //         var description = $('#a_description').val();

        //         $.ajax({
        //             url: 'functions/insert_function.php',
        //             method: 'POST',
        //             data: {
        //                 add_room_data: add_room,
        //                 room_name_data: room_name,
        //                 rent_rate_data: rent_rate,
        //                 description_data: description
        //             },
        //             success: function(data) {
        //                 var data = JSON.parse(data);
        //                 if(data.success == "true"){
                            
        //                     table.row.add( [
        //                         data.room_id,
        //                         data.room_name,
        //                         data.rent_rate,
        //                         data.description,
        //                         data.status,
        //                         data.buttons
        //                     ] ).draw( false );
        //                     alert(data.message);
        //                 }
        //                 else if (data.success == "false"){
        //                     alert(data.message);
        //                 }
        //             },
        //             error: function(xhr) {
        //                 console.log(xhr.status + ":" + xhr.statusText);
        //             }
        //         });
        //     });

        //     $(document).on('click', '#btnDelete', function(){
        //         var view_delete_room = 'selected';
        //         var room_id = $(this).attr('data-id');
        //         table_row = $(this).parents('tr');

        //         $.ajax({
        //             url: 'functions/select_function.php',
        //             method: 'POST',
        //             data: {
        //                 view_delete_room_data: view_delete_room,
        //                 room_id_data: room_id
        //             },
        //             success: function(data) {
        //                 var data = JSON.parse(data);
        //                 if(data.success == "true"){
        //                     $("#v_d_room_id").html(data.room_id);
        //                     $("#v_d_room_name").html(data.room_name);

        //                     $('#SubmitDelete').attr('data-id', room_id);
        //                     $('#modalDelete').modal('show');
        //                 }
        //                 else if (data.success == "false"){
        //                     alert(data.message);
        //                 }
        //             },
        //             error: function(xhr) {
        //                 console.log(xhr.status + ":" + xhr.statusText);
        //             }
        //         });
        //     });

        //     $(document).on('click', '#SubmitDelete', function(){
        //         var room_id = $(this).attr('data-id');
        //         var submit_delete_room = 'selected';

        //         $.ajax({
        //             url: 'functions/delete_function.php',
        //             method: 'POST',
        //             data: {
        //                 submit_delete_room_data: submit_delete_room,
        //                 room_id_data: room_id
        //             },
        //             success: function(data) {
        //                 var data = JSON.parse(data);
        //                 if(data.success == "true"){
        //                     table.row( table_row ).remove().draw();
        //                     alert(data.message);
        //                 }
        //                 else if (data.success == "false"){
        //                     alert(data.message);
        //                 }
        //             },
        //             error: function(xhr) {
        //                 console.log(xhr.status + ":" + xhr.statusText);
        //             }
        //         });
        //     });

        //     $(document).on('click', '#btnViewDetails', function(){
        //         var room_id = $(this).attr('data-id');
        //         var view_room_details_check = 'selected';
        //         table_row = $(this).parents('tr');
                
        //         $.ajax({
        //             url: 'functions/select_function.php',
        //             method: 'POST',
        //             data: {
        //                 view_room_details_check_data: view_room_details_check,
        //                 room_id_data: room_id
        //             },
        //             success: function(data) {
        //                 var data = JSON.parse(data);
        //                 if(data.success == "true"){
        //                     if(data.status == "occupied"){
        //                         $("#o_room_id").html(data.room_id);
        //                         $("#o_room_name").html(data.room_name);
        //                         $("#o_rent_rate").html(data.rent_rate);
        //                         $("#o_room_description").html(data.room_description);

        //                         $("#o_user_id").html(data.user_id);
        //                         $("#o_name").html(data.name);
        //                         $("#o_birthdate").html(data.birth_date);
        //                         $("#o_gender").html(data.gender);
        //                         $("#o_contactno").html(data.contact_no);
        //                         $("#o_email").html(data.email);
        //                         $("#btnTerminate").attr('data-id', data.rental_id);

        //                         $('#modalOccupiedRoom').modal('show');
        //                     }
        //                     else if(data.status == "vacant"){
        //                         $('#v_room_id').html(data.room_id);
        //                         $('#v_room_name').html(data.room_name);
        //                         $('#v_rent_rate').html(data.rent_rate);
        //                         $('#v_room_description').html(data.room_description);

        //                         $('#AddTenantSubmit').attr('data-id', data.room_id);
        //                         $('#modalVacantRoom').modal('show');
        //                     }
        //                 }
        //                 else if (data.success == "false"){
        //                     alert(data.message);
        //                 }
        //             },
        //             error: function(xhr) {
        //                 console.log(xhr.status + ":" + xhr.statusText);
        //             }
        //         });
        //     });

        //     $(document).on('click', '#btnEdit', function(){
        //         var room_id = $(this).attr('data-id');
        //         var view_edit_room = 'selected';
        //         table_row = $(this).parents('tr');

        //         $.ajax({
        //             url: 'functions/select_function.php',
        //             method: 'POST',
        //             data: {
        //                 view_edit_room_data: view_edit_room,
        //                 room_id_data: room_id
        //             },
        //             success: function(data) {
        //                 var data = JSON.parse(data);
        //                 if(data.success == "true"){
        //                     $("#e_room_id").html(data.room_id);
        //                     $("#e_room_name").val(data.room_name);
        //                     $("#e_room_rate").val(data.room_rate);
        //                     $("#e_rent_rate").val(data.rent_rate);
        //                     $("#e_room_description").val(data.room_description);
        //                     $("#e_status").html(data.status);
        //                     $("#SubmitUpdate").attr('data-id', data.room_id);
        //                     $('#modalEditRoomDetails').modal('show');
        //                 }
        //                 else if (data.success == "false"){
        //                     alert(data.message);
        //                 }
        //             },
        //             error: function(xhr) {
        //                 console.log(xhr.status + ":" + xhr.statusText);
        //             }
        //         });
        //     });

        //     $(document).on('click', '#SubmitUpdate', function(){
        //         var room_id = $(this).attr('data-id');
        //         var update_room_details = 'selected';
        //         var room_name =  $("#e_room_name").val();
        //         var rent_rate = $("#e_rent_rate").val();
        //         var room_description = $("#e_room_description").val();

        //         $.ajax({
        //             url: 'functions/update_function.php',
        //             method: 'POST',
        //             data: {
        //                 update_room_details_data: update_room_details,
        //                 room_id_data: room_id,
        //                 room_name_data: room_name,
        //                 rent_rate_data: rent_rate,
        //                 room_description_data: room_description
        //             },
        //             success: function(data) {
        //                 var data = JSON.parse(data);
        //                 if(data.success == "true"){
        //                     var rData = [ data.room_id, data.room_name, data.rent_rate, data.room_description, data.status, data.buttons];
        //                     table.row( table_row ).data(rData).draw();
 
        //                     alert(data.message);
        //                     $('#modalEditRoomDetails').modal('toggle');
        //                 }
        //                 else if (data.success == "false"){
        //                     if(data.error == "minor"){
        //                         alert(data.message);
        //                     }
        //                     else{
        //                         alert(data.message);
        //                         $('#modalEditRoomDetails').modal('toggle');
        //                     }
        //                 }
        //             },
        //             error: function(xhr) {
        //                 console.log(xhr.status + ":" + xhr.statusText);
        //             }
        //         });
        //     });

        //     $(document).on('click', '#btnTerminate', function(){
        //         var view_terminate_details = 'selected';
        //         var rental_id = $(this).attr('data-id');

        //         $.ajax({
        //             url: 'functions/select_function.php',
        //             method: 'POST',
        //             data: {
        //                 view_terminate_details_data: view_terminate_details,
        //                 rental_id_data: rental_id
        //             },
        //             success: function(data) {
        //                 var data = JSON.parse(data);
        //                 if(data.success == "true"){
        //                     $('#c_room_name').html(data.room_name);
        //                     $('#c_name').html(data.name);
        //                     $('#SubmitTerminate').attr('data-id', data.rental_id);
        //                     $('#modalTerminate').modal('show');
        //                 }
        //                 else if (data.success == "false"){
        //                     alert(data.message);
        //                 }
        //             },
        //             error: function(xhr) {
        //                 console.log(xhr.status + ":" + xhr.statusText);
        //             }
        //         });
        //     });

        //     $(document).on('click', '#SubmitTerminate', function(){
        //         var rental_terminate_table = 'selected';
        //         var rental_id = $(this).attr('data-id');

        //         $.ajax({
        //             url: 'functions/delete_function.php',
        //             method: 'POST',
        //             data: {
        //                 rental_terminate_table_data: rental_terminate_table,
        //                 rental_id_data: rental_id
        //             },
        //             success: function(data) {
        //                 var data = JSON.parse(data);
        //                 if(data.success == "true"){
        //                     var rData = [ data.room_id, data.room_name, data.rent_rate, data.room_description, data.status, data.buttons];
        //                     table.row( table_row ).data(rData).draw();
        //                     alert(data.message);
        //                 }
        //                 else if (data.success == "false"){
        //                     alert(data.message);
        //                 }
        //             },
        //             error: function(xhr) {
        //                 console.log(xhr.status + ":" + xhr.statusText);
        //             }
        //         });
        //     });

        //     $(document).on('click', '#AddTenantSubmit', function(){
        //         var add_tenant_table = 'selected';
        //         var room_id = $(this).attr('data-id');
        //         var first_name = $('#a_first_name').val();
        //         var middle_name = $('#a_middle_name').val();
        //         var last_name = $('#a_last_name').val();
        //         var birth_date = $('#a_birth_date').val();
        //         var gender = $('#a_gender').val();
        //         var contactno = $('#a_contactno').val();
        //         var email = $('#a_email').val();

        //         $.ajax({
        //             url: 'functions/insert_function.php',
        //             method: 'POST',
        //             data: {
        //                 add_tenant_table_data: add_tenant_table,
        //                 room_id_data: room_id,
        //                 first_name_data: first_name,
        //                 middle_name_data:  middle_name,
        //                 last_name_data: last_name,
        //                 birth_date_data: birth_date,
        //                 gender_data: gender,
        //                 contactno_data: contactno,
        //                 email_data: email
        //             },
        //             success: function(data) {
        //                 var data = JSON.parse(data);
        //                 if(data.success == "true"){
        //                     var rData = [ data.room_id, data.room_name, data.rent_rate, data.room_description, data.status, data.buttons];
        //                     table.row( table_row ).data(rData).draw();
        //                     $('#modalVacantRoom').modal('toggle');
        //                     alert(data.message);
        //                 }
        //                 else if (data.success == "false"){
        //                     alert(data.message);
        //                 }
        //             },
        //             error: function(xhr) {
        //                 console.log(xhr.status + ":" + xhr.statusText);
        //             }
        //         });
        //     });

        //     $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>
