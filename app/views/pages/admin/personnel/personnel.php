<?php extract($data);?>

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Personnel</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li class="active">Personnel</li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <!-- Basic responsive configuration -->
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <a href="<?=site_url('personnel/create')?>" class="btn btn-primary">Create <i class="icon-arrow-right14 position-right"></i></a>
            </div>
            <?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left ">'.$_SESSION['message'].'</div>'; unset($_SESSION['message']) ?>  
        </div>
    </div>

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">List of  Personnels</h5>
        </div>

        <table style="overflow:hidden;" class="table datatable-responsive">
            <thead>
                <tr>
                    <th style="width:1px">#</th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th style="width:1px">Contact</th>
                    <th style="width:1px">Status</th>
                    <th style="width:1px">Role</th>
                    <th>Email Address</th>
                    <th style="width:1px"></th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($query as $row) { ?> 
                    <tr>
                        <td><?=$i++?></td>
                        <td><?=$row['id_number']?></td>
                        <td><?=$row['name']?></td>
                        <td><?=$row['contact']?></td>
                        <td><?=$row['is_status'] == 0 ? '<span class="label label-primary">Active</span>' : '<span class="label label-danger">Not Active</span>';?></td>
                        <td><?=$row['role'] == 0 ? '<span class="label label-danger">Super Admin</span>' : '<span class="label label-success">Admin</span>';?></td>
                        <td><?=$row['email']?></td>
                        <td><a href="<?=site_url('personnel/view/'.encode($row['accounts_id']))?>">View</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<!-- /basic responsive configuration -->