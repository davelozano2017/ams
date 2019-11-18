<?php extract($data);?>

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Inventory</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li class="active">Inventory</li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <!-- Basic responsive configuration -->
    
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">List of Assets</h5>
        </div>
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
<!-- /basic responsive configuration -->