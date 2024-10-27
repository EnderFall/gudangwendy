<div class ="container mt-3">
<form action="<?= base_url('home/update_barangmsk') ?>" method="POST">
	<div class="mb-3 mt-3">
		<label for="idbrg">ID Barang</label>
		<input type="text" class="form-control" placeholder="ID Barang" id="idbrg" name="idbrg" value="<?= $anjas->id_brg?>" required>
	</div>
	<div class="mb-3">
		<label for="jumlah_brg">Jumlah Barang Masuk</label>
		<input type="number" class="form-control" placeholder="Jumlah Barang Masuk" id="jumlahbrg" name="jumlahbrg" value="<?= $anjas->jumlah?>" required>
	</div>
	<div class="mb-3">
		<label for="tanggalmsk">Tanggal Masuk</label>
		<input type="date" class="form-control" placeholder="Barang" id="tanggalmsk" name="tanggalmsk" value="<?= $anjas->tanggal?>" required>
	</div>
	<div>
	<input type="hidden" name="idbm" value="<?= $anjas->id_bm ?>">
	<button type="submit" class= "btn btn-success">Simpan</button>
</div>



