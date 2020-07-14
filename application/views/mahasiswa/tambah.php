<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Form Tambah Data Mahasiswa</div>
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" name="nama" id="nama" class="form-control" autocomplete="off">
							<small class="text-danger"><?= form_error('nama') ?></small>
						</div>
						<div class="form-group">
							<label for="nrp">Nrp</label>
							<input type="text" name="nrp" id="nrp" class="form-control" autocomplete="off">
							<small class="text-danger"><?= form_error('nrp') ?></small>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" class="form-control" autocomplete="off">
							<small class="text-danger"><?= form_error('email') ?></small>
						</div>
						<div class="form-group">
							<label for="jurusan">Jurusan</label>
							<select class="form-control" name="jurusan" id="jurusan">
								<option value="">-- Pilih Jurusan --</option>
								<option value="Teknik Informatika">Teknik Informatika</option>
								<option value="Teknik Industri">Teknik Industri</option>
								<option value="Teknik Pangan">Teknik Pangan</option>
								<option value="Teknik Mesin">Teknik Mesin</option>
								<option value="Teknik Planologi">Teknik Planologi</option>
								<option value="Teknik Lingkungan">Teknik Lingkungan</option>
							</select>
							<small class="text-danger"><?= form_error('jurusan') ?></small>
						</div>
						<div class="form-group float-right">
							<a href="<?= base_url('mahasiswa'); ?>" class="btn btn-danger">Kembali</a>
							<button type="submit" name="tambah" class="btn btn-primary">Tambah Data Mahasiswa</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>