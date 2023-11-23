<h2 class="page-title">
	Data User
</h2>
<div class="row-mt-3">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<a href="#" class="btn btn-primary mb-3" id="tambahuser">
					<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path stroke="none" d="M0 0h24v24H0z" fill="none" />
						<line x1="12" y1="5" x2="12" y2="19" />
						<line x1="5" y1="12" x2="19" y2="12" />
					</svg>
					Tambah Data
				</a>
				<div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
				<table class="table table-striped table-boerdered" id="tabeluser">
					<thead>
						<tr>
							<th>NO</th>
							<th>ID USER</th>
							<th>NAMA LENGKAP</th>
							<th>USERNAME</th>
                            <th>PASSWORD</th>
                            <th>LEVEL</th>
                            <th>CABANG</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($user as $u) {
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $u->id_user; ?></td>
								<td><?php echo $u->nama_lengkap; ?></td>
								<td><?php echo $u->username; ?></td>
                                <td><?php echo $u->password; ?></td>
                                <td><?php echo $u->level; ?></td>
                                <td><?php echo $u->kode_cabang; ?></td>
								<td>
									<a href="#" data-iduser="<?php echo $u->id_user; ?>" class="btn btn-sm btn-primary edit">
									<li class="fa-solid fa-pen-to-square" style="font-size: 1rem;"></li></a>
									<a href="#" data-href="<?php echo base_url(); ?>user/hapususer/<?php echo $u->id_user; ?>" class="btn btn-sm btn-danger hapus">
									<li class="fa-solid fa-trash-can" style="font-size: 1rem;"></li>
									</a>
								</td>
							</tr>
						<?php
							$no++;
						} ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal modal-blur fade" id="modaluser" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input User</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
			<div id="loadforminputuser"></div>
          </div>
        </div>
      </div>
 </div>
 <div class="modal modal-blur fade" id="modaledituser" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit User</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
			<div id="loadformedituser"></div>
          </div>
        </div>
      </div>
 </div>
 <div class="modal modal-blur fade" id="modalhapususer" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <div class="modal-title">Anda Yakin Hapus Data Ini?</div>
      <div>Jika DiHapus Maka Anda Akan Kehilangan Data Ini</div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
    <a href="#" id="hapususer" class="btn btn-danger">Ya, Hapus</a>
    </div>
  </div>
</div>
</div>
	<script>
		$(function() {
			$("#tambahuser").click(function() {
				$("#modaluser").modal("show");
				$("#loadforminputuser").load("<?php echo base_url(); ?>user/inputuser");
			});

			$(".edit").click(function() {
				var iduser = $(this).attr("data-iduser");
				$("#modaledituser").modal("show");
				$("#loadformedituser").load("<?php echo base_url(); ?>user/edituser/"+ iduser);
			})
			$(".hapus").click(function() {
				var href = $(this).attr("data-href");
				$("#modalhapususer").modal("show");
				$("#hapususer").attr("href", href);
			});
			$('#tabeluser').DataTable();
		});
	</script>