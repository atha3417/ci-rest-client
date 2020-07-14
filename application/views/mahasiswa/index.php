<div class="container">
	<?php if ($this->session->flashdata('pesan')): ?>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Mahasiswa <strong>Berhasil</strong> <?= $this->session->flashdata('pesan'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	<?php endif ?>
	<div class="row mt-3">
		<div class="col-md-6">
			<a href="<?= base_url('mahasiswa/tambah'); ?>" class="btn btn-primary">Tambah Data Mahasiswa</a>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<form action="" method="post">
				<div class="input-group">
					<input type="text" class="form-control" name="keyword" placeholder="Cari Data Mahasiswa..." autocomplete="off">
					<div class="input-group-append">
						<button type="submit" class="btn btn-info" type="button">Cari</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<h3>Daftar Mahasiswa</h3>
			<?php if (empty($mahasiswa)): ?>
				<div class="alert alert-danger" role="alert">Data mahasiswa tidak ditemukan</div>
			<?php endif ?>
			<ul class="list-group">
				<?php foreach ($mahasiswa as $mhs): ?>
					<li class="list-group-item">
						<?= $mhs['nama']; ?>
						<a href="<?= base_url('mahasiswa/hapus/'.$mhs['id']); ?>" class="badge badge-pill badge-danger float-right" onclick="return confirm('Apakah anda yakin ingin menghapus data mahasiswa?')">hapus</a>
						<a href="<?= base_url('mahasiswa/ubah/'.$mhs['id']); ?>" class="badge badge-pill badge-success float-right ml-1">ubah</a>
						<a href="<?= base_url('mahasiswa/detail/'.$mhs['id']); ?>" class="badge badge-pill badge-primary ml-1 float-right">detail</a>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
</div>