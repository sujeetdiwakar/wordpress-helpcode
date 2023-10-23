<?php
/*
 * Template Name: Addition
 */
?>
<?php
	foreach($_REQUEST as $var=>$val) $$var=trim(stripslashes($val));
	get_header(); 
?>
<!-- content-wrap -->
<div id="content-wrap">

    <!-- content -->
    <div id="content" class="clearfix">

   	    <!-- main -->
        <div id="main">

<?php
if($caller=="self")
{
	$errors=array();
	if(empty($n1)) $errors[n1]="Empty";
	if(empty($n2)) $errors[n2]="Empty";
	if(empty($errors)) $sum=$n1+$n2;
}
?>
<form action="<?php echo get_permalink($post->ID); ?>" method=post>
	<fieldset>
	<legend>Sum Form</legend>
	<input type=text name=n1 value="<?php echo $n1; ?>" placeholder="Enter first number">
	<font color=red><?php echo $errors[n1]; ?></font>
	<br>
	<input type=text name=n2 value="<?php echo $n2; ?>" placeholder="Enter second number">
	<font color=red><?php echo $errors[n2]; ?></font>
	<br>
	<input type=submit value=Add>
	<input type=hidden name=caller value=self>
	</fieldset>
</form>
<?php
if($caller=="self" and empty($errors)) echo "Sum is $sum";
?>	



        <!-- /main -->
        </div>

        <!-- sidebar -->
        <div id="sidebar">
		<?php get_sidebar(); ?>
        <!-- /sidebar -->
		</div>
    <!-- content -->
	</div>

<!-- /content-out -->
</div>
<?php get_footer(); ?>		
