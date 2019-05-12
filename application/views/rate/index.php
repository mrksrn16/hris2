
  <section class="content-header">
    <h1>
      <!-- Employee Rate <button type="button" class="btn btn-primary" id="add_employee">Add</button> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-group"></i> Position/Rate</a></li>
    </ol>
    <button class="btn btn-primary" onclick="add_rate()">Add</button>
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
                <th>Rate</th>
                <th></th>
              </tr>
              <?php if(count($rates)): foreach($rates as $rate):?>
                <tr>
                  <td><?php echo $rate->position;?></td>
                  <td><?php echo $rate->rate;?></td>
                  <td>
                    <a href="javascript:void(0)" onclick="edit('<?php echo $rate->id;?>')"><button class="btn btn-primary btn-xs">Edit</button></a>
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
    <!-- /.row (main row) -->
<div class="modal fade" id="rate_form" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal_title">Employee Rate</h3>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url();?>rate/update_rate" method="post" id="form1" class="form-horizontal">
          <div class="form-body">
            <input type="hidden" name="id" value="">
            <div class="form-group">
              <label class="control-label col-md-3">Position:</label>
              <div class="col-md-9">
                <input class="form-control" type="text" name="position" placeholder="Position" disabled="">
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Rate:</label>
              <div class="col-md-9">
                <input class="form-control" type="number" name="rate" placeholder="Rate">
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
<div class="modal fade" id="add_rate_form" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal_title">Add Position/Rate</h3>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url();?>rate/add_rate" method="post" id="form1" class="form-horizontal">
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Position:</label>
              <div class="col-md-9">
                <input class="form-control" type="text" name="position" placeholder="Position" required="">
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Rate:</label>
              <div class="col-md-9">
                <input class="form-control" type="number" name="rate" placeholder="Rate" required="">
                <span class="help-block"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3" ></label>
            <div class="col-md-9">
              <input type="submit" name="submit" value="Save" class="btn btn-primary">
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
<script type="text/javascript">
  var base_url = '<?php echo base_url();?>';

  $(document).ready(function(){
  });
  function add_rate(){
    $('#add_rate_form').modal('show');
  }
  function edit(id){
    save_method = 'edit';
    $('#rate_form').modal('show');
    $.ajax({
      type: "GET",
      url: base_url + 'rate/get_rate/' + id,
      dataType: "JSON",
      success: function(data){
        $('[name="id"]').val(data.id);
        $('[name="position"]').val(data.position);
        $('[name="rate"]').val(data.rate);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error on ajax');
      }
    });
  }
</script>