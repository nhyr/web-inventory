<html>

<head>

  <title>Export Laporan Barang Masuk</title>
  <style type="text/css">
  body{
    font-family: sans-serif;
  }
  table{
    width: 100%;
    margin: 20px auto;
    border-collapse: collapse;
  }
  table th,
  table td{
    border: 1px solid #3c3c3c;
    padding: 3px 8px;
  }
  table td{
    vertical-align: top;
  }
  a{
    background: blue;
    color: #fff;
    padding: 8px 10px;
    text-decoration: none;
    border-radius: 2px;
  }
  .hh tr td{
    border: 0;
    padding: 0
  }
  .hh{
    margin-bottom: 2px;
  }
  </style>
</head>
<body>
  <?php 
  if ($tgl == null & $tgl2 == null) {
    $per = "";
  }else{
    $periode =  explode('-', $tgl)[2]."/".explode('-', $tgl)[1]."/".explode('-', $tgl)[0];
    $periode2= explode('-', $tgl2)[2]."/".explode('-', $tgl2)[1]."/".explode('-', $tgl2)[0];
    $per = "Periode : ".$periode." - ".$periode2;
  }
    
    ?>
  
    <table class="hh">
      <tr>
        <td>
          
        </td>
        <td style="text-align: center;padding-center: -20px;">
          <?php $src = base_url('assets/images/icon.png'); ?>
          <!-- <?=$src?> -->
          <img style="width: 60px;height: 100px;" src="<?=$src?>">
        </td>
        <td style="width: 460px;">
    <h2 style="line-height: 0.01; font-size: 30px;">PT KAPSULINDO NUSANTARA</h2>
    <h3 style="line-height: 0.01; font-size: 23px;">Pedagang Besar Bahan Baku Farmasi</h3>
    <p style="line-height: 0.01;font-size: 12px;">Jl. Pancasila 1 Cicadas Gunung Putrri - Kab. Bogor 16964, Indonesia</p>
    <p style="line-height: 0.01;font-size: 12px;">Tlp:(021) 8671165. Fax:(021) 8671168,86861734. Email: pbbbf@kapsulindo.co.id</p>
        </td>
        <td style="padding-center:-10px; ">
          <?php $src = base_url('assets/images/pom.jpeg'); ?>
          <!-- <?=$src?> -->
          <img style="width: 120px;height: 100px;" src="<?=$src?>">
        </td>
          
        </td>]
      </tr>
    </table>
    <hr style="line-height: 0.01;">
  <div style="text-align: center;padding-top: 5px;">
    <h3 style="float: center;line-height: 0.2;">Report Stock In</h3>
    <p style="line-height: 0.1;font-size: 12px;"><?=$per?></p>
  </div>

    

                                                <table style="width: 1000px;font-size: 18px;">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Tanggal</th>
                                                            <th>No Batch</th>
                                                            <th>Nama Barang</th>
                                                            <th>Nama Supplier</th>
                                                            <th>Operator Penerima</th>
                                                            <th class="text-right">Qty</th>
                                                            <!-- <th class="text-right">Barang Keluar</th>
                                                            <th class="text-right">Stok</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php 
                                                      $no=1;
                                                      $jml=0;
                                                      foreach($result as $k){ 
                                                        $tgl =  explode('-', $k['tgl'])[2]."/".explode('-', $k['tgl'])[1]."/".explode('-', $k['tgl'])[0];
                                                        if ($k['tot_barang_keluar']==0) {
                                                          $ds="";
                                                        }else{
                                                          $ds="d-none";
                                                        }
                                                        $jml+=$k['qty'];
                                                      ?>
                                                      <tr>
                                                            <th scope="row"><?=$no++?></th>
                                                            <td><?=$tgl?></td>
                                                            <td style="text-align: center;"><?=$k['no_batch']?></td>
                                                            <td><?=$k['nama_barang']?></td>
                                                            <td><?=$k['nama_suplier']?></td>
                                                            <td><?=$k['nama']?></td>
                                                            <td style="text-align: right;"><?=number_format($k['qty'],0,",",".")?>&nbsp;<?=$k['satuan']?></td>
                                                            <!-- <td style="text-align: right;"><?=number_format($k['tot_barang_keluar'],0,",",".")?><?=$k['satuan']?></td>
                                                            <td style="text-align: right;"><?=number_format($k['stok'],0,",",".")?><?=$k['satuan']?></td> -->
                                                        </tr>
                                                      <?php
                                                      }
                                                      ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                          <th colspan="6" class="center">Jumlah</th><th><?=$jml?>&nbsp;<?=$k['satuan']?></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
  </body>
</html>