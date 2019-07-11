<?php extract($data);?>

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"><?=$getAssetsType[0]['assets_name']?></span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li>Assets</li>
            <li>edit</li>
            <li class="active"><?=$getAssetsType[0]['assets_name']?></li>
        </ul>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left ">'.$_SESSION['message'].'</div>'; unset($_SESSION['message']) ?>  
    <form action="<?=site_url('maintenance/updateAssetType')?>" method="POST" data-parsley-validate class="form-horizontal">
    <input type="hidden" name="token" value="<?=$token?>">
    <input type="hidden" name="assets_type_id" value="<?=encode($getAssetsType[0]['assets_type_id'])?>">
        <div class="panel panel-flat">
            <div class="panel-body">
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Asset Name:</label>
                    <div class="col-lg-9">
                        <input type="text" name="assets_name" value="<?=$getAssetsType[0]['assets_name']?>" class="form-control" required>
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