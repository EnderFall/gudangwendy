<div class ="container mt-3">
<form action="<?= base_url('home/update_barang') ?>" method="POST">
	<div class="mb-3 mt-3">
		<label for="namabrg">Nama Barang</label>
		<input type="text" class="form-control" placeholder="Nama Barang" id="nama" name="nama" value="<?= $anjas->nama_brg?>" required>
	</div>
	<div class="mb-3">
		<label for="kode_brg">Kode Barang</label>
		<input type="text" class="form-control" placeholder="Kode Barang" id="kodebrg" name="kodebrg" value="<?= $anjas->kode_brg?>" required>
	</div>
	<div class="mb-3">
		<label for="stok_brg">Stok Barang</label>
		<input type="number" class="form-control" placeholder="Barang" id="stokbrg" name="stokbrg" value="<?= $anjas->stok?>" required>
	</div>
	<div>
	<input type="hidden" name="idbrg" value="<?= $anjas->id_brg ?>">
	<button type="submit" class= "btn btn-success">Simpan</button>
</div>



