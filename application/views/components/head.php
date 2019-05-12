<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HRIS</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
    <style type="text/css">
        .form-horizontal .control-label{
            padding-top: 0;
        }
    </style>
</head>
<body>
<div id="wrapper">
<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <?php $cur_url =  $this->uri->segment(1); ?>
                    <li class="<?php if($cur_url == 'home'){echo 'active-link';}?>">
                        <a href="<?php echo base_url();?>home"><i class="fa fa-home "></i>Home</a>
                    </li>
                    <li class="<?php if($cur_url == 'employees'){echo 'active-link';}?>">
                        <a href="<?php echo base_url();?>employees"><i class="fa fa-users "></i>Employees</a>
                    </li>
                    <li class="<?php if($cur_url == 'rate'){echo 'active-link';}?>">
                        <a href="<?php echo base_url();?>rate"><i class="fa fa-star "></i>Position/Rate</a>
                    </li>
                    <li class="<?php if($cur_url == 'benefits'){echo 'active-link';}?>">
                        <a href="<?php echo base_url();?>benefits"><i class="fa fa-money"></i>Benefits</a>
                    </li>
                    <li  class="<?php if($cur_url == 'attendance'){echo 'active-link';}?>">
                        <a href="<?php echo base_url();?>attendance"><i class="fa fa-calendar "></i>Attendance</a>
                    </li>
                    <li  class="<?php if($cur_url == 'leave'){echo 'active-link';}?>">
                        <a href="<?php echo base_url();?>leave"><i class="fa fa-times-circle-o"></i>Leave</a>
                    </li>
                    <li  class="<?php if($cur_url == 'bonus'){echo 'active-link';}?>">
                        <a href="<?php echo base_url();?>bonus"><i class="fa fa-money"></i>Bonus & Fringe Benefits</a>
                    </li>
                   <!--   <li class="<?php if($cur_url == 'leave'){echo 'active-link';}?>">
                        <a href="<?php echo base_url();?>leave"><i class="fa fa-circle "></i>Leave</a>
                    </li> -->
                    <li class="<?php if($cur_url == 'payroll'){echo 'active-link';}?>">
                        <a href="<?php echo base_url();?>payroll"><i class="fa fa-money "></i>Payroll</a>
                    </li>
                    <li class="<?php if($cur_url == 'holiday'){echo 'active-link';}?>">
                        <a href="<?php echo base_url();?>holiday"><i class="fa fa-calendar "></i>Holidays</a>
                    </li>
                    <li class="<?php if($cur_url == 'schedules'){echo 'active-link';}?>">
                        <a href="<?php echo base_url();?>schedules"><i class="fa fa-calendar "></i>Schedules</a>
                    </li>
                    <li class="<?php if($cur_url == 'transactions'){echo 'active-link';}?>">
                        <a href="<?php echo base_url();?>transactions"><i class="fa fa-circle-o-notch"></i>Transactions</a>
                    </li>
                    
                </ul>
                            </div>

        </nav>
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                       <h1 style="color:#efefef !important">HRIS</h1>
                    </a>
                    
                </div>
              
                <span class="logout-spn">
                  <a href="<?php echo base_url();?>user/logout" onclick="return confirm('Logout?')" style="color:#fff;font-size: 18px !important;">LOGOUT</a>  
                </span>
                <span style="position: absolute;right: 20px;bottom:5px;color: #fff;font-weight: bold;"><?php echo date('M d Y')?></span>
            </div>
        </div>