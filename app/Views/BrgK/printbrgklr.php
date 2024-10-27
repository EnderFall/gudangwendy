<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap.min.css')?>">
  <title>Gudang</title>
</head>
<body>

<style>
    .table,
    .tr,
    .td,
    {
      border: 1px,

    }
  </style>


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
        
        <?php } ?>
      </tr>
    </thead>
    <tbody>

      <?php
      $ms=1;
       foreach($anjas as $key => $value){
      ?>
      <tr>
        <td><?= $ms++ ?></td>
        <td><?= $value->id_brg ?></td>
         <td><?= $value->jumlah ?></td>
         <td><?= $value->tanggal ?></td>
         <?php } ?>
       </tr>
         </tbody>
         <script type="text/javascript">window.print()</script>
  </table>

        </body>
        </html>