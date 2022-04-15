<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?php foreach ($penjual as $u) : ?>
				<form action="<?= base_url('penjual/r_penjual/edit_action/' . $u->id); ?>" method="post">
					<table style="margin:20px auto;">
						<tr>
							<td>Nama</td>
							<td>
								<input type="hidden" name="id" value="<?= $u->id ?>">
								<input type="text" name="nama" value="<?= $u->nama ?>">
							</td>
						</tr>
						<tr>
							<td>Username</td>
							<td><input type="text" name="username" value="<?= $u->username ?>"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="text" name="password" value="<?= $u->password ?>"></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td><input type="text" name="jenis_kelamin" value="<?= $u->jenis_kelamin ?>"></td>
						</tr>
						<tr>
							<td>Kota</td>
							<td><input type="text" name="kota" value="<?= $u->kota ?>"></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><input type="text" name="alamat" value="<?= $u->alamat ?>"></td>
						</tr>
						<tr>
							<td>Foto</td>
							<td><input type="text" name="foto" value="<?= $u->foto ?>"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="Simpan"></td>
						</tr>
					</table>
				</form>
			<?php endforeach; ?>

			</html>
			<div class="card card-primary card-outline">
				<div class="card-header">
					<h3 class="card-title">
						<i class="fas fa-edit"></i>
						Modal Examples
					</h3>
				</div>
				<div class="card-body">
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
						Launch Default Modal
					</button>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
						Launch Primary Modal
					</button>
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-secondary">
						Launch Secondary Modal
					</button>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
						Launch Info Modal
					</button>
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
						Launch Danger Modal
					</button>
					<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
						Launch Warning Modal
					</button>
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
						Launch Success Modal
					</button>
					<br />
					<br />
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-sm">
						Launch Small Modal
					</button>
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
						Launch Large Modal
					</button>
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
						Launch Extra Large Modal
					</button>
					<br />
					<br />
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-overlay">
						Launch Modal with Overlay
					</button>
					<div class="text-muted mt-3">
						Instructions for how to use modals are available on the
						<a href="https://getbootstrap.com/docs/4.4/components/modal/">Bootstrap documentation</a>
					</div>
				</div>
				<!-- /.card -->
			</div>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0"><?= $title_table ?></h1>
							</div><!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item active"><?= $title ?></li>
								</ol>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.container-fluid -->
				</div>
				<!-- /.content-header -->
			</div>