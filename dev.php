<style>
.bootbox, .bootbox-body{
	padding-top: 20px !important;
	display: block !important;
	line-height: 24px !important;
}
</style>
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<!-- Card stats -->
			<?php 
				$roleType = $this->session->userdata('roleType');
				
				if($roleType != 4){?>
			<div class="row">
				<div class="col-xl-4 col-md-6 desktopcardpadding">
					<div class="row">
						<div class="col-xl-12 col-md-12">
							<div class="card bg-default" style="background: white !important;">
								<div class="card-header bg-transparent">
									<div class="row align-items-center">
										<div class="col">
											<i style="cursor:pointer" class="fas fa-chevron-left" id="p_arrow_pre" onclick="p_nextPrev('prv')" aria-hidden="true"></i>
											<span id="ptext" style="font-size:14px;font-weight:bold;margin-left: 23px;" class="align-items-center"> </span>
											<span style="float: right;cursor:pointer,font-color:white" id="p_arrow_next"><i style="cursor:pointer" class="fas fa-chevron-right" onclick="p_nextPrev('next')" aria-hidden="true"></i></span>
										</div>
									</div>
								</div>
								<div class="card-body">
									<!-- Chart -->
									<div class="chart"  style="height: 233px">
										<!-- Chart wrapper -->
										<canvas id="pie-chart"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-8 col-md-6">
					<div class="row">
						<div class="col-xl-4 col-md-6 desktopcardpadding">
							<div class="card card-stats">
								<!-- Card body -->
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h6 class="card-title text-uppercase text-muted mb-0">Total Records</h6>
											<span class="h4 font-weight-bold mb-0"><?=$headingReport->file_count?></span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-red text-white rounded-circle shadow">
												<i class="fas fa-book text-active"></i>
											</div>
										</div>
									</div>
									<p class="mt-3 mb-0 text-sm">
										<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?=$filterReport->file_count?></span><br/>
										<span class="text-nowrap">
										<?php if(isset($setting->filter) && $setting->filter=="1"){ echo 'Since last year';}?>
										<?php if((isset($setting->filter) && $setting->filter=="2") || empty($setting)){ echo 'Since last month';}?>
										<?php if(isset($setting->filter) && $setting->filter=="3"){ echo 'Since last week';}?>
										<?php if(isset($setting->filter) && $setting->filter=="4"){ echo 'Today';}?>
										</span>
									</p>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-6 desktopcardpadding">
							<div class="card card-stats">
								<!-- Card body -->
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h6 class="card-title text-uppercase text-muted mb-0">Total Pages</h6>
											<span class="h4 font-weight-bold mb-0"><?=$headingReport->digital_number_of_page?></span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-blue text-white rounded-circle shadow">
												<i class="fas fa-file text-active"></i>
											</div>
										</div>
									</div>
									<p class="mt-3 mb-0 text-sm">
										<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?=$filterReport->digital_number_of_page?></span><br/>
										<span class="text-nowrap">
										<?php if(isset($setting->filter) && $setting->filter=="1"){ echo 'Since last year';}?>
										<?php if((isset($setting->filter) && $setting->filter=="2") || empty($setting)){ echo 'Since last month';}?>
										<?php if(isset($setting->filter) && $setting->filter=="3"){ echo 'Since last week';}?>
										<?php if(isset($setting->filter) && $setting->filter=="4"){ echo 'Today';}?>
										</span>
									</p>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-6 desktopcardpadding">
							<div class="card card-stats">
								<!-- Card body -->
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h6 class="card-title text-uppercase text-muted mb-0">Memory Size</h6>
											<span class="h4 font-weight-bold mb-0"><?=$headingReport->MemoryUsed?></span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-green text-white rounded-circle shadow">
												<i class="fas fa-database text-active"></i>
											</div>
										</div>
									</div>
									<p class="mt-3 mb-0 text-sm">
										<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?=$filterReport->MemoryUsed?></span><br/>
										<span class="text-nowrap">
										<?php if(isset($setting->filter) && $setting->filter=="1"){ echo 'Since last year';}?>
										<?php if((isset($setting->filter) && $setting->filter=="2") || empty($setting)){ echo 'Since last month';}?>
										<?php if(isset($setting->filter) && $setting->filter=="3"){ echo 'Since last week';}?>
										<?php if(isset($setting->filter) && $setting->filter=="4"){ echo 'Today';}?>
										</span>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-4 col-md-6 desktopcardpadding">
							<div class="card card-stats">
								<!-- Card body -->
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h6 class="card-title text-uppercase text-muted mb-0">Records Shared</h6>
											<span class="h4 font-weight-bold mb-0"><?=$headingReport->sharedDocuments?></span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
												<i class="fas fa-share-alt text-active"></i>
											</div>
										</div>
									</div>
									<p class="mt-3 mb-0 text-sm">
										<span class="text-success mr-2" title="Withdrawal"><i class="fa fa-arrow-up"></i> <?=$filterReport->sharedDocuments?></span><br/>
										<span class="text-nowrap">
										<?php if(isset($setting->filter) && $setting->filter=="1"){ echo 'Since last year';}?>
										<?php if((isset($setting->filter) && $setting->filter=="2") || empty($setting)){ echo 'Since last month';}?>
										<?php if(isset($setting->filter) && $setting->filter=="3"){ echo 'Since last week';}?>
										<?php if(isset($setting->filter) && $setting->filter=="4"){ echo 'Today';}?>
										</span>
									</p>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-6 desktopcardpadding">
							<div class="card card-stats">
								<!-- Card body -->
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h6 class="card-title text-uppercase text-muted mb-0">Records Assigned</h6>
											<span class="h4 font-weight-bold mb-0"><?=$headingReport->assignDocuments?></span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-orange text-white rounded-circle shadow">
												<i class="fas fa-share text-active"></i>
											</div>
										</div>
									</div>
									<p class="mt-3 mb-0 text-sm">
										<span class="text-success mr-2" title="Withdrawal"><i class="fa fa-arrow-up"></i> <?=$filterReport->assignDocuments?></span><br/>
										<span class="text-nowrap">
										<?php if(isset($setting->filter) && $setting->filter=="1"){ echo 'Since last year';}?>
										<?php if((isset($setting->filter) && $setting->filter=="2") || empty($setting)){ echo 'Since last month';}?>
										<?php if(isset($setting->filter) && $setting->filter=="3"){ echo 'Since last week';}?>
										<?php if(isset($setting->filter) && $setting->filter=="4"){ echo 'Today';}?>
										</span>
									</p>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-6 desktopcardpadding">
							<div class="card card-stats">
								<!-- Card body -->
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h6 class="card-title text-uppercase text-muted mb-0">Records Issued</h6>
											<span class="h4 font-weight-bold mb-0"><?=$headingReport->issuedDocuments?></span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-info text-white rounded-circle shadow">
												<i class="fas fa-book text-active"></i>
											</div>
										</div>
									</div>
									<p class="mt-3 mb-0 text-sm">
										<span class="text-danger mr-2" title="Withdrawal"><i class="fa fa-arrow-up"></i> <?=$filterReport->issuedDocumentsWithdraw?></span>
										<span class="text-success mr-2"  title="Return"><i class="fa fa-arrow-down"></i> <?=$filterReport->issuedDocumentsReturn?></span><br/>
										<span class="text-nowrap">
										<?php if(isset($setting->filter) && $setting->filter=="1"){ echo 'Since last year';}?>
										<?php if((isset($setting->filter) && $setting->filter=="2") || empty($setting)){ echo 'Since last month';}?>
										<?php if(isset($setting->filter) && $setting->filter=="3"){ echo 'Since last week';}?>
										<?php if(isset($setting->filter) && $setting->filter=="4"){ echo 'Today';}?>
										</span>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
</div>
<input type="hidden" id="upsertPermissionInward" value="<?=hasRight('Inward.Upsert')?>">
<input type="hidden" id="deletePermissionInward" value="<?=hasRight('Inward.Delete')?>">
<input type="hidden" id="upsertPermissionOutward" value="<?=hasRight('Outward.Upsert')?>">
<input type="hidden" id="deletePermissionOutward" value="<?=hasRight('Outward.Delete')?>">
         
<div class="container-fluid mt--6">
	<?php  if($roleType != 4){?> 
	<div class="row">
		<div class="col-xl-8 desktopcardpadding">
			<div class="card bg-default">
				<div class="card-header bg-transparent">
					<div class="row align-items-center">
						<div class="col">
							<h5 class="h3 text-white mb-0">Document Actions</h5>
						</div>
						<div class="col">
							<ul class="nav nav-pills justify-content-end">
								<li class="nav-item mr-2 mr-md-0">
									<a href="javascript:void(0)"  onClick="setType(1)" class="nav-link py-2 px-3 active" data-toggle="tab">
									<span class="d-none d-md-block">Month</span>
									<span class="d-md-none">M</span>
									</a>
								</li>
								<li class="nav-item" data-toggle="chart">
									<a href="javascript:void(0)"  onClick="setType(2)" class="nav-link py-2 px-3" data-toggle="tab">
									<span class="d-none d-md-block">Week</span>
									<span class="d-md-none">W</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<i style="cursor:pointer" style="font-color:white" class="fas fa-chevron-left" onClick="l_nextPrev('prv')" aria-hidden="true"></i>
							<span style="float: right;cursor:pointer,font-color:white" id="a_arrow"><i  style="cursor:pointer" class="fas fa-chevron-right" onClick="l_nextPrev('next')"  aria-hidden="true"></i></span>
						</div>
					</div>
				</div>
				<div class="card-body">
					<!-- Chart -->
					<div class="chart">
						<!-- Chart wrapper -->
						<canvas id="chart-sales-dark" class="chart-canvas"></canvas>
					</div>
					<div class="text-center" id="a_year" style="font-size:14px;font-weight:bold">2021</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 desktopcardpadding">
			<div class="card">
				<div class="card-header bg-transparent">
					<div class="row align-items-center">
						<div class="col">
							<h5 class="h3 mb-0">Document & Page Count</h5>
							<div>
								<i style="cursor:pointer" class="fas fa-chevron-left" onClick="d_nextPrev('prv')" aria-hidden="true"></i>
								<span style="float: right;cursor:pointer" id="c_arrow"><i class="fas fa-chevron-right" onClick="d_nextPrev('next')"  aria-hidden="true"></i></span>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body" style="height: 395px;">
					<!-- Chart -->
					<div class="chart">
						<canvas id="dchart-bars" class="chart-canvas"></canvas>
						<div class="text-center" id="Years" style="font-size:14px;font-weight:bold"><b>2021<b></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row ">
		<div class="col-md-12 desktopcardpadding">
			<div class="nav-wrapper" style="padding:0.50rem">
				<ul class="nav nav-pills flex-column flex-md-row" id="tabs-icons-text" role="tablist">
					<li class="nav-item">
						<a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fas fa-share-alt text-success"></i>  Shared</a>
					</li>
					<li class="nav-item">
						<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-share text-success"></i>  Assigned</a>
					</li>
					<li class="nav-item">
						<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fas fa-book text-success"></i>  Issued</a>
					</li>
					<li class="nav-item">
						<a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false"><i class="fas fa-arrows-alt text-success"></i>  Inward/Outward</a>
					</li>
				</ul>
			</div>
			<?php } ?>
			<div class="card shadow">
				<div class="card-body">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
							<div class="card">
								<div class="card-header border-0">
									<div class="row align-items-center">
										<?php  if($roleType == 4){?>
										<div class="col">
											<h2 class="mb-0"> Shared Records</h2>
											<br>
										</div>
										<?php } ?>
										<?php if($roleType != 4){ ?>
										<div class="col text-left">
											<label class="custom-toggle">
											<input type="checkbox" class="default" id="shared">
											<span class="custom-toggle-slider rounded-circle" data-label-on="OUT" data-label-off="IN"></span></input>
											</label>
											<a  href="javascript:void(0);" class="btn btn-sm  btn-info " onClick="ExportToExcelShared();"> <i class="fas fa-file-excel"></i> Export To Excel</a>
										</div>
										<?php } ?>
									</div>
								</div>
								<div class="table-responsive">
									<table id="sharedgrid" class="table align-items-center table-flush">
										<thead class="thead-light">
											<tr>
												<th scope="col" data-column-id="flag"  data-identifier="true">Flag</th>
												<th scope="col" data-column-id="access_ID" data-visible="true" data-sort="access_ID">ID</th>
												<th scope="col" data-column-id="document_ID" data-sort="document_ID">Document ID</th>
												<th scope="col" data-column-id="withuser"  data-visible="false"  class="sort" data-sort="byuser">Shared With</th>
												<th scope="col" data-column-id="byuser"  data-visible="true"  class="sort" data-sort="byuser">Shared By</th>
												<th scope="col" data-column-id="physical_document_name" class="sort" data-sort="physical_document_name">Name</th>
												<th scope="col" data-column-id="master_document_number"  data-visible="false"  class="sort" data-sort="master_document_number">Number</th>
												<th scope="col" data-column-id="physical_document_status" data-visible="false" class="sort" data-sort="physical_document_status">Status</th>
												<th scope="col" data-column-id="physical_document_location" data-visible="false" class="sort" data-sort="physical_document_location">Location</th>
												<th scope="col" data-column-id="physical_document_number_of_pages"  data-visible="false"  data-visible="false" class="sort" data-sort="physical_document_number_of_pages">Pages</th>
												<th scope="col" data-column-id="MB" data-visible="false" class="sort" data-sort="document_size">Size</th>
												<th scope="col" data-column-id="department_name"  data-visible="false"  class="sort" data-sort="department_name">Department</th>
												<th scope="col" data-column-id="sub_department_name"  data-visible="false"  class="sort" data-sort="sub_department_name">Sub Department</th>
												<th scope="col" data-column-id="document_material_name" data-visible="false" class="sort" data-sort="document_material_name">Material</th>
												<th scope="col" data-column-id="document_category_name"  data-visible="false"  class="sort" data-sort="document_category_name">Category</th>
												<th scope="col" data-column-id="document_type_name" data-visible="false" class="sort" data-sort="document_type_name">Type</th>
												<th scope="col" data-column-id="document_shelflife" data-visible="false" class="sort" data-sort="document_shelflife">Shelflife</th>
												<th scope="col" data-column-id="physical_document_date" data-visible="false" class="sort" data-sort="physical_document_date">Physical document date</th>
												<th scope="col" data-column-id="created_date" data-visible="false" class="sort" data-sort="created_date">Document created date</th>
												<th scope="col" data-column-id="action_date" data-visible="false" class="sort" data-sort="action_date">Action date</th>
												<th scope="col" data-column-id="actions" data-formatter="actions" data-sortable="false" class="sort" data-sort="status">Actions</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
							<div class="card">
								<div class="card-header border-0">
									<div class="row align-items-center">
										<div class="col text-left">
											<label class="custom-toggle">
											<input type="checkbox" class="default" id="assigned">
											<span class="custom-toggle-slider rounded-circle" data-label-on="OUT" data-label-off="IN"></span></input>
											</label>
											<a href="javascript:void(0);" class="btn btn-sm  btn-info " onClick="ExportToExcelAssigned();"> <i class="fas fa-file-excel"></i> Export To Excel</a>
										</div>
									</div>
								</div>
								<div class="table-responsive">
									<table id="assignedgrid" class="table align-items-center table-flush">
										<thead class="thead-light">
											<tr>
												<th scope="col" data-column-id="flag"  data-identifier="true">Flag</th>
												<th scope="col" data-column-id="access_ID" data-visible="true"data-sort="access_ID">ID</th>
												<th scope="col" data-column-id="document_ID" data-sort="document_ID">Document ID</th>
												<th scope="col" data-column-id="byuser"  data-visible="true" class="sort" data-sort="byuser">Assigned by</th>
												<th scope="col" data-column-id="physical_document_name" class="sort" data-sort="physical_document_name">Name</th>
												<th scope="col" data-column-id="master_document_number"  data-visible="false"  class="sort" data-sort="master_document_number">Number</th>
												<th scope="col" data-column-id="physical_document_status" data-visible="false" class="sort" data-sort="physical_document_status">Status</th>
												<th scope="col" data-column-id="physical_document_location" data-visible="false" class="sort" data-sort="physical_document_location">Location</th>
												<th scope="col" data-column-id="physical_document_number_of_pages" data-visible="false" class="sort" data-sort="physical_document_number_of_pages">Pages</th>
												<th scope="col" data-column-id="MB" data-visible="false" class="sort" data-sort="document_size">Size</th>
												<th scope="col" data-column-id="department_name"   data-visible="false"  class="sort" data-sort="department_name">Department</th>
												<th scope="col" data-column-id="sub_department_name"   data-visible="false"  class="sort" data-sort="sub_department_name">Sub Department</th>
												<th scope="col" data-column-id="document_material_name" data-visible="false" class="sort" data-sort="document_material_name">Material</th>
												<th scope="col" data-column-id="document_category_name"  data-visible="false"  class="sort" data-sort="document_category_name">Category</th>
												<th scope="col" data-column-id="document_type_name" data-visible="false" class="sort" data-sort="document_type_name">Type</th>
												<th scope="col" data-column-id="document_shelflife" data-visible="false" class="sort" data-sort="document_shelflife">Shelflife</th>
												<th scope="col" data-column-id="physical_document_date" data-visible="false" class="sort" data-sort="physical_document_date">Physical document date</th>
												<th scope="col" data-column-id="created_date" data-visible="false" class="sort" data-sort="created_date">Document created date</th>
												<th scope="col" data-column-id="action_date" data-visible="false" class="sort" data-sort="action_date">Action date</th>
												<th scope="col" data-column-id="actions" data-formatter="actions" data-sortable="false" class="sort" data-sort="status">Actions</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
							<div class="card">
								<div class="card-header border-0">
									<div class="row align-items-center">
										<div class="text-left">
											<label class="custom-toggle">
											<input type="checkbox" class="default" id="issue">
											<span class="custom-toggle-slider rounded-circle" data-label-on="OUT" data-label-off="IN"></span></input>
											</label>
											<a href="javascript:void(0);" class="btn btn-sm  btn-success" onClick="BulkAccept();"> Bulk Accept</a>
											<a href="javascript:void(0);" class="btn btn-sm btn-danger" onClick="BulkDecline();"> Bulk Decline</a>
											<a href="javascript:void(0);" class="btn btn-sm btn-danger" onClick="BulkReturn();"> Bulk Retrun</a>
											<a href="javascript:void(0);" class="btn btn-sm  btn-info " onClick="ExportToExcelIssued();"> <i class="fas fa-file-excel"></i> Export To Excel</a>
										</div>
									</div>
								</div>
								<div class="table-responsive">
									<table id="issuedgrid" class="table align-items-center table-flush">
										<thead class="thead-light">
											<tr>
												<th scope="col" data-column-id="flag"  data-identifier="true">Flag</th>
												<th scope="col" data-column-id="access_ID" data-visible="true" data-type="numeric" data-sort="access_ID" data-identifier="true">ID</th>
												<th scope="col" data-column-id="document_ID" data-sort="document_ID">Document ID</th>
												<th scope="col" data-column-id="byuser"  data-visible="true"  class="sort" data-sort="byuser"> By User</th>
												<th scope="col" data-column-id="withuser"  data-visible="true"  class="sort" data-sort="withuser"> With User</th>
												<th scope="col" data-column-id="actionStatus"  data-visible="true"  class="sort" data-sort="actionStatus">Status</th>
												<th scope="col" data-column-id="physical_document_name" class="sort" data-sort="physical_document_name">Name</th>
												<th scope="col" data-column-id="master_document_number"  data-visible="false"  class="sort" data-sort="master_document_number">Number</th>
												<th scope="col" data-column-id="physical_document_status" data-visible="false" class="sort" data-sort="physical_document_status">Status</th>
												<th scope="col" data-column-id="physical_document_location" data-visible="false" class="sort" data-sort="physical_document_location">Location</th>
												<th scope="col" data-column-id="physical_document_number_of_pages"  data-visible="false"  data-visible="false" class="sort" data-sort="physical_document_number_of_pages">Pages</th>
												<th scope="col" data-column-id="MB" data-visible="false" class="sort" data-sort="document_size">Size</th>
												<th scope="col" data-column-id="department_name"  data-visible="false"  class="sort" data-sort="department_name">Department</th>
												<th scope="col" data-column-id="sub_department_name"  data-visible="false"  class="sort" data-sort="sub_department_name">Sub Department</th>
												<th scope="col" data-column-id="document_material_name" data-visible="false" class="sort" data-sort="document_material_name">Material</th>
												<th scope="col" data-column-id="document_category_name"  data-visible="false"  class="sort" data-sort="document_category_name">Category</th>
												<th scope="col" data-column-id="document_type_name" data-visible="false" class="sort" data-sort="document_type_name">Type</th>
												<th scope="col" data-column-id="document_shelflife" data-visible="false" class="sort" data-sort="document_shelflife">Shelflife</th>
												<th scope="col" data-column-id="physical_document_date" data-visible="false" class="sort" data-sort="physical_document_date">Physical document date</th>
												<th scope="col" data-column-id="created_date" data-visible="false" class="sort" data-sort="created_date">Document created date</th>
												<th scope="col" data-column-id="action_date" data-visible="false" class="sort" data-sort="action_date">Action date</th>
												<th scope="col" data-column-id="actions" data-formatter="actions" data-sortable="false" class="sort" data-sort="status">Actions</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
            <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
							<div class="card">
								<div class="card-header border-0">
									<div class="row align-items-center">
										<div class="text-left">
											<label class="custom-toggle">
											<input type="checkbox" class="default" id="inout">
											<span class="custom-toggle-slider rounded-circle" data-label-on="OUT" data-label-off="IN"></span></input>
											</label>
											<?php if(hasRight('Inward-Outward.View')): ?>
                      							<label><input type="checkbox" name="isAll" id="isAll"> Show all Inward/Outward?</label>
											<?php endif; ?>  

										</div>
									</div>
								</div>
								<div class="table-responsive">
								<table id="InOutWardgrid" class="table align-items-center table-flush">
									<thead class="thead-light">
										<tr>										
											<th scope="col" data-column-id="flag"  data-identifier="true">Flag</th>
											<th scope="col" data-column-id="ID" class="sort" data-type="numeric" data-sort="document_ID" data-identifier="true"> ID</th>
											<th scope="col" data-column-id="type" class="sort" data-sort="access_status">Type</th>
											<th scope="col" data-column-id="IO_number" class="sort" data-sort="physical_document_name">Number</th>
											<th scope="col" data-column-id="IO__document_number" data-visible="false" class="sort" data-sort="master_document_number">Document Number</th>
											<th scope="col" data-column-id="IO__document_name" class="sort" data-sort="physical_document_name">Document Name</th>
											<th scope="col" data-column-id="submit_mode" class="sort" data-sort="p_page_ID">Submit mode</th>
											<th scope="col" data-column-id="IO_date" data-visible="false" class="sort" data-sort="p_tag1">Date</th>
											<th scope="col" data-column-id="file_name" data-visible="false" class="sort" data-sort="p_tag2">File Name</th>
											<th scope="col" data-column-id="category" data-visible="false" class="sort" data-sort="p_page_type">Category</th>
											<th scope="col" data-column-id="subject" data-visible="false" class="sort" data-sort="p_page_date">Subject</th>
											<th scope="col" data-column-id="priority" data-visible="true" class="sort" data-sort="priority">Priority</th>
											<th scope="col" data-column-id="last_status" data-visible="true" class="sort" data-sort="last_status">Current Status</th>
											<th scope="col" data-column-id="username" data-visible="false" class="sort" data-sort="username">User</th>                                    
											<th scope="col" data-column-id="applicant_category" data-visible="false" class="sort" data-sort="digital_document_number_of_pages">Applicant / Recipient  category</th>
											<th scope="col" data-column-id="applicant_name" data-visible="false" class="sort" data-sort="document_size">Applicant / Recipient Name</th>
											<th scope="col" data-column-id="applicant_mobile" data-visible="false" class="sort" data-sort="page_size">Mobile</th>
											<th scope="col" data-column-id="applicant_department" class="sort" data-visible="false" data-sort="department_name">Department</th>
											<th scope="col" data-column-id="applicant_Branch" class="sort" data-visible="false" data-sort="sub_department_name">Branch</th>
											<th scope="col" data-column-id="applicant_address" data-visible="false" class="sort" data-sort="document_material_name">Address</th>
											<th scope="col" data-column-id="applicant_designation" class="sort" data-visible="false" data-sort="document_category_name">Designation</th>
											<th scope="col" data-column-id="linkedDocuments" class="sort" data-visible="true" data-sort="linkedDocuments">linkedDocuments</th>
											<th scope="col" data-column-id="actions" data-formatter="actions" data-sortable="false" class="sort">Actions</th>
										</tr>
									</thead>
								</table>                
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br><br><br><br>

<div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="height: 10px;">
                <h5 class="modal-title text-muted" id="exampleModalLabel">History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
			</div>
        </div>
    </div>
</div>
<script src="<?=SITE_ASSETS?>js/site/document_list.js"></script>