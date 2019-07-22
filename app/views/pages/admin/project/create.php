<?php extract($data);?>

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Create New Project</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li>Project</li>
            <li class="active">Create</li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
<form action="<?=site_url('maintenance/createProjects')?>" method="POST" data-parsley-validate class="form-horizontal">
    <input type="hidden" name="token" value="<?=$token?>">
        <div class="panel panel-flat">
            <div class="panel-body">
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Project Name:</label>
                    <div class="col-lg-9">
                        <input type="text" name="project_name" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Engineer:</label>
                    <div class="col-lg-9">
                        <select name="accounts_id" class="form-control">
                            <?php foreach($query as $row) { ?> 
                                <option value="<?=encode($row['accounts_id'])?>"><?=$row['name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Project Type:</label>
                    <div class="col-lg-9">
                        <input type="text" name="project_type" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Cost Estimate:</label>
                    <div class="col-lg-9">
                        <input type="number" name="cost_estimate" class="form-control"  required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Address:</label>
                    <div class="col-lg-9">
                        <input type="text" name="address" class="form-control" required>
                    </div>
                </div>


                <div class="text-right">
                    <a href="<?=site_url('project')?>" class="btn btn-primary"><i class="icon-arrow-left13 position-left"></i> Back</a>
                    <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    </form>
<!-- /simple panel -->