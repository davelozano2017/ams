<?php extract($data);?>

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Dashboard</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li class="active"><a href="<?=site_url('dashboard')?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <div class="row">
        <?php foreach($query as $key => $value) { ?>
            <div class="col-sm-6 col-md-3">
                <a href="<?=site_url('assets/view/'.encode($value['assets_id']))?>">
                    <div class="panel panel-body panel-body-accent">
                        <div class="media no-margin">
                            <div class="media-left media-middle">
                                <i class="icon-cabinet icon-3x text-success-400"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="no-margin text-semibold"><?=$value['count']?></h3>
                                <span class="text-uppercase text-size-mini text-muted"><?=$assets_type[$key]['assets_name']?></span>
                            </div>
                        </div>
                    </div>

                </a>
            </div>
        <?php } ?>
        <!-- file:///D:/need%20ko/Paid%20Templates/limitless-201/Bootstrap%203/Template/layout_1/LTR/default/full/form_select2.html -->
        <div class="col-sm-6 col-md-3">
            <div class="panel panel-body panel-body-accent">
                <div class="media no-margin">
                    <div class="media-left media-middle">
                        <i class="icon-users4 icon-3x text-success-400"></i>
                    </div>

                    <div class="media-body text-right">
                        <h3 class="no-margin text-semibold"><?=$countAllUsers?></h3>
                        <span class="text-uppercase text-size-mini text-muted">Personnels</span>
                    </div>
                </div>
            </div>
        </div>
        
    </div>