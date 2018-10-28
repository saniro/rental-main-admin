<?php
	require("functions/filter.php");
	if(!isset($_GET['route'])){
		$_GET['route'] = "";
	}
	session_start();
	switch (filter($_GET['route'])) {
		case '':
			require("view/ma_login.php");
			break;
		case 'dashboard':
			require("view/ma_dashboard.php");
			break;
		case 'applicants':
			require("view/ma_applicants.php");
			break;
		case 'ahosts':
			require("view/ma_ahosts.php");
			break;
		case 'rhosts':
			require("view/ma_rhosts.php");
			break;
		case 'ahouses':
			require("view/ma_ahouses.php");
			break;
		case 'rhouses':
			require("view/ma_rhouses.php");
			break;
		case 'applyhouses':
			require("view/ma_applyhouses.php");
			break;
		case 'notifications':
			require("view/ma_notifications.php");
			break;
		default:
			require("view/ma_error404.php");
			break;
	}
?>