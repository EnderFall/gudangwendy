
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap.min.css')?>">
  <title>Gudang</title>
  
</head>
<body>
<script type="text/javascript">
  window.onload = () => {
        const table = document.getElementById('tabelexcel');
        exportTable(table, 'laporanbarang.xls');
    };

    function exportTable(table, filename) {
        const tableHTML = encodeURIComponent(table.outerHTML);
        const downloadLink = document.createElement('a');

        downloadLink.href = `data:application/vnd.ms-excel`,${tableHTML};
        downloadLink.download = filename;
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
        window.close();
        
    }
</script>

<style type="text/css">
    table,thead,tbody, tr, td,th {
      border:1px solid;
      border-collapse:collapse;
      
    }
    </style>
   <center>
<h3 text-align="center">Data Barang Gudang Sekolah Permata Harapan</h3>
</center>
<img src = "<?= base_url('image/logo_sph.png');?>" flex= "center" width= "300px">


<table id="tabelexcel">
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