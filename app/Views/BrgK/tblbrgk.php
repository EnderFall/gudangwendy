<h2>Tambah Barang</h2>

<div class="mb-3">
		<label for="jumlah_brg">Tanggal Masuk</label>
		<input type="date" class="form-control" placeholder="Jumlah Barang Masuk" id="jumlahbrg" name="jumlahbrg" required>
	</div>

    <div class="mb-3">
		<label for="jumlah_brg">Tanggal Akhir</label>
		<input type="date" class="form-control" placeholder="Jumlah Barang Masuk" id="jumlahbrg" name="jumlahbrg" required>
	</div>

    <a href= "<?= base_url('home/printbarangk') ?>"><button type="submit" class= "btn btn-success"><i class="fas fa-save"></i></button></a>