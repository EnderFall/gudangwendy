<input type="text" class="form-control" placeholder="Pencarian">
<a href = "<?=base_url('home/inputkaryawan')?>" ><button class="btn btn-success">+Tambah</button></a>

<table class="table table-bordered">
    <thead>
      <tr>
        <th width="3%">No</th>
        <th>ID Karyawan</th>
        <th>Nama Karyawan</th>
        <th width="5%">NIK</th>
        <th>Tempat Lahir</th>
        <th width="10%">Tanggal Lahir</th>
        <th width="8%">Jenis Kelamin</th>
        <th>Alamat</th>
        <th width="8%">No Telepon</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $ms=1;
       foreach($anjas as $key => $value){
      ?>
      <tr>
        <td><?= $ms++ ?></td>
         <td><?= $value->id_kry ?></td>
         <td><?= $value->nama ?></td>
         <td><?= $value->nik ?></td>
         <td><?= $value->tmpt_lahir ?></td>
         <td><?= $value->tgl_lahir ?></td>
         <td><?= $value->jenis_kelamin ?></td>  
         <td><?= $value->alamat?></td>
         <td><?= $value->no_telp?></td>
         <td>
          <a href="<?= base_url('home/edit_barang/' .$value->id_user) ?>"><button class="btn btn-warning">Edit</button></a>
          
          <a href="<?= base_url('home/hapus_karyawan/' .$value->id_user) ?>"><button class="btn btn-danger">Hapus</button></a>
        </td>


      </tr>


    <?php 
          }
       ?>

      
    </tbody>
  </table>