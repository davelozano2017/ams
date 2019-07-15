<?php extract($data);?>

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"><?=$getAssets[0]['model']?></span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li>Assets</li>
            <li>modify</li>
            <li><?=$getAssets[0]['assets_name']?></li>
            <li class="active"><?=$getAssets[0]['model']?></li>
        </ul>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left ">'.$_SESSION['message'].'</div>'; unset($_SESSION['message']) ?>  
        <div class="panel panel-flat">
            <div class="panel-body">
            <form action="<?=site_url('maintenance/updateAssets')?>" enctype="multipart/form-data" method="POST" data-parsley-validate class="form-horizontal">
                <input type="hidden" name="token" value="<?=$token?>">
                <input type="hidden" name="assets_type_id" value="<?=encode($getAssets[0]['assets_type_id'])?>">
                <input type="hidden" name="assets_id" value="<?=encode($getAssets[0]['assets_id'])?>">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Image:</label>
                    <div class="col-lg-9">
                        <input type="file" name="files" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Serial #:</label>
                    <div class="col-lg-9">
                        <input type="text" name="serial_number" value="<?=$getAssets[0]['serial_number']?>" class="form-control" required>
                    </div>
                </div>

                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Brand:</label>
                    <div class="col-lg-9">
                        <select name="brands_id" class="form-control">
                                <option value="<?=encode($getAssets[0]['brands_id'])?>" selected><?=$getAssets[0]['brands_name']?></option>
                            <?php foreach($brands_type as $brand) { ?> 
                                <option value="<?=$brand['brands_id']?>"><?=$brand['brands_name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Description:</label>
                    <div class="col-lg-9">
                        <input type="text" name="description" value="<?=$getAssets[0]['description']?>" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Status:</label>
                    <div class="col-lg-9">
                        <input type="text" name="status" value="<?=$getAssets[0]['status']?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Model:</label>
                    <div class="col-lg-9">
                        <input type="text" name="model" value="<?=$getAssets[0]['model']?>" class="form-control"  required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Warranty Expiry:</label>
                    <div class="col-lg-9">
                        <input type="date" name="warranty_expiry" value="<?=$getAssets[0]['warranty_expiry']?>" class="form-control"  required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Vendor:</label>
                    <div class="col-lg-9">
                        <select name="vendors_id" class="form-control">
                        <option value="<?=encode($getAssets[0]['vendors_id'])?>" selected><?=$getAssets[0]['name']?></option>
                            <?php foreach($allVendors as $vendor) { ?> 
                                <option value="<?=$vendor['vendors_id']?>"><?=$vendor['name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Purchase Price:</label>
                    <div class="col-lg-9">
                        <input type="number" name="purchase_price" class="form-control" value="<?=$getAssets[0]['purchase_price']?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Expected Life:</label>
                    <div class="col-lg-9">
                        <input type="date" name="expected_life" class="form-control" value="<?=$getAssets[0]['expected_life']?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Scrap Value:</label>
                    <div class="col-lg-9">
                        <input type="text" name="scrap_value" value="<?=$getAssets[0]['scrap_value']?>" class="form-control"  required>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Save Changes <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
                
               
            </div>
        </div>
