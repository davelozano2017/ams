<?php extract($data);?>

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"><?=$query[0]['project_name']?></span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
            <li>Personnel</li>
            <li>Edit</li>
            <li class="active"><?=$query[0]['project_name']?></li>
        </ul>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left ">'.$_SESSION['message'].'</div>'; unset($_SESSION['message']) ?>  
    <div class="row">
        <div class="col-md-5">
            <form action="<?=site_url('maintenance/updateProjects')?>" method="POST" data-parsley-validate class="form-horizontal">
            <input type="hidden" name="token" value="<?=$token?>">
            <input type="hidden" name="projects_id" class="form-control" value="<?=encode($query[0]['projects_id'])?>" required>
            <div class="panel panel-flat">
                <div class="panel-body">
                    
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Project Name:</label>
                        <div class="col-lg-9">
                            <input type="text" name="project_name" value="<?=$query[0]['project_name']?>" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Engineer:</label>
                        <div class="col-lg-9">
                            <select name="accounts_id" class="form-control">
                                    <option value="<?=encode($query[0]['accounts_id'])?>" selected><?=$query[0]['name']?></option>
                                <?php foreach($personnels as $row) { ?> 
                                    <option value="<?=encode($row['accounts_id'])?>"><?=$row['name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Project Type:</label>
                        <div class="col-lg-9">
                            <input type="text" name="project_type" value="<?=$query[0]['project_type']?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Cost Estimate:</label>
                        <div class="col-lg-9">
                            <input type="number" name="cost_estimate" value="<?=$query[0]['cost_estimate']?>" class="form-control"  required>
                            <input type="hidden" name="orig_cost_estimate" value="<?=$query[0]['cost_estimate']?>" class="form-control"  required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Address:</label>
                        <div class="col-lg-9">
                            <input type="text" name="address" value="<?=$query[0]['address']?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="<?=site_url('personnel')?>" class="btn btn-primary"><i class="icon-arrow-left13 position-left"></i> Back</a>
                        <button type="submit" class="btn btn-primary">Save Changes <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <div class="col-md-7">
            <div class="panel panel-flat">
            <div class="panel-body">

                
                <form action="<?=site_url('maintenance/createNote')?>" method="POST" data-parsley-validate class="form-horizontal">
                    <input type="hidden" name="token" value="<?=$token?>">
                    <input type="hidden" name="projects_id" class="form-control" value="<?=encode($query[0]['projects_id'])?>" required>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Notes:</label>
                        <div class="col-lg-9">
                            <input type="text" name="note" class="form-control" required>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Create <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
                
                <?php if(empty($projectTimeline)) { ?> 
                    <br>
                <div class="form-group">
                    <div class="alert alert-danger">No record found.</div>
                </div>
                <?php } else { ?>
                    <ul class="list-feed media-list">
                        <?php foreach($projectTimeline as $rows){ ?>
                            <li class="media">
                                <div class="media-body">
                                    <?=$rows['note']?>
                                </div>
                                <div class="media-right">
                                    <ul class="icons-list icons-list-extended text-nowrap">													
                                        <li>
                                            <a href="#" style="margin-top:5px"><?=date('F d, Y h:i A',strtotime($rows['created_at']))?></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- /simple panel -->