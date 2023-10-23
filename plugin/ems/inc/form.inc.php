<?php
	function cpl_display_ems_form()
	{
		
?>
		<div class="wrap">
		<h2>Employee Management System</h2>
		<form method="post" action="admin-post.php">
			<input type="hidden" name="action" value="cpl_process_ems_form">
			<?php
				wp_nonce_field('ems_add_form');
			?>
			
			Code
			<input name="cpl_ems_code" value="<?php echo esc_html($cpl_ems["code"]); ?>">
			
			<br>
			Name
			<input name="cpl_ems_name" value="<?php echo esc_html($cpl_ems["name"]); ?>">
			
			<br>
			Salary
			<input name="cpl_ems_salary" value="<?php echo esc_html($cpl_ems["salary"]); ?>">

			<br>
			<input type="submit" value="Update" class="button-primary">
		</form>
		</div>
<?php
		$cpl_ems=get_option("cpl_ems");
		foreach($cpl_ems as $employee)
		{
			
			$employee_record=implode("", $employee);
			if($employee_record)
			{
				foreach($employee as $attr) 
				echo $attr.'&nbsp;';
				echo "<a href='".admin_url("admin.php?page=ems/inc/menu.inc.php._ems_edit&code={$employee['code']}")."'>Edit</a>&nbsp;&nbsp;";
				echo "<a href='".admin_url("admin.php?page=ems/inc/menu.inc.php._ems_delete&code={$employee['code']}")."'>Delete</a>";
				//echo "<a href='".plugins_url()."/ems/edit.php?code={$employee[code]}'>Edit</a>";


				echo "<br>";
			}
		}
	}
	
	function cpl_edit_ems_form()
	{
		$code=$_GET["code"];
		echo "Form to edit $code";
		$cpl_ems=get_option("cpl_ems");
		$p=0;
		foreach($cpl_ems as $employee)
		{
			if($code==$employee["code"]) break;
			$p++;
		}
		$name=$cpl_ems[$p]["name"];
		$salary=$cpl_ems[$p]["salary"];
?>
		<h2>Employee Management System</h2>
		<form method="post" action="admin-post.php">
			<input type="hidden" name="action" value="cpl_process_ems_edit_form">
			
			Code
			<input name="cpl_ems_code" value="<?php echo $code; ?>" readonly="true">
			
			<br>
			Name
			<input name="cpl_ems_name" value="<?php echo $name; ?>">
			
			<br>
			Salary
			<input name="cpl_ems_salary" value="<?php echo $salary; ?>">

			<br>
			<input type="submit" value="Update">
		</form>
<?php
	}
?>
<?php
function cpl_delete_ems_form()
	{
		$code=$_GET["code"];
		//echo "Form to delete $code";
		
?><br><br><br><br>
	<table align="center" border=2>
		<tr><td colspan=2>Are you sure to delete EMP code:<?php echo $code; ?> Record?</td></tr>
		<form method="post" action="admin-post.php">
			<input type="hidden" name="action" value="cpl_process_ems_delete_form">
			<tr>
				<td>Yes<input type=radio name="ch" value="y"></td>
				<td>No<input type=radio name="ch" value="n" checked></td>
			</tr>
			<tr>
				<td colspan=2 align='center'><input type="submit" value="Delete"></td>
			</tr>
			<input type="hidden" name="code" value="<?php echo $code; ?>">
			
		</form>
	</table>
<?php
	}
?>
