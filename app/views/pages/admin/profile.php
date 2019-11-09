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
    <?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left ">'.$_SESSION['message'].'</div>'; unset($_SESSION['message']) ?>  
<!-- Simple panel -->
<form action="<?=site_url('accounts/updateProfile')?>" method="POST" data-parsley-validate class="form-horizontal">
    <input type="hidden" name="token" value="<?=$token?>">
    <input type="hidden" name="accounts_id" value="<?=encode($user[0]['accounts_id'])?>">
    <div class="panel panel-flat">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-lg-3 control-label">Name:</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" pattern="^[ a-zA-Z]+(\s[a-zA-Z]+)?$" maxlength=60 name="name" value="<?=$user[0]['name']?>" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Contact Number:</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" pattern="\d{11}"  minlength=11 maxlength=11 name="contact" value="<?=$user[0]['contact']?>" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Email Address:</label>
                <div class="col-lg-9">
                    <input type="email" class="form-control" name="email" value="<?=$user[0]['email']?>" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Password:</label>
                <div class="col-lg-9">
                    <input type="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  autocomplete="new-password" name="password" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Confirm Password:</label>
                <div class="col-lg-9">
                    <input type="password" name="confirm_password" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label"></label>
                <div class="col-lg-9">
                    <b>Note: Minimum atleast 8 characters and should contain at least : 1 capital letter, 1 number and 1 special character</b>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Save Changes <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </div>
</form>
<!-- /simple panel -->