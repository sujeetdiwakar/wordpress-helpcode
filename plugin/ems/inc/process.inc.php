<?php
	function cpl_save_ems_form()
	{
		if(!current_user_can('manage_options')) wp_die("Unauthorized User");
		
		if(!check_admin_referer('ems_add_form')) wp_die("Invalid Request");
		
		$code=sanitize_text_field($_POST["cpl_ems_code"]);
		$name=sanitize_text_field($_POST["cpl_ems_name"]);
		$salary=sanitize_text_field($_POST["cpl_ems_salary"]);
		
		//First of all fetch all employees records from the existing option and then append current values to them and then update option
		$cpl_ems=get_option("cpl_ems");
		$total=count($cpl_ems);
		
		$cpl_ems[$total]["code"]=$code;
		$cpl_ems[$total]["name"]=$name;
		$cpl_ems[$total]["salary"]=$salary;
		
		update_option("cpl_ems", $cpl_ems);
		
		wp_redirect(admin_url("admin.php?page=ems/inc/menu.inc.php._ems"));
	}

	function cpl_update_ems_form()
	{
		
		$code=$_POST["cpl_ems_code"];
		$name=$_POST["cpl_ems_name"];
		$salary=$_POST["cpl_ems_salary"];
		
		//First of all fetch all employees records from the existing option and then append current values to them and then update option
		$cpl_ems=get_option("cpl_ems");
		$p=0;
		foreach($cpl_ems as $employee)
		{
			if($code==$employee["code"]) break;
			$p++;
		}
		
		$cpl_ems[$p]["code"]=$code;
		$cpl_ems[$p]["name"]=$name;
		$cpl_ems[$p]["salary"]=$salary;
		
		//unset($cpl_ems[$p]);
		
		update_option("cpl_ems", $cpl_ems);
		
		wp_redirect(admin_url("admin.php?page=ems/inc/menu.inc.php._ems"));
	}
	function cpl_del_ems_form()
	{
		
		$code=$_POST["code"];
		$ch=$_POST["ch"];
		//$name=$_POST["cpl_ems_name"];
		//$salary=$_POST["cpl_ems_salary"];
		
		//First of all fetch all employees records from the existing option and then append current values to them and then update option
		$cpl_ems=get_option("cpl_ems");
		$p=0;
		foreach($cpl_ems as $employee)
		{
			if($code==$employee["code"]) break;
			$p++;
		}
		
		$cpl_ems[$p]["code"]=$code;
		$cpl_ems[$p]["name"]=$name;
		$cpl_ems[$p]["salary"]=$salary;
		if($ch=='y')
		{
			unset($cpl_ems[$p]);
			update_option("cpl_ems", $cpl_ems);
			wp_redirect(admin_url("admin.php?page=ems/inc/menu.inc.php._ems"));
			
		}
		else
			wp_redirect(admin_url("admin.php?page=ems/inc/menu.inc.php._ems_delete&code=$code"));
			
		
	}
?>
