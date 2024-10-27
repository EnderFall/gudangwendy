<input type="text" class="form-control" placeholder="Pencarian">
<button class="btn btn-success">+Tambah</button>

<table class="table table-bordered">
    <thead>
      <tr>
        <th width="3%">No</th>
        <th>Username</th>
        <th>Password</th>
        <th width="5%">Level</th>
        
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
         <td><?= $value->username ?></td>
         <td><?= $value->password ?></td>
         <td><?= $value->level ?></td>

         
         <td>
          <a href="<?= base_url('home/edit_user/' .$value->id_user) ?>"><button class="btn btn-warning">Edit</button></a>
          
          <a href="<?= base_url('home/hapus_user/' .$value->id_user) ?>"><button class="btn btn-danger">Hapus</button></a>
        </td>


      </tr>


    <?php 
          }
       ?>

      
    </tbody>
  </table>