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
        <li class="pull-right"><a href="#" onclick="printDiv('printableArea')"><button class="btn btn-success btn-xs">Print</button></a></li>
        <li class="pull-right"><a href="<?php echo base_url();?>employees/edit/<?php echo $employee_details->id;?>"><button class="btn btn-primary btn-xs">Edit</button></a></a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">

          <div class="  pull-right" style="margin-right: 20px;">
              <img src="<?php echo base_url();?>uploads/<?php echo $employee_details->image;?>" style="width: 200px;height: 200px;position: relative;" class="">
              <button class="btn btn-primary" id="btnOpen" style="position: absolute;top: 0;right: 40px;"><span class="fa fa-edit"></span></button>
          </div>
        <?php 
        $attributes = array('class' => 'form-horizontal','id' => 'edit_form');
        echo form_open('employees/update/'.$employee_details->id,$attributes);
        ;?>
          <div class="row"></div>
          <!-- <div class="  col-sm-12 pull-right">
            <a href="">Edit Employee</a>
          </div> -->
          <div class=" ">
            <label for="" class="col-sm-2 control-label">Name</label>

            <div class="col-sm-4">
              <?php echo $employee_details->name;?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Position</label>

            <div class="col-sm-4">
            <?php echo $employee_details->position;?>
              <!-- <input type="text" class="form-control" id="inputName" placeholder="Position" name="position" required> -->
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Address</label>

            <div class="col-sm-4">
            <?php echo $employee_details->address;?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Contact</label>

            <div class="col-sm-4">
              <?php echo $employee_details->contact;?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Email</label>

            <div class="col-sm-4">
              <?php echo $employee_details->email;?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Blood Type</label>

            <div class="col-sm-4">
              <?php echo $employee_details->blood_type;?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Nickname</label>

            <div class="col-sm-4">
              <?php echo $employee_details->nickname;?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Birthday</label>

            <div class="col-sm-4">
              <?php echo date('M d Y', strtotime($employee_details->birthday));?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Gender</label>

            <div class="col-sm-4">
              <?php echo ucfirst($employee_details->gender); ?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Age</label>

            <div class="col-sm-4">
               <?php echo $employee_details->age;?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Civil Status</label>

            <div class="col-sm-4">
              <?php echo ucfirst($employee_details->civil_status); ?>
            </div>
          </div>
           <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Religion</label>

            <div class="col-sm-4">
              <?php echo $employee_details->religion;?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Height (* ft)</label>

            <div class="col-sm-4">
              <?php echo $employee_details->height;?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Weight (* kg)</label>

            <div class="col-sm-4">
              <?php echo $employee_details->weight;?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Nationality</label>

            <div class="col-sm-4">
              <?php echo $employee_details->nationality;?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Language</label>

            <div class="col-sm-4">
              <?php echo $employee_details->language;?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">College Level</label>

            <div class="col-sm-4">
              <?php echo $employee_details->college_level;?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Course</label>

            <div class="col-sm-4">
              <?php echo $employee_details->course;?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Level</label>

            <div class="col-sm-4">
              <?php echo $employee_details->level;?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Secondary</label>

            <div class="col-sm-4">
              <?php echo $employee_details->secondary;?>
            </div>
          </div>
          <div class=" ">
            <label for="inputName" class="col-sm-2 control-label">Primary Level</label>

            <div class="col-sm-4">
             <?php echo $employee_details->primary_level;?>
            </div>
            <hr>
          </form>
        </div>
      </div>
    </section>
  </div>
<div id="printableArea" style="display: none;">
<img src="<?php echo base_url();?>uploads/<?php echo $employee_details->image;?>" style="width: 200px;height: 200px;position: relative;" class="">
     <table class="table table-stripped">
        <tr>
          <td>Name</td>
          <td><?php echo $employee_details->name;?></td>
        </tr>
        <tr>
          <td>Position</td>
          <td><?php echo $employee_details->position;?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?php echo $employee_details->address;?></td>
        </tr>
        <tr>
          <td>Contact</td>
          <td><?php echo $employee_details->contact;?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?php echo $employee_details->email;?></td>
        </tr>
        <tr>
          <td>Blood Type</td>
          <td><?php echo $employee_details->blood_type;?></td>
        </tr>
        <tr>
          <td>Nickname</td>
          <td><?php echo $employee_details->nickname;?></td>
        </tr>
        <tr>
          <td>Birthday</td>
          <td><?php echo date('M d Y', strtotime($employee_details->birthday));?></td>
        </tr>
        <tr>
          <td>Gender</td>
          <td><?php echo $employee_details->gender;?></td>
        </tr>
         <tr>
          <td>Age</td>
          <td><?php echo $employee_details->age;?></td>
        </tr>
         <tr>
          <td>Civil Status</td>
          <td><?php echo $employee_details->civil_status;?></td>
        </tr>
         <tr>
          <td>Religion</td>
          <td><?php echo $employee_details->religion;?></td>
        </tr>
         <tr>
          <td>Height</td>
          <td><?php echo $employee_details->height;?></td>
        </tr>
         <tr>
          <td>Weight</td>
          <td><?php echo $employee_details->weight;?></td>
        </tr>
        <tr>
          <td>Nationality</td>
          <td><?php echo $employee_details->nationality;?></td>
        </tr>
        <tr>
          <td>Language</td>
          <td><?php echo $employee_details->language;?></td>
        </tr>
        <tr>
          <td>College Level</td>
          <td><?php echo $employee_details->college_level;?></td>
        </tr>
        <tr>
          <td>Course</td>
          <td><?php echo $employee_details->course;?></td>
        </tr>
        <tr>
          <td>Level</td>
          <td><?php echo $employee_details->level;?></td>
        </tr>
        <tr>
          <td>Secondary</td>
          <td><?php echo $employee_details->secondary;?></td>
        </tr>
        <tr>
          <td>Primary Level</td>
          <td><?php echo $employee_details->primary_level;?></td>
        </tr>
        <tr>
     </table>
</div>

  <form style="display:none;" action="<?php echo base_url();?>user/upload_image/<?php echo $employee_details->id;?>" method="post" enctype="multipart/form-data">
    <input type="file" name="image" onchange="this.form.submit();" style="display:none;">
  </form>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#btnOpen').click(function(){
        $("[name='image']").click();
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