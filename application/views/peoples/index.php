<div class="container">
	<h3 class="mt-3">List Of Peoples</h3>
	<div class="row">
		<div class="col-md-5">
			<form action="<?= base_url('peoples'); ?>" method="post">
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Search People..." name="keyword" autocomplete="off" autofocus>
					<div class="input-group-append">
						<input class="btn btn-primary" type="submit" name="submit">
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<h5>Results : <?= $total_rows; ?></h5>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (empty($peoples)): ?>
						<tr>
							<td colspan="5">
								<div class="alert alert-warning text-center" role="alert">Data Not Found!</div>
							</td>
						</tr>
					<?php endif ?>
					<?php foreach ($peoples as $people): ?>
						<tr>
							<th><?= ++$start; ?></th>
							<td><?= $people['name']; ?></td>
							<td><?= $people['email']; ?></td>
							<td>
								<a href="" class="badge badge-pill badge-primary">detail</a>
								<a href="" class="badge badge-pill badge-success">ubah</a>
								<a href="" class="badge badge-pill badge-danger">hapus</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?= $this->pagination->create_links(); ?>
		</div>
	</div>
</div>