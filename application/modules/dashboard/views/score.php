<main class="content-wrapper">

<section class="main-content">
	<div class="card">
		<div class="card-header">List of students</div>
		<div class="card-body">
			<div class="table-responsive">
				
			<table class="table  table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Student name</th>
						<th>Standard Score</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>

					<?php if (!empty($result)): ?>
						<?php foreach ($result as $key => $value): ?>
							<tr>
								<td><?=$i++;?></td>
								<td><?=$value->student_name?></td>
								<td><?=$value->score?></td>
							</tr>
						<?php endforeach ?>
					<?php endif ?>
				</tbody>
			</table>

			</div>
			<div class="row">
				<button class="btn btn-outline-success" id="btn-print-score">Print</button>
			</div>
		</div>
	</div>
</section>
</main>