<?php extract($data);?>

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"><?=$data['getAssetsType'][0]['assets_name']?></span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li>Vendors</li>
            <li class="active"><?=$data['getAssetsType'][0]['assets_name']?></li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
<?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left ">'.$_SESSION['message'].'</div>'; unset($_SESSION['message']) ?>  

    <div class="row">
        <div class="col-md-5">
        <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Asset Information</h5>
                </div>

                <div class="panel-body">
                    <form action="<?=site_url('maintenance/createAssets')?>" enctype="multipart/form-data" method="POST" data-parsley-validate class="form-horizontal">
                        <input type="hidden" name="token" value="<?=$token?>">
                        <input type="hidden" name="assets_type_id" value="<?=$assets_type_id?>">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Image:</label>
                            <div class="col-lg-9">
                                <input type="file" name="files" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Serial #:</label>
                            <div class="col-lg-9">
                                <input type="text" name="serial_number" class="form-control" required>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Brand:</label>
                            <div class="col-lg-9">
                                <select name="brands_id" class="form-control">
                                    <?php foreach($brands_type as $brand) { ?> 
                                        <option value="<?=encode($brand['brands_id'])?>"><?=$brand['brands_name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Description:</label>
                            <div class="col-lg-9">
                                <input type="text" name="description" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Status:</label>
                            <div class="col-lg-9">
                                <input type="text" name="status"  class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Model:</label>
                            <div class="col-lg-9">
                                <input type="text" name="model" class="form-control"  required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Warranty Expiry:</label>
                            <div class="col-lg-9">
                                <input type="date" name="warranty_expiry" class="form-control"  required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Vendor:</label>
                            <div class="col-lg-9">
                                <select name="vendors_id" class="form-control">
                                    <?php foreach($allVendors as $vendor) { ?> 
                                        <option value="<?=encode($vendor['vendors_id'])?>"><?=$vendor['vendor_name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <?php if($data['getAssetsType'][0]['assets_name'] != 'Inventory') { ?>
                        <hr>

                        <?php if($data['getAssetsType'][0]['assets_name'] != 'Inventory') { ?>
                        <div class="row">
                            <div class="form-group pull-right">
                                <div class="col-lg-9">
                                    <button type="button" onclick="showDeprecationModal()" class="btn btn-primary pull-left"><i class="icon-arrow-left13 position-left"></i>Depreciation Method</button>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                       <div class="form-group">
                            <label class="col-lg-3 control-label">Purchase Price:</label>
                            <div class="col-lg-9">
                                <input type="number" readonly name="purchase_price" id="purchase_price" class="form-control"  required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Expected Life:</label>
                            <div class="col-lg-9">
                                <input type="text" readonly name="expected_life" id="expected_life" class="form-control"  required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Scrap Value:</label>
                            <div class="col-lg-9">
                                <input type="text" readonly name="scrap_value" id="scrap_value" class="form-control"  required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Salvage Value:</label>
                            <div class="col-lg-9">
                                <input type="text" readonly name="salvage_value" id="salvage_value" class="form-control"  required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Depreciation Cost:</label>
                            <div class="col-lg-9">
                                <input type="text" readonly name="depreciation_cost" id="depreciation_cost" class="form-control"  required>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">List of Assets</h5>
                </div>
                    
                <div class="panel-body">
                    <table style="overflow:hidden;" class="table datatable-responsive">
                        <thead>
                            <tr>
                                <th style="width:1px">#</th>
                                <th>Serial</th>
                                <th>Brand</th>
                                <th>Asset</th>
                                <th>Status</th>
                                <th>Model</th>
                                <th>Waranty</th>
                                <th>Vendor</th>
                                <th style="width:1px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($listOfAssets as $asset) { ?> 
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$asset['serial_number']?></td>
                                    <td><?=$asset['brands_name']?></td>
                                    <td><?=$asset['assets_name']?></td>
                                    <td><?=$asset['status']?></td>
                                    <td><?=$asset['model']?></td>
                                    <td><?=$asset['warranty_expiry']?></td>
                                    <td><?=$asset['vendor_name']?></td>
                                    <td><a href="<?=site_url('assets/modify/'.encode($asset['assets_id']))?>">View</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



<div id="showDeprecationModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Depreciation</h6>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" method="POST" data-parsley-validate>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Purchase Price:</label>
                        <div class="col-lg-9">
                            <input type="number" min=0 value=0 id="cpurchase_price" class="form-control"  required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Expected Life:</label>
                        <div class="col-lg-9">
                            <input type="text" id="cexpected_life" name="cexpected_life" class="form-control daterange-single" value="03/18/2013">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Scrap Value:</label>
                        <div class="col-lg-9">
                            <input type="number" id="cscrap_value" value="0" min=0 class="form-control"  required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Salvage Value:</label>
                        <div class="col-lg-9">
                            <input type="number" id="csalvage_value" min=0 readonly value="0" class="form-control"  required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Depreciation Cost:</label>
                        <div class="col-lg-9">
                            <input type="text" readonly id="cdepreciation_cost" class="form-control"  required>
                        </div>
                    </div>
                </div>

            <div class="modal-footer">
                <button type="button" id="btnComputeWithoutExit" class="btn btn-info">Compute <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            </form>
        </div>
    </div>
</div>