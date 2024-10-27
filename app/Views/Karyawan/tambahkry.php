
<form action="<?= base_url('home/simpan_karyawan') ?>" method="POST">
	<table>
		<tr>
			<td>Nama</td>
		<td><input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" required></td>
	</tr>
    <tr>
			<td>Email</td>
		<td><input type="email" class="form-control" placeholder="Masukkan email" name="email" required></td>
	</tr>
	<tr>
			<td>Password</td>
		<td><input type="password" class="form-control" placeholder="Masukkan Password" name="pw" required></td>
	</tr>
	
			<tr>
				<td>NIK</td>
				<td><input type="number" max="99999999"  min="00000001" class="form-control" placeholder="Masukkan NIK" name="nik" required></td>
			</tr>
		<tr>
		
			<td>Jenis Kelamin</td>
			<td><select class= "form-control" name="jk">
				<option class="disabled">Pilih Jenis Kelamin</option>
					<option>Laki-Laki</option>
					<option>Perempuan</option>
</td>
		</tr>
		<tr>
				<td>Tempat Lahir</td>
				<td><textarea class="form-control" placeholder="Masukkan Tempat Lahir" name="tmptlhr" required></textarea></td>
			</tr>
		<tr>
				<td>Tanggal Lahir</td>
				<td><input type="date" class="form-control" name="dt" required></td>
			</tr>
            <tr>
				<td>Alamat</td>
				<td><textarea class="form-control" name="alamat" placeholder="Masukkan Alamat" required></textarea></td>
			</tr>
            <tr>
				<td>No Telepon</td>
				<td><input type="text" class="form-control" name="nohp" placeholder="Masukkan No Telepon" required></td>
			</tr>
			<tr>
				<td>Level</td>
				<td><select class= "form-control" name="lvl">
				<option>Pilih Level</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
                    <option>4</option>
					<option>5</option>
				</select>
			</tr>

			
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan" class="btn btn-primary">
					<input type="reset" value="Reset" class="btn btn-danger">
					<a href= "<?=base_url('home/tabeldatakaryawan'); ?>"><input type="button" value="Kembali" class="btn reset"></a>
				</td>
			</tr>

	</table>

