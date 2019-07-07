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
				<a href="#" class="media-left"><img src="<?=base_url()?>assets/images/image.png" class="img-circle img-sm" alt=""></a>
				<div class="media-body">
					<span class="media-heading text-semibold">Victoria Baker</span>
					<div class="text-size-mini text-muted">
						<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
					</div>
				</div>

				<div class="media-right media-middle">
					<ul class="icons-list">
						<li>
							<a href="#"><i class="icon-cog3"></i></a>
						</li>
					</ul>
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
						<?php foreach($assets_type as $row){  ?>
							<li class="<?=$title == $row['assets_name'] ? 'active' : ''?>"><a href="<?=site_url('assets/view/'.encode($row['assets_type_id']))?>"><?=$row['assets_name']?></a></li>
						<?php } ?>
					</ul>
				</li>

				<li class="<?=$dropdown == 'vendors' ? 'active' : '' ?>">
					<a href="#"><i class="icon-folder6"></i> <span>Vendors</span></a>
					<ul>
						<?php foreach($allVendors as $row){ ?>
							<li class="<?=$title == 'vendor-'.$row['vendors_id'] ? 'active' : ''?>"><a href="<?=site_url('vendors/view/'.encode($row['vendors_id']))?>"><?=$row['name']?></a></li>
						<?php } ?>
					</ul>
				</li>

				<li class="<?=$title == 'personnel' ? 'active' : '' ?>"><a href="<?=site_url('personnel')?>"><i class="icon-collaboration"></i><span>Personnel</span></a></li>

				<li class="<?=$title == 'reports' ? 'active' : '' ?>"><a href="<?=site_url('reports')?>"><i class="icon-graph"></i><span>Report</span></a></li>
				<!-- /main -->
			</ul>
		</div>
	</div>
	<!-- /main navigation -->

</div>
</div>
<!-- /main sidebar -->
