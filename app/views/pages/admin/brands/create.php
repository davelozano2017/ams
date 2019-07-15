<?php extract($data);?>

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Brands</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li>Settings</li>
            <li>Brands</li>
            <li class="active">Create</li>
        </ul>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <form action="<?=site_url('maintenance/createBrands')?>" method="POST" data-parsley-validate class="form-horizontal">
    <input type="hidden" name="token" value="<?=$token?>">
        <div class="panel panel-flat">
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Brand:</label>
                    <div class="col-lg-9">
                        <input type="text" name="brands_name" class="form-control" required>
                    </div>
                </div>
                <div class="text-right">
                    <a href="<?=site_url('settings')?>" class="btn btn-primary"><i class="icon-arrow-left13 position-left"></i> Back</a>
                    <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    </form>
<!-- /simple panel -->