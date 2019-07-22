<?php extract($data);?>

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Project</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li class="active">Project</li>
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
                <a href="<?=site_url('project/create')?>" class="btn btn-primary">Create <i class="icon-arrow-right14 position-right"></i></a>
            </div>
            <?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left ">'.$_SESSION['message'].'</div>'; unset($_SESSION['message']) ?>  
        </div>
    </div>

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">List of  Projects</h5>
        </div>

        <table style="overflow:hidden;" class="table datatable-responsive">
            <thead>
                <tr>
                    <th style="width:1px">#</th>
                    <th>Project</th>
                    <th>Engineer</th>
                    <th>Type</th>
                    <th>Estimate</th>
                    <th style="width:1px"></th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($allProjects as $row) { ?> 
                    <tr>
                        <td><?=$i++?></td>
                        <td><?=$row['project_name']?></td>
                        <td><?=$row['name']?></td>
                        <td><?=$row['project_type']?></td>
                        <td>₱<?=number_format($row['cost_estimate'],2)?></td>
                        <td><a href="<?=site_url('project/view/'.encode($row['projects_id']))?>">View</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<!-- /basic responsive configuration -->