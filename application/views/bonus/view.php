<?php 
$emp = $this->M_User->get_employee_rate($employee_id); 
$ids = array();
?>
<h3>Bonus and Fringe <button class="btn btn-primary" onclick="add_bonus()">Add</button></h3>
<label>Employee Name: &nbsp;</label><?php $details = $this->M_User->get_employee_details($employee_id);
echo $details->name;?>
<div class="col-sm-12">
<table class="table table-stripped">
    <tr>
        <th>Date</th>
        <th>Amount</th>
        <th>Notes</th>
        <th></th>
    </tr>
    <?php if(count($employee_bonus)): foreach($employee_bonus as $bonus):?>
    <tr>
        <td><?php echo date('M d Y', strtotime($bonus->date));?></td>
        <td><?php echo $bonus->amount;?></td>
        <td><?php echo $bonus->notes;?></td>
        <td><a href="javascript:void(0);" onclick="edit_bonus('<?php echo $bonus->id;?>')"><span class="btn btn-info btn-xs">Edit</span></a> &nbsp; <a href="<?php echo base_url();?>bonus/delete_bonus/<?php echo $bonus->id;?>/<?php echo $employee_id;?>" onclick="return confirm('Delete bonus?')"><span class="btn btn-danger btn-xs">Remove</span></a></td>
    </tr>
    <?php endforeach;endif;?>
   
</table>

</div>
<script type="text/javascript">
function add_bonus(){
    $('#add_bonus').modal('show');
}
function edit_bonus(id){
    $('#edit_bonus').modal('show');
    base_url = '<?php echo base_url();?>';
    $.ajax({
      type: "get",
      url: base_url + 'bonus/get_bonus/' + id,
      dataType: "json",
      success: function(data){
        $('[name="bonus_amount"]').val(data.amount);
        $('[name="bonus_notes"]').val(data.notes);
        $('[name="bonus_id"]').val(data.id);
        $('[name="employee_id"]').val(data.employee_id);
      }
    });
  }
</script>
<!-- Bonus Form -->
<div class="modal fade" id="add_bonus" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal_title">Add Bonus</h3>
      </div>
      <div class="modal-body">
        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'bonus_form');
        echo form_open('bonus/add/'.$employee_id  ,$attributes);
        ;?>
            <div class="form-group">
              <label for="attendanceDate" class="col-sm-2 control-label">Amount</label>

              <div class="col-sm-10">
                <input type="number" class="form-control" id="inputName" name="bonus_amount" placeholder="Amount" required="">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Notes</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="notes" placeholder="Add notes" required=""></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        LC Brand
      </div>
    </div>
  </div>
</div>
<!-- Edit Bonus -->
<div class="modal fade" id="edit_bonus" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal_title">Edit Bonus</h3>
      </div>
      <div class="modal-body">
        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'bonus_form');
        echo form_open('bonus/update_bonus',$attributes);
        ;?>
            <div class="form-group">
              <input type="hidden" name="bonus_id">
              <input type="hidden" name="employee_id">
              <label for="inputName" class="col-sm-2 control-label">Amount</label>

              <div class="col-sm-10">
                <input type="number" class="form-control" name="bonus_amount" placeholder="Amount" required="">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Notes</label>

              <div class="col-sm-10">
                <textarea class="form-control" name="bonus_notes" placeholder="Add notes" required=""></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        LC Brand
      </div>
    </div>
  </div>
</div>