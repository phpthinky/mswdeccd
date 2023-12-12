<main class="content-wrapper">
	<section class="content-header">
			<label class="header-title text-title">Address Management</label>
		
	</section>
	<section class="content">
		<div class="container-fluid">
			<ul class="nav nav-pills">
				<li class="nav-item"><a class="nav-link active" href="#barangay" data-toggle="tab">Barangay</a></li>
				<li class="nav-item"><a class="nav-link"  href="#add_barangay" data-toggle="tab">Add</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="barangay">
							
					<span class="barangay">
						List of Barangay
					</span>
					<hr>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Name of Barangay</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty($list_all)): ?>
								<?php foreach ($list_all as $key => $value): ?>
									<tr>
										<td><?=$value->barangay_name?></td>
										<td><button class="btn btn-sm btn-outline-primary" data-id="<?=$value->barangay_id?>"><i class="fas fas-edit"></i></button> <button class="btn btn-sm btn-outline-danger" data-id="<?=$value->barangay_id?>"><i class="fas fas-trash"></i></button></td>
									</tr>
								<?php endforeach ?>
							<?php endif ?>
						</tbody>
					</table>
				</div>

				<div class="tab-pane" id="add_barangay">
							
					<span class="">
						Add new barangay
					</span>
				</div>
			</div>
		</div>

	</section>
</main>