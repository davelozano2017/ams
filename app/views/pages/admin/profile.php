<?php extract($data);?>

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
<div class="page-header-content">
<div class="page-title">
<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Dashboard</span></h4>
</div>
</div>

<div class="breadcrumb-line">
<ul class="breadcrumb">
<li><a href="<?=site_url('dashboard')?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active"> Profile</li>
</ul>
</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
<!-- Simple panel -->
<form action="#" method="POST" data-parsley-validate class="form-horizontal">
    <div class="panel panel-flat">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-lg-3 control-label">Name:</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" value="<?=$user[0]['name']?>" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Contact:</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" value="<?=$user[0]['contact']?>" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-9">
                    <input type="email" class="form-control" value="<?=$user[0]['email']?>" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Password:</label>
                <div class="col-lg-9">
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Confirm Password:</label>
                <div class="col-lg-9">
                    <input type="password" data-parsley-equalto="#password" class="form-control" required>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Save Changes <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </div>
</form>
<!-- /simple panel -->