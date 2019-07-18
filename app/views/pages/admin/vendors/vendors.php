<?php extract($data);?>

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"><?=$data['getVendorsByVendorsId'][0]['vendor_name']?></span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li>Vendors</li>
            <li class="active"><?=$data['getVendorsByVendorsId'][0]['vendor_name']?></li>
        </ul>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">List Of Assets</h5>
                </div>

                <div class="panel-body">
                    <table style="overflow:hidden;" class="table datatable-responsive">
                        <thead>
                            <tr>
                                <th style="width:1px">#</th>
                                <th>Serial</th>
                                <th>Brand</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Model</th>
                                <th>Waranty</th>
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
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>