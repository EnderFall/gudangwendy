<input type="text" class="form-control" placeholder="Pencarian">

<a href = "<?=base_url('home/tbk')?>" ><button class="btn btn-success">+Tambah</button></a>

<table class="table table-bordered">
    <thead>
      <tr>
        <th width="3%">No</th>
        <th>ID Barang</th>
        <th width="5%">Jumlah</th>
        <th>Date</th>
        <?php
          if (session()->get('level')==1|| session()->get('level')==3){
            ?>
        <th>Aksi</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>

      <?php
      $ms=1;
       foreach($keluarbrg as $key => $value){
      ?>
      <tr>
        <td><?= $ms++ ?></td>
        <td><?= $value->id_brg ?></td>
         <td><?= $value->jumlah ?></td>
         <td><?= $value->tanggal ?></td>
         
          <?php
          if (session()->get('level')==1|| session()->get('level')==3){
            ?>
            <td>
          <a href="<?= base_url('home/hapus_barangkeluar/' .$value->id_bk) ?>"><button class="btn btn-danger">Hapus</button></a>
         </td> 
         <?php } ?>
        


      </tr>


    <?php 
          }
       ?>

      
    </tbody>
  </table>