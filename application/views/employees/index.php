
  <section class="content-header">
    <h1>
      Employees <button type="button" class="btn btn-primary" id="add_employee">Add</button>
      <form class="form-inline pull-right" role="form" action="<?php echo base_url(). 'employees/search'?>" method="post">
      <div class="input-group input-group-sm" style="width:100%;">
        <input type="text" name="input_search" id="input_search" class="form-control pull-right" placeholder="Search">
        <div class="input-group-btn">
          <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
      </form>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-group"></i> Employees </a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <div class="col-lg-12"> 
        <a href="<?php echo base_url();?>admin/employees/download" target="_blank"><button class="btn btn-success pull-right" onclick="printDiv('printableArea')">Print</button></a>
      </div>
      <section class="col-lg-12">
        <div class="box">
          </div>

          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover" style="margin-top: 10px;">
              <tbody><tr>
                <th>Name</th>
                <th>Position</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Action</th>
              </tr>
              <?php if(count($employees)): foreach($employees as $employee):?>
                <tr>
                <td><?php echo $employee->name;?></td>
                <td><?php echo ucfirst($employee->position);?></td>
                <td><?php echo $employee->address;?></td>
                <td><?php echo $employee->contact;?></td>
                <td>
                  <a href="<?php echo base_url();?>employees/view/<?php echo $employee->id;?>"><button type="button" class="btn btn-default btn-xs">View</button></a>
                  <a href="<?php echo base_url();?>employees/edit/<?php echo $employee->id;?>"><button type="button" class="btn btn-info btn-xs">Edit</button></a>
                  <a href="<?php echo base_url();?>employees/delete/<?php echo $employee->id;?>"><button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this item?')"></i>Delete</button></a>
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
<div id="printableArea" style="display: none;">
<h1>List of Employees</h1>
<table class="table table-hover" style="margin-top: 10px;">
  <tbody><tr>
    <th>Name</th>
    <th>Position</th>
    <th>Address</th>
    <th>Contact</th>
     <th>Email</th>
  </tr>
  <?php if(count($employees)): foreach($employees as $employee):?>
    <tr>
    <td><?php echo $employee->name;?></td>
    <td><?php echo ucfirst($employee->position);?></td>
    <td><?php echo $employee->address;?></td>
    <td><?php echo $employee->contact;?></td>
    <td><?php echo $employee->email;?></td>
  </tr>
  <?php endforeach;?>
  <?php else:?> 
    <tr>
      <td colspan="5">No employees found.</td>
    </tr>
  <?php endif;?>
  
  
</tbody></table>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#add_employee').click(function(){
      $('#add_employee_form').modal('show');
    });
    $('#submit').click(function(e){
        
    });
  });
 function printDiv(divName){
      var printContents = $('#'+divName).html();
      var originalContents = $('body').html();

      $('body').html(printContents);
      window.print();
      $('body').html(originalContents);
  }
</script>
<div class="modal fade" id="add_employee_form" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal_title">Add Employee</h3>
      </div>
      <div class="modal-body">
        <!-- <form class="form-horizontal"> -->

        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'add_form');
        echo form_open('employees/add',$attributes);
        ;?>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Position</label>

              <div class="col-sm-10">
              <select class="form-control" name="position" required="">
                  <option value="Pet Care">Pet Care</option>
                  <option value="Cashier">Cashier</option>
                  <option value="Manager">Manager</option>
                  <option value="Assistant Manager">Assistant Manager</option>
                  <option value="Veterenarian">Veterenarian</option>
                  <option value="Pet Groomer">Pet Groomer</option>
                </select>
                <!-- <input type="text" class="form-control" id="inputName" placeholder="Position" name="position" required> -->
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Address</label>

              <div class="col-sm-10">
                <textarea class="form-control" name="address" placeholder="Address" required=""></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Contact</label>

              <div class="col-sm-10">
                <input type="number" class="form-control" name="contact" placeholder="Contact" required="">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Email</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" placeholder="Email" required="">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Blood Type</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" name="blood_type" placeholder="Blood Type" required="">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Nickname</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Nickname" name="nickname" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Birthday</label>

              <div class="col-sm-10">
                <input type="date" class="form-control" id="inputName" name="birthday" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Birthday</label>

              <div class="col-sm-10">
                <select class="form-control" name="gender" required="">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Age</label>

              <div class="col-sm-10">
                <input type="number" class="form-control" id="inputName" placeholder="Age" name="age" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Civil Status</label>

              <div class="col-sm-10">
                <select class="form-control" name="civil_status" required="">
                  <option value="single">Single</option>
                  <option value="married">Married</option>
                  <option value="widowed">Widowed</option>
                </select>
              </div>
            </div>
             <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Religion</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Religion" name="religion" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Height (* ft)</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Height" name="height" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Weight (* ft)</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Weight" name="weight" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Nationality</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Nationality" name="nationality" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Language</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Language" name="language" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">College Level</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="College Level" name="college_level" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Course</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Course" name="course" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Level</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Level" name="level" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Secondary</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Secondary" name="secondary" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Primary Level</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Primary Level" name="primary_level" required>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>