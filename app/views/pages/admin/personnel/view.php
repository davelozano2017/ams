<?php extract($data);?>

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"><?=$query[0]['name']?></span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li>Personnel</li>
            <li>Edit</li>
            <li class="active"><?=$query[0]['name']?></li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left ">'.$_SESSION['message'].'</div>'; unset($_SESSION['message']) ?>  
    <form action="<?=site_url('accounts/updatePersonnel')?>" method="POST" data-parsley-validate class="form-horizontal">
        <input type="hidden" name="token" value="<?=$token?>">
        <input type="hidden" name="accounts_id" class="form-control" value="<?=encode($query[0]['accounts_id'])?>" required>
        <div class="panel panel-flat">
            <div class="panel-body">
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Id Number:</label>
                    <div class="col-lg-9">
                        <input type="text" name="id_number" class="form-control" value="<?=$query[0]['id_number']?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Name:</label>
                    <div class="col-lg-9">
                        <input type="text" name="name" class="form-control" value="<?=$query[0]['name']?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Contact Number:</label>
                    <div class="col-lg-9">
                        <input type="text" name="contact" class="form-control" value="<?=$query[0]['contact']?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Email Address:</label>
                    <div class="col-lg-9">
                        <input type="email" name="email" class="form-control" value="<?=$query[0]['email']?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Status:</label>
                    <div class="col-lg-9">
                        <select name="status" class="form-control">
                            <option value="<?=$query[0]['status']?>"><?=$query[0]['status'] == 0 ? 'Active' : 'Not Active'?></option>
                            <option value="0">Active</option>
                            <option value="1">Not Active</option>
                        </select>
                    </div>
                </div>

                <div class="text-right">
                    <a href="<?=site_url('personnel')?>" class="btn btn-primary"><i class="icon-arrow-left13 position-left"></i> Back</a>
                    <button type="submit" class="btn btn-primary">Save Changes <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    </form>
<!-- /simple panel -->