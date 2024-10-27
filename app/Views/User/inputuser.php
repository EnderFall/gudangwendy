
<form action="" method="POST">
	<table>
		<tr>
			<td>Nama</td>
		<td><input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" required></td>
	</tr>
	<tr>
				<td>ID Karyawan</td>
				<td><input type="number" max="9999" min= "0001"  class="form-control" placeholder="Masukkan ID Karyawan" name="idkry" required></td>
			</tr>
			<tr>
				<td>ID User</td>
				<td><input type="number" max="9999" min="0001" class="form-control" placeholder="Masukkan ID Pegawai" name="idusr" required></td>
			</tr>
			<tr>
				<td>NIK</td>
				<td><input type="number" max="99999999"  min="00000001" class="form-control" placeholder="Masukkan NIK" name="nik" required></td>
			</tr>
		<tr>
		
			<td>Jenis Kelamin</td>
				<td><input type="radio" name="jk" required>Laki-laki
					<input type="radio" name="jk" required>Perempuan</td>
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
				<td>Jabatan</td>
				<td><select class= "form-control">
					<option>Direktur</option>
					<option>Admin</option>
					<option>Staff</option>
				</select>
			</tr>

			
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan" class="btn btn-primary">
					<input type="reset" value="Reset" class="btn btn-danger">
					<input type="button" value="Kembali" class="btn reset">
				</td>
			</tr>

	</table>

