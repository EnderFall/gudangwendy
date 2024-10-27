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
    table,thead,tbody, tr, td,th {
      border:1px solid;
      border-collapse:collapse;
      
    }
    </style>

<td><a href="<?= base_url('home/pdfprint'); ?>"><button>
  Export
  </button></a>
  </td>


<table>
    <thead>
      <tr>
        <th width="3%">No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th width="5%">Stok</th>
      
      </tr>
    </thead>
    <tbody>

      <?php
      $ms=1;
       foreach($anjas as $key => $value){
      ?>
      <tr>
        <td><?= $ms++ ?></td>
         <td><?= $value->kode_brg ?></td>
         <td><?= $value->nama_brg ?></td>
         <td><?= $value->stok ?></td>
         


      </tr>


    <?php 
          }
       ?>

      
    </tbody>
  </table>

        </body>
        </html>