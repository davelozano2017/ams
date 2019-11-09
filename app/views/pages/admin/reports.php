<?php extract($data);?>

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Reports</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li class="active">Reports</li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <div class="row">
        <form  method="POST">
            <div class="form-group">
                <div class="col-sm-2 col-md-2">
                    <input type="text" class="form-control daterange-single" value='' name="from">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2 col-md-2">
                    <input type="text" class="form-control daterange-single" value='' name="to">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2 col-md-2">
                    <input type="submit" name="btnFilter" class="btn btn-info">
                </div>

            </div>
        </form>
    </div>
    <br>

    <!-- Simple panel -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"></h5>
        </div>

       
        <div class="panel-body">
           <table style="overflow:hidden;" class="table reportTable datatable-responsive">
                <thead>
                    <tr>
                        <th style="width:1px">#</th>
                        <th>Serial</th>
                        <th>Brand</th>
                        <th>Asset</th>
                        <th>Status</th>
                        <th>Model</th>
                        <th>Warranty</th>
                        <th>Expected Life</th>
                        <th>Vendor</th>
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
                            <td><?=$asset['expected_life']?></td>
                            <td><?=$asset['vendor_name']?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /simple panel -->