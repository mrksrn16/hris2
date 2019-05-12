
<h3>Transactions<span class="pull-right"><?php echo date('M d Y');?></span></h3>

<table class="table table-stripped" id="employee_table">
    <tr>
        <th>Date</th>
        <th>Employee Name</th>
        <th>Total Salary</th>
        <th>Total Bonus</th>
        <th>Total Deductions</th>
        <th>Total Pay</th>
    </tr>
    <?php if(count($transactions)): foreach($transactions as $transaction): ?>
        <tr>
            <td><?php echo date('M d Y', strtotime($transaction->date));?></td>
            <td><?php $details = $this->M_User->get_employee_details($transaction->employee_id); echo $details->name;?></td>
            <td><?php echo $transaction->total_salary;?></td>
            <td><?php echo $transaction->total_bonus;?></td>
            <td><?php echo $transaction->total_deduction;?></td>
            <td><?php echo $transaction->salary;?></td>
        </tr>
    <?php endforeach; endif;?>
</table>