<?php extract($data);?>
<!-- Page container -->
<div class="page-container">

<!-- Page content -->
<div class="page-content">

<!-- Main sidebar -->
<div class="sidebar sidebar-main">
<div class="sidebar-content">

	<!-- User menu -->
	<div class="sidebar-user">
		<div class="category-content">
			<div class="media">
				<div class="media-body">
					<span class="media-heading text-semibold"><?=$user[0]['name']?></span>
					<div class="text-size-mini text-muted">
						<?=$user[0]['role'] == 0 ? '<span class="label label-danger">Super Admin</span>' : '<span class="label label-primary">Admin</span>';?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /user menu -->


	<!-- Main navigation -->
	<div class="sidebar-category sidebar-category-visible">
		<div class="category-content no-padding">
			<ul class="navigation navigation-main navigation-accordion">
				<!-- Main -->
				<li class="<?=$title == 'dashboard' ? 'active' : '' ?>"><a href="<?=site_url('dashboard')?>"><i class="icon-home2"></i><span>Dashboard</span></a></li>

				<li class="<?=$dropdown == 'assets' ? 'active' : '' ?>">
					<a href="#"><i class="icon-stack"></i> <span>Assets</span></a>
					<ul>
						<?php if(empty($assets_type)) { ?>
								<li class=""><a href="#">No Record Found</a></li>
						<?php } else { ?>
							<?php foreach($assets_type as $row){  ?>
								<li class="<?=$title == $row['assets_name'] ? 'active' : ''?>"><a href="<?=site_url('assets/view/'.encode($row['assets_type_id']))?>"><?=$row['assets_name']?></a></li>
							<?php } ?>
						<?php } ?>
					</ul>
				</li>

				<li class="<?=$dropdown == 'vendors' ? 'active' : '' ?>">
					<a href="#"><i class="icon-folder6"></i> <span>Vendors</span></a>
					<ul>
						<?php if(empty($allVendors)) { ?> 
							<li class=""><a href="#">No Record Found</a></li>
						<?php } else { ?>
							<?php foreach($allVendors as $row){ ?>
								<li class="<?=$title == 'vendor-'.$row['vendors_id'] ? 'active' : ''?>"><a href="<?=site_url('vendors/view/'.encode($row['vendors_id']))?>"><?=$row['name']?></a></li>
							<?php } ?>
						<?php } ?>
					</ul>
				</li>
				<li class="<?=$title == 'reports' ? 'active' : '' ?>"><a href="<?=site_url('reports')?>"><i class="icon-graph"></i><span>Report</span></a></li>

				<?php if($_SESSION['role'] == 1) { ?>

				<?php } else { ?> 
					<li class="<?=$title == 'personnel' ? 'active' : '' ?>"><a href="<?=site_url('personnel')?>"><i class="icon-collaboration"></i><span>Personnel</span></a></li>
					<li class="<?=$title == 'settings' ? 'active' : '' ?>"><a href="<?=site_url('settings')?>"><i class="icon-gear"></i><span>Settings</span></a></li>
				<?php } ?>
				
				<!-- /main -->
			</ul>
		</div>
	</div>
	<!-- /main navigation -->

</div>
</div>
<!-- /main sidebar -->
