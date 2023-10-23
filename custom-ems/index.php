<?php
/*
 * Plugin Name: Custom EMS
 * version: 1.0
 * Description: My plugin to explain the crud functionality.
 * Author: Diwakar Academy
 *
 */
register_activation_hook(__FILE__, 'table_creater');
function table_creater()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'ems';

    $sql = "DROP TABLE IF EXISTS $table_name;
	     CREATE TABLE $table_name (
		id mediumint(11) NOT NULL AUTO_INCREMENT,
		emp_id varchar (50) NOT NULL,
		emp_name varchar(200) NOT NULL,
		emp_email varchar(200) NOT NULL,
		emp_dept varchar(200) NOT NULL,
		PRIMARY KEY id (id)
	) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}


function da_display_ems_menu()
{
    add_menu_page("EMS", "EMS", "manage_options", "emp-list", "da_ems_list_call");
    add_submenu_page("emp-list", "Employee List", "Employee List", "manage_options", "emp-list", "da_ems_list_call");
    add_submenu_page("emp-list", "Add Employee", "Add Employee", "manage_options", "add-emp", "da_emp_add_call");
    add_submenu_page(null, "Update Employee", "Update Employee", "manage_options", "update-emp", "da_emp_update_call");
    add_submenu_page(null, "Delete Employee", "Delete Employee", "manage_options", "delete-emp", "da_emp_delete_call");
}

add_action("admin_menu", "da_display_ems_menu");

function da_emp_add_call()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'ems';
    $msg = '';


    if (isset($_POST['submit'])) {

        $wpdb->insert("$table_name", array(
            "emp_id" => $_POST['emp_id'],
            "emp_name" => $_POST['emp_name'],
            "emp_email" => $_POST['emp_email'],
            "emp_dept" => $_POST['emp_dept']
        ));

        if ($wpdb->insert_id > 0) {
            $msg = "Form data saved successfully";
        } else {
            $msg = "Failed to save data";
        }

    }


    ?>

    <p><?php echo $msg; ?></p>
    <form method="post">
        <p>
            <label>EMP ID</label>
            <input type="text" name="emp_id" value="<?php echo $row_details['emp_id']; ?>" placeholder="Enter ID"/>
        </p>
        <p>
            <label>Name</label>
            <input type="text" name="emp_name" value="<?php echo $row_details['emp_name']; ?>" placeholder="Enter name"/>
        </p>
        <p>
            <label>Email</label>
            <input type="email" name="emp_email" value="<?php echo $row_details['emp_email']; ?>" placeholder="Enter email"/>
        </p>

        <p>
            <label>Department</label>
            <input type="text" name="emp_dept" value="<?php echo $row_details['emp_dept']; ?>" placeholder="Enter Dept."/>
        </p>
        <p>
            <button type="submit" name="submit">Submit</button>
        </p>
    </form>
<?php }


function da_emp_update_call(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'ems';
    $msg = '';

    $id = isset($_GET['id']) ? intval($_GET['id']) : "";

    if (isset($_POST['update'])) {

        $id = isset($_GET['id']) ? intval($_GET['id']) : "";

        if (!empty($id)) {

            $wpdb->update("$table_name", array(
                "emp_id" => $_POST['emp_id'],
                "emp_name" => $_POST['emp_name'],
                "emp_email" => $_POST['emp_email'],
                "emp_dept" => $_POST['emp_dept']
            ), array(
                "id" => $id
            ));

            $msg = "Form data updated successfully";
        }
    }

    $row_details = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT * from $table_name WHERE id = %d", $id
        ), ARRAY_A
    );

    ?>

    <p><?php echo $msg; ?></p>
    <form method="post">
        <p>
            <label>EMP ID</label>
            <input type="text" name="emp_id" value="<?php echo $row_details['emp_id']; ?>" placeholder="Enter ID"/>
        </p>
        <p>
            <label>Name</label>
            <input type="text" name="emp_name" value="<?php echo $row_details['emp_name']; ?>" placeholder="Enter name"/>
        </p>
        <p>
            <label>Email</label>
            <input type="email" name="emp_email" value="<?php echo $row_details['emp_email']; ?>" placeholder="Enter email"/>
        </p>

        <p>
            <label>Department</label>
            <input type="text" name="emp_dept" value="<?php echo $row_details['emp_dept']; ?>" placeholder="Enter Dept."/>
        </p>
        <p>
            <button type="submit" name="update">Update</button>
        </p>
    </form>
<?php
}

function da_emp_delete_call(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'ems';

    $id = isset($_GET['id']) ? intval($_GET['id']) : "";
    if (isset($_REQUEST['delete'])) {
        if($_REQUEST['conf'] == 'yes'){
            $row_exists = $wpdb->get_row(
                $wpdb->prepare(
                    "SELECT * from $table_name WHERE id = %d", $id
                ),ARRAY_A
            );
            if (count($row_exists) > 0) {
                $wpdb->delete("$table_name", array(
                    "id" => $id
                ));
            }
        }
        ?>
        <script>
            location.href = "<?php echo site_url() ?>/wp-admin/admin.php?page=emp-list";
        </script>
    <?php
    } ?>
        <form method="post">
            <p>
                <label>Are you sure want to delete?</label><br>
                <input type="radio" name="conf" value="yes">Yes
                <input type="radio" name="conf" value="no" checked>No
            </p>

            <p>
                <button type="submit" name="delete">Delete</button>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </p>
        </form>
        <?php

}
function da_ems_list_call()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'ems';
    $employees = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * from $table_name", ""
        ), ARRAY_A
    );

    if (count($employees) > 0) {?>
        <div style="margin-top: 40px;">
            <table cellpadding="10" border="1">
            <tr>
                <th>Sr No</th>
                <th>EMP ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
            <?php
            $count = 1;
            foreach ($employees as $index => $employee) {?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $employee['emp_id'] ?></td>
                    <td><?php echo $employee['emp_name'] ?></td>
                    <td><?php echo $employee['emp_email'] ?></td>
                    <td><?php echo $employee['emp_dept'] ?></td>
                    <td>
                        <a href="admin.php?page=update-emp&id=<?php echo $employee['id']; ?>">Edit</a>
                        <a href="admin.php?page=delete-emp&id=<?php echo $employee['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        </div>
        <?php
    }else{
        echo "<h2>Employee Record Not Found</h2>";
    }
}

