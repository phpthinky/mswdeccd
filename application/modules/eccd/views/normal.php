<main class="content-wrapper">

	<section class="content-header">
		<a class="btn btn-md btn-primary" href="<?=site_url('eccd/listallnormal')?>">Normal</a>
		<a class="btn btn-md btn-default"  href="<?=site_url('eccd/listallmalnourish')?>">Malnourish</a>
		<a class="btn btn-md btn-default"  href="<?=site_url('eccd/listallobesed')?>">Obesed</a>
	</section>
	<section class="header">
	<center>
			<div class="row">
				<div class="col-md-12">
    <label>MSWD ECCD RECORDS</label>
					
				</div>
				<div class="col-md-12">
    <label>LIST OF PUPILS WITH NORMAL NUTRITIONS</label>
					
				</div>
				<div class="col-md-12">
			  <label>Date printed: <?=date('M d, Y')?></label>
					
				</div>

			</div>
	</center>
	</section>
	<section class="main-content">
		<div class="card">
			<div class="card-body">
				
	<div class="table-responsive">
		<table class="table table-bordered" id="list-normal">
			<thead>
				

                    <th></th>
                    <th>#</th>
                    <th>Firt Name</th>
                    <th>Mi</th>
                    <th>Last Name</th>
                    <th>Sex</th>
                    <th>Birthday</th>
                    <th>Age in Months</th>
                    <th>Sector</th>
                    <th>Deworming Date</th>
                    <th>Vit. A Supp. Date</th>
                    <th>Date of Weighing</th>
                    <th>WFA</th>
                    <th>HFA</th>
                    <th>WFH</th>

			</thead>	
			<tbody>
				<?php if (!empty($list_normal)): ?>
					<?php $i=1; foreach ($list_normal as $key => $value): ?>
						<tr>
							<td></td>
							<td><?=$i++?></td>
							<td><?=$value->fName?></td>
							<td><?=$value->mName?></td>
							<td><?=$value->lName?></td>
							<td><?=$value->gender?></td>
							<td><?=$value->birthDate?></td>
							<td><?=$value->age?></td>
							<td><?=$value->sector?></td>
							<td><?=$value->deworming?></td>
							<td><?=$value->vit_a?></td>
							<td><?=$value->date_weighing?></td>
							<td><?=$value->wfa?></td>
							<td><?=$value->hfa?></td>
							<td><?=$value->wfh?></td>
						</tr>
					<?php endforeach ?>
				<?php endif ?>
			</tbody>
		</table>
	</div>

			</div>
			<div class="card-footer">
				
	<div class="row">
		<div class="col-md-2">
			<button class="btn btn-md btn-outline-success" onclick="window:print()">Print</button>
		</div>
	</div>
			</div>
		</div>
	</section>
</main>