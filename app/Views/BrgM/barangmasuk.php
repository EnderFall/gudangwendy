<input type="text" class="form-control" placeholder="Pencarian">

<a href = "<?=base_url('home/tbm')?>" ><button class="btn btn-success"><i class="fas fa-plus-square"></i></button></a>

<table class="table table-bordered">
    <thead>
      <tr>
        <th width="3%">No</th>
        <th>ID Barang</th>
        <th width="5%">Jumlah</th>
        <th>Date</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $ms=1;
       foreach($masukbrg as $key => $value){
      ?>
      <tr>
        <td><?= $ms++ ?></td>
        <td><?= $value->id_brg ?></td>
         <td><?= $value->jumlah ?></td>
         <td><?= $value->tanggal ?></td>
         <td>
          
          
          <a href="<?= base_url('home/hapus_barangmasuk/' .$value->id_bm) ?>"><button class="btn btn-danger"><i class="fas fa-minus-square"></i></button></a>
        </td>


      </tr>


    <?php 
          }
       ?>

      
    </tbody>
  </table>