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
            </div>
        <?php } ?>
    </div>
    <!-- Simple panel -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Simple panel</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <h6 class="text-semibold">Start your development with no hassle!</h6>
            <p class="content-group">Common problem of templates is that all code is deeply integrated into the core. This limits your freedom in decreasing amount of code, i.e. it becomes pretty difficult to remove unnecessary code from the project. Limitless allows you to remove unnecessary and extra code easily just by removing the path to specific LESS file with component styling. All plugins and their options are also in separate files. Use only components you actually need!</p>

            <h6 class="text-semibold">What is this?</h6>
            <p class="content-group">Starter kit is a set of pages, useful for developers to start development process from scratch. Each layout includes base components only: layout, page kits, color system which is still optional, bootstrap files and bootstrap overrides. No extra CSS/JS files and markup. CSS files are compiled without any plugins or components. Starter kit was moved to a separate folder for better accessibility.</p>

            <h6 class="text-semibold">How does it work?</h6>
            <p>You open one of the starter pages, add necessary plugins, uncomment paths to files in components.less file, compile new CSS. That's it. I'd also recommend to open one of main pages with functionality you need and copy all paths/JS code from there to your new page, it's just faster and easier.</p>
        </div>
    </div>
    <!-- /simple panel -->