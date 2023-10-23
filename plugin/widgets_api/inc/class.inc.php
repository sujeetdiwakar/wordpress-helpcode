<?php
	class cpl_message_widget_class extends WP_Widget
	{
		function __construct()
		{
			//It should call the constructor of parent class as follows:

			$this->WP_Widget("cpl_message_widget_id", "Set Title and Message", array("classname"=>"cpl_message_widget_class"));
		}
		function form($instance)
		{
			//Retrieve existing values of widget variables
			$message=$instance["message"];
			$title=$instance["title"];
			
			//Retrieve ID and Name of widget variables using function get_field_id and get_field_name
			
			$title_id=$this->get_field_id("title");
			$title_name=$this->get_field_name("title");
			
			$message_id=$this->get_field_id("message");
			$message_name=$this->get_field_name("message");

			//Display widget form elements using ID, Name and existing values of variables
			echo
			"
				<p>
					<label for='$title_id'>Title:</label>
					<input id='$title_id' name='$title_name' value='$title'>
				</p>
				<p>
					<label for='$message_id'>message:</label>
					<input id='$message_id' name='$message_name' value='$message'>
				</p>
			";
			
		}
		function update($new_instance, $old_instance)
		{
			//$new_instance contains values received from the form
			//$old_instance contains values already stored in the database
			
			//Store existing values available in database to a temporary array
			$instance=$old_instance;
			
			//Overwrite variables with values received from the form
			$instance["title"]=$new_instance["title"];
			$instance["message"]=$new_instance["message"];
			
			//Return back to the environment
			return $instance;
		}
		function widget($args, $instance)
		{
			//Fetch variables from the arguments
			extract($args);
			extract($instance);
			
			//Use them to display widget variables in main website
			echo $before_widget; //widget area starts - opening tag for widget
				echo $before_title.$title.$after_title; //display $title in title of widget
				echo $message; //display $message below title
			echo $after_widget; //widget are ends - closing tag for widget
		}
	}
?>
