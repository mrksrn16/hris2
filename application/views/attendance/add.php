<h3>Add Attendance <span class="pull-right"><?php echo date('M d Y');?></span></h3>
<a href="<?php echo base_url();?>attendance/view/<?php echo $employee_id;?>">Go back</a>
<div class="row"></div>
<div class="col-sm-6">
	<label>Name:</label>&nbsp; <?php $details = $this->M_User->get_employee_details($employee_id);
echo $details->name;?> <br>
	<!-- <label>Date: </label> &nbsp; <?php echo date('M d Y', strtotime($attendance->date));?> -->
	<form action="<?php echo base_url();?>attendance/save/<?php echo $employee_id;?>" method="post">
		<label>Date:</label>
		<input type="date" name="date" class="form-control" required="">
		<label>Time in:</label>
		<input type="time" name="time_in" class="form-control" required=""> <br>
		<label>Time out:</label>
		<input type="time" name="time_out" class="form-control" required=""> <br>
		<input type="submit" name="submit" class="btn btn-primary" value="Update">
	</form>
</div>