<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        &nbsp;
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>employees"><i class="fa fa-group"></i> Employees </a></li>
        <li><?php echo $employee_details->name;?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">

          <div class="form-group pull-right" style="margin-right: 20px;">
              <img src="<?php echo base_url();?>uploads/<?php echo $employee_details->image;?>" style="width: 200px;height: 200px;position: relative;" class="">
              <button class="btn btn-primary" id="btnOpen" style="position: absolute;top: 0;right: 40px;"><span class="fa fa-edit"></span></button>
          </div>
        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'edit_form');
        echo form_open('employees/update/'.$employee_details->id,$attributes);
        ;?>
          <div class="row"></div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="<?php echo $employee_details->name;?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Position</label>

            <div class="col-sm-10">
            <select class="form-control" name="position" required="">
                <option value="Pet Care" <?php if($employee_details->position == 'Pet Care'){echo "selected";}?>>Pet Care</option>
                <option value="Cashier" <?php if($employee_details->position == 'Cashier'){echo "selected";}?>>Cashier</option>
                <option value="Manager" <?php if($employee_details->position == 'Manager'){echo "selected";}?>>Manager</option>
                <option value="Assistant Manager" <?php if($employee_details->position == 'Assistant Manager'){echo "selected";}?>>Assistant Manager</option>
                <option value="Veterenarian" <?php if($employee_details->position == 'Veterenarian'){echo "selected";}?>>Veterenarian</option>
                <option value="Pet Groomer" <?php if($employee_details->position == 'Pet Groomer'){echo "selected";}?>>Pet Groomer</option>
              </select>
              <!-- <input type="text" class="form-control" id="inputName" placeholder="Position" name="position" required> -->
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Address</label>

            <div class="col-sm-10">
              <textarea class="form-control" name="address" placeholder="Address" required=""><?php echo $employee_details->address;?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Contact</label>

            <div class="col-sm-10">
              <input type="number" class="form-control" name="contact" placeholder="Contact" required="" value="<?php echo $employee_details->contact;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Email</label>

            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" placeholder="Email" required="" value="<?php echo $employee_details->email;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Blood Type</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="blood_type" placeholder="Blood Type" required="" value="<?php echo $employee_details->blood_type;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Nickname</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" placeholder="Nickname" name="nickname" required value="<?php echo $employee_details->nickname;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Birthday</label>

            <div class="col-sm-10">
              <input type="date" class="form-control" id="inputName" name="birthday" required value="<?php echo $employee_details->birthday;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Gender</label>

            <div class="col-sm-10">
              <select class="form-control" name="gender" required="">
                <option value="male"  <?php if($employee_details->gender == 'male'){echo "selected";}?>>Male</option>
                <option value="female" <?php if($employee_details->gender == 'female'){echo "selected";}?>>Female</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Age</label>

            <div class="col-sm-10">
              <input type="number" class="form-control" id="inputName" placeholder="Age" name="age" required value="<?php echo $employee_details->age;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Civil Status</label>

            <div class="col-sm-10">
              <select class="form-control" name="civil_status" required="">
                <option value="single" <?php if($employee_details->civil_status == 'single'){echo "selected";}?>>Single</option>
                <option value="married" <?php if($employee_details->civil_status == 'married'){echo "selected";}?>>Married</option>
                <option value="widowed" <?php if($employee_details->civil_status == 'widowed'){echo "selected";}?>>Widowed</option>
              </select>
            </div>
          </div>
           <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Religion</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" placeholder="Religion" name="religion" required value="<?php echo $employee_details->religion;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Height (* ft)</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" placeholder="Height" name="height" required value="<?php echo $employee_details->height;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Weight (* kg)</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" placeholder="Weight" name="weight" required value="<?php echo $employee_details->weight;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Nationality</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" placeholder="Nationality" name="nationality" required value="<?php echo $employee_details->nationality;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Language</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" placeholder="Language" name="language" required value="<?php echo $employee_details->language;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">College Level</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" placeholder="College Level" name="college_level" required value="<?php echo $employee_details->college_level;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Course</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" placeholder="Course" name="course" required value="<?php echo $employee_details->course;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Level</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" placeholder="Level" name="level" required value="<?php echo $employee_details->level;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Secondary</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" placeholder="Secondary" name="secondary" required value="<?php echo $employee_details->secondary;?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Primary Level</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" placeholder="Primary Level" name="primary_level" required value="<?php echo $employee_details->primary_level;?>">
            </div>
            <hr>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px;">
                <button type="submit" id="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>


  <form style="display:none;" action="<?php echo base_url();?>user/upload_image/<?php echo $employee_details->id;?>" method="post" enctype="multipart/form-data">
    <input type="file" name="image" onchange="this.form.submit();" style="display:none;">
  </form>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#btnOpen').click(function(){
        $("[name='image']").click();
      });
    })
  </script>