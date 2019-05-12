
<h3>Payroll<span class="pull-right"><?php echo date('M d Y');?></span></h3>
<input type="text" name="" placeholder="Search employee" class="form-control" id="searchEmployee">

<table class="table table-stripped" id="employee_table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Position</th>
        <th></th>
    </tr>
    <?php if(count($employees)): foreach($employees as $employee): ?>
        <tr>
            <td><?php echo $employee->id;?></td>
            <td><?php echo $employee->name;?></td>
            <td><?php echo $employee->position;?></td>
            <td>
                <a href="<?php echo base_url();?>payroll/view/<?php echo $employee->id;?>"><button class="btn btn-success btn-xs">View Payroll</button></a>
            </td>
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