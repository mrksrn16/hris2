
<h3>Attendance  <a href="<?php echo base_url();?>attendance/add_attendance/<?php echo $employee_id;?>"><button class="btn btn-primary btn-xs">Add</button></a><span class="pull-right"><?php echo date('M d Y');?></span></h3>
<label>Employee Name: &nbsp;</label><?php $details = $this->M_User->get_employee_details($employee_id);
echo $details->name;?>
<table class="table table-stripped">
    <tr>
        <th>Date</th>
        <th>Time In</th>
        <th>Time Out</th>
        <th></th>
    </tr>
    <?php if(count($employee_attendance)): foreach($employee_attendance as $attendance):?>
    <tr>
        <td><?php echo date('M d Y', strtotime($attendance->date));?></td>
        <td><?php echo $attendance->time_in;?></td>
        <?php if($attendance->time_out):?>
        <td><?php echo $attendance->time_out;?></td>  
        <?php else:?>
        <td>-----</td>
        <?php endif;?>
        <td>
            <a href="<?php echo base_url();?>attendance/edit/<?php echo $employee_id;?>/<?php echo $attendance->id;?>"><button class="btn btn-primary btn-xs">Edit</button></a>
        </td>
    </tr>
    <?php endforeach;endif;?>
   
</table>