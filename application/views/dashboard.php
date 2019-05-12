<h3>Good day! <span class="pull-right"><?php echo date('M d Y');?></span></h3>
<input type="text" name="" placeholder="Search employee" class="form-control" id="searchEmployee">
<table class="table table-stripped" id="employee_table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Position</th>
        <th>Time in</th>
        <th>Time out</th>
    </tr>
    <?php if(count($employees)): foreach($employees as $employee): ?>
            <?php  $check_if_leave = $this->M_User->check_if_leave($employee->id);?>
        <?php if($check_if_leave):?>
        <tr style="background: rgba(255, 0, 0, 0.4);">
        <?php else:?>
        <tr>
        <?php endif;?>   
            <td><?php echo $employee->id;?></td>
            <td><?php echo $employee->name;?></td>
            <td><?php echo $employee->position;?></td>

            <?php
            if($check_if_leave):
            ?>
            <td colspan="2">---Leave---</td>
            <?php else:?>
            <?php 
                $details = $this->M_User->check_if_time_in($employee->id);
                if(!$details):
            ?>
            <td style="width: 200px;">
                <a href="<?php echo base_url();?>attendance/add/<?php echo $employee->id;?>"><button class="btn btn-primary btn-block">IN</button></a>
            </td>
            <?php else:?>
            <td><?php echo $details[0]->time_in;?></td>
                <?php 
                    $details_out = $this->M_User->check_if_time_out($employee->id);
                    if(!$details[0]->time_out):
                ?>
                <td style="width: 200px;">
                    <a href="<?php echo base_url();?>attendance/out/<?php echo $details_out->id;?>" onclick="return confirm('Time out?')"><button class="btn btn-success btn-block">OUT</button></a>
                </td>
                <?php else:?>
                 <td><?php echo $details[0]->time_out;?></td>
                <?php endif;?>
            <?php endif;?>
            <?php endif;?>
        </tr>
    <?php endforeach; endif;?>
</table>

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