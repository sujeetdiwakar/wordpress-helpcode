<?php
function cpl_create_emp_post_type()
{
 $labels = array (
 "name" => "Employee Management System",
 "add_new" => "Add New Employee",
 "add_new_item" => "Add New Employee Record",
 "edit_item" => "Edit Employee",
 "search_items" => "Search Employees",
 "view_item" => "View Employee", 
 "not_found" => "No Employee found"
 );
 $args = array (
 "labels" => $labels,
 "public" => true,
 //"supports" => array( "title", "editor", "author", "thumbnail", "excerpt", "comments" )
 //"supports" => array("")
 "supports" => array("title")
 );
 register_post_type("emp",$args);
 taxonomies();
}
function taxonomies()
{
 $labels = array(
 "name"=> "Employee Type",
 "add_new"=> "Add New Employee Type",
 "add_new_item"=> "Add New Employee Type",
 "edit"=> "Edit",
 "edit_item"=> "Edit Employee Type Review",
 "new_item"=> "New Employee Type",
 "view"=> "View",
 "view_item"=> "View Employee Type",
 "search_items"=> "Search Employee Types",
 );
 $args = array(
 "labels"=> $labels,
 "show_ui"=>true,
 "public" => true,
 'hierarchical' => true
 );
 register_taxonomy("Employee-Type","emp",$args);
}

function cpl_emp_mb_create()
{
	add_meta_box
	( 
	'cpl_emp_mb_id', //ID
	'Employee Salary', //Title
	'cpl_mb_salary',  //Callback Function
	'emp',  //Post Type
	'normal', //Context
	'high' //Priority
	);
}

function cpl_mb_salary($post)
{
	echo '<h2>Set Basic Salary</h2>';
	$emp_basic_salary = get_post_meta( $post->ID, '_emp_basic_salary', true );

	echo '<label for="reference-name">'. 'Basic Salary' .'</label>';
	echo '<input type="text" id="basic-salary" name="emp_basic_salary" placeholder="" value="'.$emp_basic_salary.'" size="25"/>';
	echo '<p class="howto">'. 'Add the basic salary of the employee' .'</p>';
}

function cpl_save_emp_mb( $post_id ) 
{
	$emp_basic_salary = $_POST['emp_basic_salary'];
	update_post_meta($post_id, '_emp_basic_salary', $emp_basic_salary);
}

function my_edit_emp_columns($columns) 
{

	$columns = array(
		"cb" => "<input type='checkbox' />",
		"title" => "Employee",
		"emp_basic_salary" => "Basic Salary",
		"Employee-Type" => "Employee Type"
	);

	return $columns;
}

function my_manage_emp_columns($column, $post_id) 
{
	global $post;
	switch($column) 
	{
		case 'emp_basic_salary':
			$emp_basic_salary = get_post_meta( $post_id, '_emp_basic_salary', true );
			echo $emp_basic_salary;
			break;
		case 'Employee-Type':
			$terms = get_the_terms($post_id, 'Employee-Type');
			$out = array();
			if($terms) foreach($terms as $term) $out[] = $term->name; 
			echo join( ', ', $out);
			break;
		default :
			break;
	}
}

function my_emp_sortable_columns( $columns ) 
{
	$columns['emp_basic_salary'] = 'Basic Salary';
	$columns['Employee-Type'] = 'Employee Type';
	
	return $columns;
}

?>
