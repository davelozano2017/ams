<?php extract($data);?>

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"><?=$vendors[0]['name']?></span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li>Vendors</li>
            <li>edit</li>
            <li class="active"><?=$vendors[0]['name']?></li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left ">'.$_SESSION['message'].'</div>'; unset($_SESSION['message']) ?>  
    <form action="<?=site_url('maintenance/updateVendors')?>" method="POST" data-parsley-validate class="form-horizontal">
    <input type="hidden" name="token" value="<?=$token?>">
    <input type="hidden" name="vendors_id" value="<?=encode($vendors[0]['vendors_id'])?>">
        <div class="panel panel-flat">
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-lg-3 control-label">Name:</label>
                    <div class="col-lg-9">
                        <input type="text" name="name" value="<?=$vendors[0]['name']?>" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Contact:</label>
                    <div class="col-lg-9">
                        <input type="text" name="contact" value="<?=$vendors[0]['contact']?>" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Website:</label>
                    <div class="col-lg-9">
                        <input type="text" name="website" value="<?=$vendors[0]['website']?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-9">
                        <input type="email" name="email" value="<?=$vendors[0]['email']?>" class="form-control"  required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Address:</label>
                    <div class="col-lg-9">
                        <input type="text" name="address" value="<?=$vendors[0]['address']?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Country:</label>
                    <div class="col-lg-9">
                        <select name="country" name="country" class="form-control">
                            <option value="<?=$vendors[0]['country']?>" selected><?=$vendors[0]['country']?></option>
                            <?php foreach($countries as $country) { ?>
                                <option value="<?=$country['country_name']?>"><?=$country['country_name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

              

                <div class="text-right">
                    <a href="<?=site_url('settings')?>" class="btn btn-primary"><i class="icon-arrow-left13 position-left"></i> Back</a>
                    <button type="submit" class="btn btn-primary">Save Changes <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    </form>
<!-- /simple panel -->