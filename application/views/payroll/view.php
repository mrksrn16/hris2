<style type="text/css">
    #printableArea label{
        margin: 0 !important;
    }
</style>
<?php 
$emp = $this->M_User->get_employee_rate($employee_id); 
$ids = array();
?>
<h3>Payroll  <span class="pull-right"><?php echo date('M d Y');?></span></h3>
<label>Employee Name: &nbsp;</label><?php $details = $this->M_User->get_employee_details($employee_id);
echo $details->name;?>
<div class="row"></div>
<div class="col-sm-6" style="border:1px solid #ccc;padding:20px;border-radius: 5px;">
    <em>Total Number of Days:</em> &nbsp;<label><?php echo $total_number_of_days;?></label> <br>
    <em>Employee Rate:</em> &nbsp;<label><?php echo $emp->rate;?></label> <br>
    <div class="pull-right">
    <em>Total Salary:</em>&nbsp; <label id="salary"><?php echo (int)$emp->rate * (int)$total_number_of_days; ?></label>
    </div>
    <br>
    <hr>
    <em>Bonus & Fringe Benefits:</em>
    <ul>
        <?php if(count($fringe)): foreach($fringe as $f):?>
            <li><em><?php echo $f->notes;?>: &nbsp;<label><?php echo $f->amount;?></label> </em></li>
        <?php endforeach; else:?>
        <li>No bonus & fringe benefits</li>
    <?php endif;?>
    </ul>
    <div class="pull-right">
    <em>Total Bonus and Fringe Benefits:</em>&nbsp; <label id=""><?php echo $total_bonus;?></label>
    </div>
    <br>
    <hr>
    <em>Deductions:</em>
        <ul>
            <li><em>SSS:</em> &nbsp;<label><?php echo $benefit->sss;?></label></li>
            <li><em>PAGIBIG:</em> &nbsp;<label><?php echo $benefit->pagibig;?></label></li>
            <li><em>PHILHEALTH:</em> &nbsp;<label><?php echo $benefit->philhealth;?></label></li>
            <li><em>TAX: &nbsp;<label><?php echo $benefit->tax;?></label></em></li>
        </ul>

    <div class="pull-right">
    <em>Total Deductions: &nbsp;<label><?php echo $total_deductions;?></em>
    </div>
    <br>
    <hr>
    <em>Total Salary:</em>&nbsp; <label id="salary"><?php echo (int)$emp->rate * (int)$total_number_of_days; ?></label> <br>
    <em>Total Bonus and Fringe Benefits:</em>&nbsp; <label id=""><?php echo $total_bonus;?></label> <br>
    <em>Total Deductions:</em> &nbsp;<label><?php echo $total_deductions;?> </label><br>
     <em>Total Pay: &nbsp;<label><u><?php echo (((int)$emp->rate * (int)$total_number_of_days) + (int)$total_bonus) - (int)$total_deductions ; ?></u></em> 
    <form action="<?php echo base_url();?>payroll/paid/<?php echo $employee_id;?>" method="post">
    <input type="hidden" name="total_salary" value="<?php echo (int)$emp->rate * (int)$total_number_of_days;?>">
    <!-- <input type="hidden" name="attendance_ids[]" value=""> -->
    <input type="hidden" name="total_deduction" value="<?php echo $total_deductions;?>">
    <input type="hidden" name="total_bonus" value="<?php echo $total_bonus;?>">
    <input type="hidden" name="salary" value="<?php echo (((int)$emp->rate * (int)$total_number_of_days) + (int)$total_bonus) - (int)$total_deductions; ?>">
    <input type="submit" name="submit" class="btn btn-primary" value="OK" onclick="return confirm('Pay Employee?')">
    <button class="btn btn-success" onclick="printDiv('printableArea')" id="btnPrint">Print</button>
    </form>
</div>
<div class="col-sm-6">
<label>
Attendance:</label>
<table class="table table-stripped">
    <tr>
        <th>Date</th>
        <th>Time In</th>
        <th>Time Out</th>
    </tr>
    <?php if(count($employee_attendance)): foreach($employee_attendance as $attendance):?>
    <?php $ids[] = $attendance->id;?>
    <tr>
        <td><?php echo date('M d Y', strtotime($attendance->date));?></td>
        <td><?php echo $attendance->time_in;?></td>
        <?php if($attendance->time_out):?>
        <td><?php echo $attendance->time_out;?></td>  
        <?php else:?>
        <td>-----</td>
        <?php endif;?>
    </tr>
    <?php endforeach;endif;?>
   
</table>

</div>
<div id="printableArea" style="display: none;">
<label>Employee Name: &nbsp;</label><?php $details = $this->M_User->get_employee_details($employee_id);
echo $details->name;?>
<div class="row"></div>
<div class="col-sm-6" style="border:1px solid #ccc;padding:20px;border-radius: 5px;">
    <em>Total Number of Days:</em> &nbsp;<label><?php echo $total_number_of_days;?></label> <br>
    <em>Employee Rate:</em> &nbsp;<label><?php echo $emp->rate;?></label> <br>
    <div class="pull-right">
    <em>Total Salary:</em>&nbsp; <label id="salary"><?php echo (int)$emp->rate * (int)$total_number_of_days; ?></label>
    </div>
    <br>
    <hr>
    <em>Bonus & Fringe Benefits:</em>
    <ul>
        <?php if(count($fringe)): foreach($fringe as $f):?>
            <li><em><?php echo $f->notes;?>: &nbsp;<label><?php echo $f->amount;?></label> </em></li>
        <?php endforeach; else:?>
        <li>No bonus & fringe benefits</li>
    <?php endif;?>
    </ul>
    <div class="pull-right">
    <em>Total Bonus and Fringe Benefits:</em>&nbsp; <label id=""><?php echo $total_bonus;?></label>
    </div>
    <br>
    <hr>
    <em>Deductions:</em>
        <ul>
            <li><em>SSS:</em> &nbsp;<label><?php echo $benefit->sss;?></label></li>
            <li><em>PAGIBIG:</em> &nbsp;<label><?php echo $benefit->pagibig;?></label></li>
            <li><em>PHILHEALTH:</em> &nbsp;<label><?php echo $benefit->philhealth;?></label></li>
            <li><em>TAX: &nbsp;<label><?php echo $benefit->tax;?></label></em></li>
        </ul>

    <div class="pull-right">
    <em>Total Deductions: &nbsp;<label><?php echo $total_deductions;?></em>
    </div>
    <br>
    <hr>
    <em>Total Salary:</em>&nbsp; <label id="salary"><?php echo (int)$emp->rate * (int)$total_number_of_days; ?></label> <br>
    <em>Total Bonus and Fringe Benefits:</em>&nbsp; <label id=""><?php echo $total_bonus;?></label> <br>
    <em>Total Deductions:</em> &nbsp;<label><?php echo $total_deductions;?> </label><br>
     <em>Total Pay: &nbsp;<label><u><?php echo (((int)$emp->rate * (int)$total_number_of_days) + (int)$total_bonus) - (int)$total_deductions ; ?></u></em> 
</div>
</div>
<script type="text/javascript">
function printDiv(divName){
        var printContents = $('#'+divName).html();
        var originalContents = $('body').html();

        $('body').html(printContents);
        window.print();
        $('body').html(originalContents);
    }
</script>