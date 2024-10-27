<div class ="container mt-3">
<form action="<?= base_url('home/simpan_barang_m') ?>" method="POST">
	<div class="mb-3 mt-3">
		<label for="idbrg">Nama Barang</label>
		<select class="form-control" name="id_brgm" id="id_brgm">
			<option>Pilih Barang</option>	
			<?php
			
			foreach($anjas as $key => $value){
				?>
				<option value="<?= $value->id_brg ?>"><?= $value->kode_brg ?> - <?= $value-> nama_brg ?></option>
				<?php
			}
			?>
		</select>
	</div>
	<div class="mb-3">
		<label for="jumlah_brg">Jumlah Barang Masuk</label>
		<input type="number" class="form-control" placeholder="Jumlah Barang Masuk" id="jumlahbrg" name="jumlahbrg" required>
	</div>
	<div class="mb-3">
		<label for="tanggalmsk">Tanggal Masuk</label>
		<input type="date" class="form-control" placeholder="Barang" id="tanggalmsk" name="tanggalmsk" required>
	</div>
	
	<button type="submit" class= "btn btn-success">Simpan</button>
</div>
