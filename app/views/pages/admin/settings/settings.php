<?php extract($data);?>

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Settings</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li class="active">Settings</li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <!-- Simple panel -->
    <?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left ">'.$_SESSION['message'].'</div>'; unset($_SESSION['message']) ?>  
    <div class="row">
        <form method="POST" action="<?=site_url('maintenance/updateSettings')?>" class="form-horizontal" data-parsley-validate>
            <input type="hidden" name="settings_id" value="<?=encode($settings[0]['settings_id'])?>">
            <input type="hidden" name="token" value="<?=$token?>">
            <div class="col-md-5">

            <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Settings</h5>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Website Name:</label>
                            <div class="col-lg-9">
                                <input type="text" name="website_name" value="<?=$settings[0]['website_name']?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Date Format:</label>
                            <div class="col-lg-9">
                                <input type="text" name="date_format" value="<?=$settings[0]['date_format']?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Timezone:</label>
                            <div class="col-lg-9">
                                <input type="text" name="timezone" value="<?=$settings[0]['timezone']?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group pull-right">
                            <div class="col-lg-12">
                                <button type="submit" style="color:#fff" class="btn btn-primary">Save Changes <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">List of Brands</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a style="color:#fff" href="<?=site_url('brands/create')?>" class="btn btn-primary">Create <i class="icon-arrow-right14 position-right"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table style="overflow:hidden;" class="table ">
                            <thead>
                                <tr>
                                    <th style="width:1px">#</th>
                                    <th>Brands</th>
                                    <th style="width:1px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($brands_type as $brands) { ?> 
                                    <tr>
                                        <td><?=$i++?></td>
                                        <td><?=$brands['brands_name']?></td>
                                        <td><a href="<?=site_url('brands/edit/'.encode($brands['brands_id']))?>">View</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </form>

        <div class="col-md-7">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">List of Assets Types</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a style="color:#fff" href="<?=site_url('assets/create')?>" class="btn btn-primary">Create <i class="icon-arrow-right14 position-right"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <table style="overflow:hidden;" class="table ">
                        <thead>
                            <tr>
                                <th style="width:1px">#</th>
                                <th>Assets Type</th>
                                <th style="width:1px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($assets_type as $row) { ?> 
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$row['assets_name']?></td>
                                    <td><a href="<?=site_url('assets/edit/'.encode($row['assets_type_id']))?>">View</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">List of Vendors</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a style="color:#fff" href="<?=site_url('vendors/create')?>" class="btn btn-primary">Create <i class="icon-arrow-right14 position-right"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <table style="overflow:hidden;" class="table datatable-responsive">
                        <thead>
                            <tr>
                                <th style="width:1px">#</th>
                                <th>Name</th>
                                <th>Website</th>
                                <th>Contact</th>
                                <th>Email Address</th>
                                <th style="width:1px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($allVendors as $row) { ?> 
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$row['name']?></td>
                                    <td><?=empty($row['website']) ? 'N/A' : $row['website']?></td>
                                    <td><?=$row['contact']?></td>
                                    <td><?=$row['email']?></td>
                                    <td><a href="<?=site_url('vendors/edit/'.encode($row['vendors_id']))?>">View</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /simple panel -->