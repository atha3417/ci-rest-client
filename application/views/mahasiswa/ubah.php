<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Form Ubah Data Mahasiswa</div>
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">
							<input type="text" name="nama" id="nama" class="form-control" autocomplete="off" value="<?= $mahasiswa['nama']; ?>">
							<small class="text-danger"><?= form_error('nama') ?></small>
						</div>
						<div class="form-group">
							<label for="nrp">Nrp</label>
							<input type="text" name="nrp" id="nrp" class="form-control" autocomplete="off" value="<?= $mahasiswa['nrp']; ?>">
							<small class="text-danger"><?= form_error('nrp') ?></small>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" class="form-control" autocomplete="off" value="<?= $mahasiswa['email']; ?>">
							<small class="text-danger"><?= form_error('email') ?></small>
						</div>
						<div class="form-group">
							<label for="jurusan">Jurusan</label>
							<select class="form-control" name="jurusan" id="jurusan">
								<?php foreach ($jurusan as $j): ?>
									<?php if ($j == $mahasiswa['jurusan']): ?>
										<option value="<?= $j; ?>" selected><?= $j; ?></option>
									<?php else : ?>
										<option value="<?= $j; ?>"><?= $j; ?></option>
									<?php endif ?>
								<?php endforeach ?>
							</select>
							<small class="text-danger"><?= form_error('jurusan') ?></small>
						</div>
						<div class="form-group float-right">
							<a href="<?= base_url('mahasiswa'); ?>" class="btn btn-danger">Kembali</a>
							<button type="submit" name="ubah" class="btn btn-primary">Ubah Data Mahasiswa</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>