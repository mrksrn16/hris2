
  <section class="content-header">
    <h1>
      <!-- Employee Rate <button type="button" class="btn btn-primary" id="add_employee">Add</button> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-group"></i> Benefits</a></li>
    </ol>
    <!-- <button class="btn btn-primary" onclick="add_rate()">Add</button> -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <section class="col-lg-12">
        <div class="box">
          </div>

          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover" style="margin-top: 10px;">
              <tbody><tr>
                <th>Position</th>
                <th>SSS</th>
                <th>PHILHEALTH</th>
                <th>PAGIBIG</th>
                <th>TAX</th>
                <th></th>
              </tr>
              <?php if(count($benefits)): foreach($benefits as $benefit):?>
                <tr>
                  <td><?php echo $benefit->position;?></td>
                  <td><?php echo $benefit->sss;?></td>
                  <td><?php echo $benefit->philhealth;?></td>
                  <td><?php echo $benefit->pagibig;?></td>
                  <td><?php echo $benefit->tax;?></td>
                  <td>
                    <a href="javascript:void(0)" onclick="edit('<?php echo $benefit->id;?>')"><button class="btn btn-primary btn-xs">Edit</button></a>
                  </td>
                </tr>
              <?php endforeach;?>
              <?php else:?> 
                <tr>
                  <td colspan="5">No employee rate found.</td>
                </tr>
              <?php endif;?>
              
              
            </tbody></table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- right col -->
    </div>

<script type="text/javascript">
  var base_url = '<?php echo base_url();?>';

  $(document).ready(function(){
  });
  function edit(id){
    save_method = 'edit';
    $('#benefits_form').modal('show');
    $.ajax({
      type: "GET",
      url: base_url + 'benefits/get_benefits/' + id,
      dataType: "JSON",
      success: function(data){
        $('[name="id"]').val(data.id);
        $('[name="position"]').val(data.position);
        $('[name="sss"]').val(data.sss);
        $('[name="philhealth"]').val(data.philhealth);
        $('[name="pagibig"]').val(data.pagibig);
        $('[name="tax"]').val(data.tax);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error on ajax');
      }
    });
  }
</script>
<div class="modal fade" id="benefits_form" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal_title">Employee Benefits</h3>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url();?>benefits/update_benefit" method="post" id="form1" class="form-horizontal">
          <div class="form-body">
            <input type="hidden" name="id" value="">
            <div class="form-group">
              <label class="control-label col-md-3">Position:</label>
              <div class="col-md-9">
                <input class="form-control" type="text" name="position" placeholder="Position" required="">
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">SSS:</label>
              <div class="col-md-9">
                <input class="form-control" type="number" name="sss" placeholder="SSS" required="">
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">PHILHEALTH:</label>
              <div class="col-md-9">
                <input class="form-control" type="number" name="philhealth" placeholder="PHILHEALTH" required="">
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">PAGIBIG:</label>
              <div class="col-md-9">
                <input class="form-control" type="number" name="pagibig" placeholder="PAGIBIG" required="">
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">TAX:</label>
              <div class="col-md-9">
                <input class="form-control" type="number" name="tax" placeholder="TAX" required="">
                <span class="help-block"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3" ></label>
            <div class="col-md-9">
              <input type="submit" name="submit" value="Update" class="btn btn-primary">
              <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        2016 © CCIVI-Admin
      </div>
    </div>
  </div>
</div>