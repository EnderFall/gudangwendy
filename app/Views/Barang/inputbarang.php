<form action="" method="POST">
	<table>
		<tr>
			<td>Nama Barang</td>
			<td><input type="text" class="form-control" placeholder="Masukkan Nama Barang" name="nmbrg" required></td>
		</tr>
		<tr>
			<td>ID Barang</td>
			<td><input type="number" max="9999" min= "0001" class= "form-control" placeholder="Masukkan ID Barang" name="idbrg" required></td>
		</tr>
		<tr>
			<td>Tipe Barang</td>
			<td><select class="form-control" placeholder="Pilih Tipe Barang" name="tpbrg" required>
				<option>Furnitur</option>
				<option>Peralatan</option>
				<option>Material</option>
			</select>
		</tr>
		<tr>
			<td>Jumlah Barang</td>
			<td><input type="number"  min= "1" value="1" class="form-control" placeholder="Masukkan Nama" name="nama" required></td>
		</tr>

					<tr>
				<td>Tanggal</td>
				<td><input type="date" class="form-control" placeholder="Masukkan Nama" name="nama" required></td>
			</tr>
		<tr>
				<td></td>
				<td><input type="submit" value="Simpan" class="btn btn-primary">
					<input type="reset" value="Reset" class="btn btn-danger">
					<input type="button" value="Kembali" class="btn btn-secondary">
				</td>
			</tr>
	</table>

