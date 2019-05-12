<h3>Add Leave <span class="pull-right"><?php echo date('M d Y');?></span></h3>
<a href="<?php echo base_url();?>leave">Go back</a>
<div class="row"></div>
<div class="col-sm-6">
	<label>Name:</label>&nbsp; <?php echo $employee->name;?> <br>
	<!-- <label>Date: </label> &nbsp; <?php echo date('M d Y', strtotime($attendance->date));?> -->
	<form action="<?php echo base_url();?>leave/save/<?php echo $employee_id;?>" method="post">
		<input type="hidden" name="employee_id" value="<?php echo $employee_id;?>">
		<label>Date:</label>
		<input type="date" name="date" class="form-control" required="" value="<?php echo date('Y-m-d');?>">
		<label>Notes: </label>
		<textarea class="form-control" name="notes" placeholder="Notes" required=""></textarea> <br>
		<input type="submit" name="submit" class="btn btn-primary" value="Save">
	</form>
</div>