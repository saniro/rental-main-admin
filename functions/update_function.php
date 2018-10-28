<?php
	require("../connection/connection.php");
	session_start();

	//ma_applicants.php approve applicants
	if(isset($_POST['submit_approved_applicant_data'])){
		$host_id = $_POST['host_id_data'];

		if($host_id != NULL){
			$query_check = "SELECT host_id FROM host_tbl WHERE host_id = :host_id";
			$stmt = $con->prepare($query_check);
			$stmt->bindParam(':host_id', $host_id, PDO::PARAM_INT);
			$stmt->execute();
			$rowCount = $stmt->rowCount();
			if($rowCount > 0){
				$query_update = "UPDATE host_tbl 
								SET status = 1, flag = 1 
								WHERE host_id = :host_id";
				$stmt = $con->prepare($query_update);
				$stmt->bindParam(':host_id', $host_id, PDO::PARAM_INT);
				$stmt->execute();

				$data = array("success" => "true", "message" => "Host was accepted.");
				$output = json_encode($data);
				echo $output;
			}
			else{
				$data = array("success" => "false", "error" => "severe", "message" => "Room doesn't exist.");
				$output = json_encode($data);
				echo $output;
			}
		}
		else{
			$data = array("success" => "false", "error" => "minor", "message" => "Required fields must not be empty.");
			$output = json_encode($data);
			echo $output;
		}
	}

	//ma_applicants.php approve applicants
	if(isset($_POST['submit_reject_applicant_data'])){
		$host_id = $_POST['host_id_data'];

		if($host_id != NULL){
			$query_check = "SELECT host_id FROM host_tbl WHERE host_id = :host_id";
			$stmt = $con->prepare($query_check);
			$stmt->bindParam(':host_id', $host_id, PDO::PARAM_INT);
			$stmt->execute();
			$rowCount = $stmt->rowCount();
			if($rowCount > 0){
				$query_update = "UPDATE host_tbl 
								SET status = 0 
								WHERE host_id = :host_id";
				$stmt = $con->prepare($query_update);
				$stmt->bindParam(':host_id', $host_id, PDO::PARAM_INT);
				$stmt->execute();

				$data = array("success" => "true", "message" => "Host was rejected.");
				$output = json_encode($data);
				echo $output;
			}
			else{
				$data = array("success" => "false", "error" => "severe", "message" => "Room doesn't exist.");
				$output = json_encode($data);
				echo $output;
			}
		}
		else{
			$data = array("success" => "false", "error" => "minor", "message" => "Required fields must not be empty.");
			$output = json_encode($data);
			echo $output;
		}
	}

	//ma_shosts.php hist details
	if(isset($_POST['view_host_delete_data'])){
		$host_id = $_POST['host_id_data'];
		
		if($host_id != NULL){
			$query_check = "SELECT host_id FROM host_tbl WHERE host_id = :host_id AND status = 1 AND flag = 1";
			$stmt = $con->prepare($query_check);
			$stmt->bindParam(':host_id', $host_id, PDO::PARAM_INT);
			$stmt->execute();
			$row = $stmt->fetch();
			$rowCount = $stmt->rowCount();
			if($rowCount > 0){
				$query_update = "UPDATE host_tbl 
								SET flag = 1 
								WHERE host_id = :host_id";
				$stmt = $con->prepare($query_update);
				$stmt->bindParam(':host_id', $host_id, PDO::PARAM_INT);
				$stmt->execute();

				







				$query = "SELECT host_id, concat(last_name, ', ', first_name, ' ', middle_name) AS name, DATE_FORMAT(birth_date, '%M %d, %Y') AS birth_date, (CASE WHEN gender = 1 THEN 'Male' WHEN gender = 0 THEN 'Female' END) AS gender, contact_no, email FROM host_tbl WHERE host_id = :host_id";
				$stmt = $con->prepare($query);
				$stmt->bindParam(':host_id', $host_id, PDO::PARAM_INT);
				$stmt->execute();
				$row = $stmt->fetch();

				$data = array("success" => "true", "host_id" => $row['host_id'], "name" => $row['name'], "birthdate" => $row['birth_date'], "gender" => $row['gender'], "contact_no" => $row['contact_no'], "email" => $row['email']);
				$results = json_encode($data);
				echo $results;
			}
			else{
				$data = array("success" => "false", "message" => "Something went wrong. Please try again.");
				$results = json_encode($data);
				echo $results;
			}
		}
		else{
			$data = array("success" => "false", "message" => "Required fields must not be empty.");
			$results = json_encode($data);
			echo $results;
		}
	}

	//a_apartment.php cancel apartment
	if(isset($_POST['submit_approve_application_data'])){
		$apartment_id = $_POST['apartment_id_data'];
		
		if($apartment_id != NULL){
			$query_check = "SELECT apartment_id FROM apartment_tbl WHERE apartment_id = :apartment_id AND status = 2";
			$stmt = $con->prepare($query_check);
			$stmt->bindParam(':apartment_id', $apartment_id, PDO::PARAM_INT);
			$stmt->execute();
			$row = $stmt->fetch();
			$rowCount = $stmt->rowCount();
			if($rowCount > 0){
				$query_update = "UPDATE apartment_tbl 
								SET flag = 1, status = 1  
								WHERE apartment_id = :apartment_id";
				$stmt = $con->prepare($query_update);
				$stmt->bindParam(':apartment_id', $apartment_id, PDO::PARAM_INT);
				$stmt->execute();

				$data = array("success" => "true", "message" => "Apartment application approved.");
				$results = json_encode($data);
				echo $results;
			}
			else{
				$data = array("success" => "false", "message" => "Something went wrong. Please try again.");
				$results = json_encode($data);
				echo $results;
			}
		}
		else{
			$data = array("success" => "false", "message" => "Required fields must not be empty.");
			$results = json_encode($data);
			echo $results;
		}
	}

	//a_apartment.php reject application of apartment
	if(isset($_POST['submit_reject_application_data'])){
		$apartment_id = $_POST['apartment_id_data'];
		
		if($apartment_id != NULL){
			$query_check = "SELECT apartment_id FROM apartment_tbl WHERE apartment_id = :apartment_id AND status = 2";
			$stmt = $con->prepare($query_check);
			$stmt->bindParam(':apartment_id', $apartment_id, PDO::PARAM_INT);
			$stmt->execute();
			$row = $stmt->fetch();
			$rowCount = $stmt->rowCount();
			if($rowCount > 0){
				$query_update = "UPDATE apartment_tbl 
								SET flag = 0, status = 0  
								WHERE apartment_id = :apartment_id";
				$stmt = $con->prepare($query_update);
				$stmt->bindParam(':apartment_id', $apartment_id, PDO::PARAM_INT);
				$stmt->execute();

				$data = array("success" => "true", "message" => "Apartment application rejected.");
				$results = json_encode($data);
				echo $results;
			}
			else{
				$data = array("success" => "false", "message" => "Something went wrong. Please try again.");
				$results = json_encode($data);
				echo $results;
			}
		}
		else{
			$data = array("success" => "false", "message" => "Required fields must not be empty.");
			$results = json_encode($data);
			echo $results;
		}
	}



























	//a_tncs.php update tncs
	if(isset($_POST['update_tncs_data'])){
		$rules_id = $_POST['tnc_id_data'];
		$description = $_POST['description_data'];

		if(($rules_id != NULL) && ($description != NULL)){
			$query_check = "SELECT rules_id FROM rules_tbl WHERE rules_id = :rules_id AND apartment_id = :apartment_id AND flag = 1";
			$stmt = $con->prepare($query_check);
			$stmt->bindParam(':rules_id', $rules_id, PDO::PARAM_INT);
			$stmt->bindParam(':apartment_id', $_SESSION['admin_id'], PDO::PARAM_INT);
			$stmt->execute();

			$rowCount = $stmt->rowCount();
			if($rowCount > 0){
				$query_update = "UPDATE rules_tbl 
								SET description = :description 
								WHERE rules_id = :rules_id";
				$stmt = $con->prepare($query_update);
				$stmt->bindParam(':rules_id', $rules_id, PDO::PARAM_INT);
				$stmt->bindParam(':description', $description, PDO::PARAM_STR);
				$stmt->execute();

				$query_select = "SELECT rules_id, description FROM rules_tbl WHERE rules_id = :rules_id";
				$stmt = $con->prepare($query_select);
				$stmt->bindParam(':rules_id', $rules_id, PDO::PARAM_INT);
				$stmt->execute();
				$row = $stmt->fetch();
				$data = array("success" => "true", "message" => "Terms and condition updated successfully.", "rules_id" => $row['rules_id'], "description" => $row['description'], "buttons" => '<button data-toggle="tooltip"'.$row['rules_id'].'" title="Edit" class="btn btn-success btn_edit" id="btnEdit"><span class="fa fa-edit"></span></button> <button data-toggle="tooltip" data-id="'.$row['rules_id'].'" title="Delete" class="btn btn-danger" id="btnDelete"><span class="glyphicon glyphicon-trash"></span></button>');
				$output = json_encode($data);
				echo $output;
			}
			else{
				$data = array("success" => "false", "error" => "severe", "message" => "Item doesn't exist.");
				$output = json_encode($data);
				echo $output;
			}
		}
		else{
			$data = array("success" => "false", "error" => "minor", "message" => "Required fields must not be empty.");
			$output = json_encode($data);
			echo $output;
		}
	}

	//a_utilitybills.php view details
	if(isset($_POST['update_utility_bills_data'])){
		$id = $_POST['utility_bill_type_id_data'];
		$type = $_POST['type_data'];
		$description = $_POST['description_data'];

		if(($id != NULL) && ($type != NULL) && ($description != NULL)){
			$query_check = "SELECT utility_bill_type_id FROM utility_bill_type_tbl WHERE utility_bill_type_id = :utility_bill_type_id AND apartment_id = :apartment_id AND flag = 1";
			$stmt = $con->prepare($query_check);
			$stmt->bindParam(':utility_bill_type_id', $id, PDO::PARAM_INT);
			$stmt->bindParam(':apartment_id', $_SESSION['admin_id'], PDO::PARAM_INT);
			$stmt->execute();
			$row = $stmt->fetch();
			$rowCount = $stmt->rowCount();
			if($rowCount > 0){
				$query_update = "UPDATE utility_bill_type_tbl 
								SET utility_bill_type = :type, description = :description 
								WHERE utility_bill_type_id = :id";
				$stmt = $con->prepare($query_update);
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);
				$stmt->bindParam(':type', $type, PDO::PARAM_STR);
				$stmt->bindParam(':description', $description, PDO::PARAM_STR);
				$stmt->execute();

				$query_select = "SELECT utility_bill_type_id, utility_bill_type, description FROM utility_bill_type_tbl WHERE utility_bill_type_id = :id";
				$stmt = $con->prepare($query_select);
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);
				$stmt->execute();
				$row = $stmt->fetch();
				$data = array("success" => "true", "message" => "Utility bill updated successfully.", "id" => $row['utility_bill_type_id'], "type" => $row['utility_bill_type'], "description" => $row['description'], "buttons" => '<button data-toggle="tooltip" data-id="'.$row['utility_bill_type_id'].'" title="Edit" class="btn btn-success btn_edit" id="btnEdit"><span class="fa fa-edit"></span></button> <button data-toggle="tooltip" data-id="'.$row['utility_bill_type_id'].'" title="Delete" class="btn btn-danger" id="btnDelete" ><span class="glyphicon glyphicon-trash"></span></button>');
				$results = json_encode($data);
				echo $results;
			}
			else{
				$data = array("success" => "false", "message" => "Something went wrong. Please try again.");
				$results = json_encode($data);
				echo $results;
			}
		}
		else{
			$data = array("success" => "false", "message" => "Required fields must not be empty.");
			$results = json_encode($data);
			echo $results;
		}
	}

	//a_crequests.php view accept of request
	if(isset($_POST['submit_approve_request_data'])){
		$request_id = $_POST['request_id_data'];
		$apartment_id = $_SESSION['admin_id'];
		if($request_id != NULL){
			$query_check = "SELECT request_id FROM request_change_room_tbl WHERE request_id = :request_id AND apartment_id = :apartment_id AND status = 2";
			$stmt = $con->prepare($query_check);
			$stmt->bindParam(':request_id', $request_id, PDO::PARAM_INT);
			$stmt->bindParam(':apartment_id', $apartment_id, PDO::PARAM_INT);
			$stmt->execute();
			$row = $stmt->fetch();
			$rowCount = $stmt->rowCount();
			if($rowCount > 0){
				$query_update = "UPDATE request_change_room_tbl 
								SET status = 1 
								WHERE request_id = :request_id";
				$stmt = $con->prepare($query_update);
				$stmt->bindParam(':request_id', $request_id, PDO::PARAM_INT);
				$stmt->execute();

				$query_select = "SELECT user_id, current_rental_id, requested_room FROM request_change_room_tbl WHERE request_id = :request_id";
				$stmt = $con->prepare($query_select);
				$stmt->bindParam(':request_id', $request_id, PDO::PARAM_INT);
				$stmt->execute();
				$row = $stmt->fetch();

				$user_id = $row['user_id'];
				$current_rental_id = $row['current_rental_id'];
				$requested_room = $row['requested_room'];

				$query_update = "UPDATE rental_tbl 
								SET end_date = CURDATE(), status = 0 
								WHERE rental_id = :rental_id";
				$stmt = $con->prepare($query_update);
				$stmt->bindParam(':rental_id', $current_rental_id, PDO::PARAM_INT);
				$stmt->execute();

				$query_insert = "INSERT INTO rental_tbl (starting_date, room_id, user_id) VALUES (CURDATE(), :room_id, :user_id)";
				$stmt = $con->prepare($query_insert);
				$stmt->bindParam(':room_id', $requested_room, PDO::PARAM_INT);
				$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
				$stmt->execute();
				$last_inserted_id = $con->lastInsertId();

				$query_select = "SELECT m_rent_id, payables, due_date FROM monthly_rent_tbl WHERE rental_id = :rental_id";
				$stmt = $con->prepare($query_select);
				$stmt->bindParam(':rental_id', $current_rental_id, PDO::PARAM_INT);
				$stmt->execute();
				$results = $stmt->fetchAll();
				foreach ($results as $row) {
					$m_rent_id = $row['m_rent_id'];
					$payables = $row['payables'];
					$due_date = $row['due_date'];
				}

				$query_update = "UPDATE monthly_rent_tbl 
								SET status = 0 
								WHERE m_rent_id = :m_rent_id";
				$stmt = $con->prepare($query_update);
				$stmt->bindParam(':m_rent_id', $m_rent_id, PDO::PARAM_INT);
				$stmt->execute();

				$query_insert = "INSERT INTO monthly_rent_tbl (rental_id, payables, due_date) VALUES (:rental_id, :payables, :due_date)";
				$stmt = $con->prepare($query_insert);
				$stmt->bindParam(':rental_id', $last_inserted_id, PDO::PARAM_INT);
				$stmt->bindParam(':payables', $payables, PDO::PARAM_INT);
				$stmt->bindParam(':due_date', $due_date, PDO::PARAM_STR);
				$stmt->execute();

				$data = array("success" => "true", "message" => "Change of room request accepted.");
				$results = json_encode($data);
				echo $results;
			}
			else{
				$data = array("success" => "false", "message" => "Something went wrong. Please try again.");
				$results = json_encode($data);
				echo $results;
			}
		}
		else{
			$data = array("success" => "false", "message" => "Required fields must not be empty.");
			$results = json_encode($data);
			echo $results;
		}
	}
?>