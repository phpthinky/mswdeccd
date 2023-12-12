<main class="content-wrapper">
	<style type="text/css">
		.reports-header-info{
			font-size: 12px;
		}
		.reports-table-text{
			font-size: 11px;
		}
	</style>
	<section class="content-header">
		

	</section>

	<section class="content-body">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<center>
						
					<label class="text-title">SUPPLEMENTARY FEEDING PROGRAM</label><br>
					<label class="text-title">TALLY OF BENEFICIARIES</label>
					</center>
				</div>
				<div class="card-body">
					<div class="row reports-header-info">
						<div class="col-md-3">
							<span>PROVINCE:</span> <span>OCCIDENTAL MINDORO</span><br>
							<span>MUNICIPALITY:</span> <span>SABLAYAN</span>
						</div>
						<div class="col-md-3">
							
							<span>TOTAL NUMBER SNP SITES:</span> <span>0</span><br>
							<span>TOTAL NUMBER OF SNP CHILDREN:</span> <span>0</span>
						</div>
						<div class="col-md-3">
							
							<span>TOTAL NUMBER OF CDC:</span> <span>0</span><br>
							<span>TOTAL NUMBER OF CDC CHILDREN:</span> <span>0</span>
						</div>
						<div class="col-md-3">
							
							<span>TOTAL NUMBER OF BOYS:</span> <span>0</span><br>
							<span>TOTAL NUMBERR OF GIRLS:</span> <span>0</span>
						</div>
					</div>
					<hr>
					<div class="table-responsive">
						<table class="table table-bordered" id="reports-feeding">
							<thead>
								
							<tr>
								<th rowspan="2">No.</th>
								<th rowspan="2">Barangay</th>
								<th rowspan="2">Name of CDC/SNP</th>
								<th rowspan="2">Address</th>
								<th colspan="3">Number of CDC/SNP Children</th>
								<th rowspan="2">Name of CDC Worker or SNP Worker</th>
								<th rowspan="2">Contact No.</th>
							</tr>
							<tr>
								<th>Boys</th>
								<th>Girls</th>
								<th>Total</th>
							</tr>
							</thead>
							<tbody>
								<?php if (!empty($list_feeding)): ?>
									<?php $i=1; ?>
									<?php foreach ($list_feeding as $key => $feeding): ?>
										<tr>
											<td><?=$i?></td>
											<td><?=$feeding->barangay?></td>
											<td><?=$feeding->center_name?></td>
											<td><?=$feeding->center_address?></td>
											<td><?=$feeding->total_students_boys?></td>
											<td><?=$feeding->total_students_girls?></td>
											<td><?=$feeding->total_students?></td>
											<td><?=$feeding->worker_name?></td>
											<td><?=$feeding->contact_number?></td>
										</tr>
										<?php $i++; ?>
									<?php endforeach ?>
								<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="no-print">
		<div class="container-fluid">
			
		<div class="row form-group buttons">
			<div class="col-md-6">
			<button class="btn btn-primary btn-md" id="btn-print">Print</button>
			<button class="btn btn-success btn-md" id="btn-excel">Excel</button>
			<button class="btn btn-default btn-md" id="btn-filter">Filter</button></div>
		</div>
		<div id="filter-report" class="d-none">
			<div class="row form-group">
				<label class="col-md-2">School year</label>
				<div class="col-md-8">
					<select class="form-control" id="filter-school-year">
						<option value="0">Default</option>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-md-2">Date of feeding</label>
				<div class="col-md-8">
					<select id="filter-feeding-date" class="form-control">
						<option value="0">Default</option>
					</select>
				</div>
			</div>

		</div>
		</div>
	</section>
</main>