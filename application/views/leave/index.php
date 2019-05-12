
  <section class="content-header">
    <h1>
      Leave 
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-6">
      <div class="col-sm-7" style="padding:0"><p>List of Employees who have leave today</p></div>
      <div class="col-sm-5 pull-right">
      	<form action="<?php echo base_url();?>leave" method="post">
      		<input type="date" name="filter_date" class="form-control" style="position: relative;" value="<?php echo $selected_date;?>">
      		<button type="submit" name="" class="btn btn-primary" style="position: absolute;top:0;right: 0;"><i class="fa fa-chevron-right"></i></button>

      	</form>
      </div>
       <table class="table table-hover" style="margin-top: 10px;" id="">
	      <tbody><tr>
	        <th>Employee Name</th>
	        <th>Notes</th>
	        <th>Date</th>
	        <th></th>
	      </tr>
       <?php if(count($leave)): foreach($leave as $l):?>
            <tr>
            <td><?php $details = $this->M_User->get_employee_details($l->employee_id); echo $details->name;?></td>
            <td><?php echo $l->note;?></td>
            <td><?php echo date('M d Y', strtotime($l->date));?></td>
            <td><a href="<?php echo base_url();?>leave/remove_leave/<?php echo $l->id;?>" onclick="return confirm('Remove Leave?')"><button class="btn btn-danger btn-xs"><i class="fa fa-times"></button></i></a></td>
          </tr>
          <?php endforeach;?>
          <?php else:?> 
            <tr>
              <td colspan="5">No leave found.</td>
            </tr>
          <?php endif;?>
	      </tbody>
	    </table>
      </section>
      <section class="col-lg-6">
        <div class="box">
          </div>

          <!-- /.box-header -->
          <input type="text" name="" placeholder="Search employee" class="form-control" id="searchEmployee">
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover" style="margin-top: 10px;" id="employee_table">
              <tbody><tr>
                <th>Name</th>
                <th>Position</th>
                <th></th>
              </tr>
              <?php if(count($employees)): foreach($employees as $employee):?>
                <tr>
                <td><?php echo $employee->name;?></td>
                <td><?php echo ucfirst($employee->position);?></td>
                <td>
                  <a href="<?php echo base_url();?>leave/add_leave/<?php echo $employee->id;?>"><button type="button" class="btn btn-default btn-xs">Add Leave</button></a>
                </td>
              </tr>
              <?php endforeach;?>
              <?php else:?> 
                <tr>
                  <td colspan="5">No employees found.</td>
                </tr>
              <?php endif;?>
              
              
            </tbody></table>
            <center><?php echo $this->pagination->create_links();?></center>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

  </section>
  <script type="text/javascript">
    $(document).ready(function(){
        $.expr[":"].contains = $.expr.createPseudo(function ( arg ){
          return function( elem ){
            return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
          }
        });
       $('#searchEmployee').keyup(throttle(function(){
            var keyword = $(this).val(); 
            $('#employee_table tr').fadeOut();
            if(keyword.length == 0){
                $('#employee_table tr').fadeIn(); 
              }else{
                // $(".item-member .member-name:contains('" + keyword + "'),.item-member address:contains('" + keyword + "')").parent().fadeIn();
                $("#employee_table tr td:contains('" + keyword + "')").parent('tr').fadeIn();
                $("#employee_table tr td:contains('" + keyword + "')").parent('tr').fadeIn();
              }
        })); 
    });
    function throttle(f, delay){
      var timer = null;
      return function(){
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = window.setTimeout(function() {
          f.apply(context, args);
        },
        delay || 500);
      }
    }
</script>