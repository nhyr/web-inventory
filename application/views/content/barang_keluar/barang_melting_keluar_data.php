

    <!-- [ Main Content ] start -->
    <section class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <!-- <h5 class="m-b-10">Data Barang Keluar</h5> -->
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Barang Melting Keluar</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ basic-table ] start -->
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Data Barang Keluar</h5>
                                            
                                            <!-- Button trigger modal -->
                      											<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      												<i class="feather icon-plus"></i>Tambah Data
                      											</button>
                                        </div>
                                        <div class="card-block table-border-style">

                                        	<?php 
                                        	// print_r($result);
                                        	?>
                                            <div class="table-responsive">
                                                <table class="table datatable table-hover table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Tanggal Keluar</th>
                                                            <th>No Transfer File</th>
                                                            <th>Nama Operator</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php 
                                                    	$no=1;
                                                    	foreach($result as $k){ 
                                                        $tgl =  explode('-', $k['tgl'])[2]."/".explode('-', $k['tgl'])[1]."/".explode('-', $k['tgl'])[0];
                                                        // $exp =  explode('-', $k['exp'])[2]."/".explode('-', $k['exp'])[1]."/".explode('-', $k['exp'])[0];
                                                                
                                                    	?>
                                                    	<tr>
                                                            <th scope="row"><?=$no++?></th>
                                                            <td><?=$tgl?></td>
                                                            <td><?=$k['no_surat_jalan']?></td>
                                                            <td><?=$k['nama']?></td>
                                                            <td class="text-right">
                                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-info btn-square btn-sm" 
                                                                  data-toggle="modal" 
                                                                  data-target="#view" 

                                                                  data-no_surat_jalan="<?=$k['no_surat_jalan']?>";
                                                                  data-l-no_surat_jalan="<?=urlencode($k['no_surat_jalan'])?>"
                                                                  data-tgl="<?=$tgl?>"
                                                                  data-nama_operator="<?=$k['nama']?>"
                                                                  data-note="<?=$k['note']?>"
                                                                  data-no_po="<?=$k['no_po']?>"
                                                                  
                                                                  <i class="feather icon-eye"></i>Detail
                                                                </button>
                                                                <a  
                                                                  href="javascript:void(0)" 
                                                                  class="btn btn-success btn-square text-light btn-sm" 
                                                                  onclick = "window.open(`<?=base_url()?>barang_keluar/pdf_surat_jalan/<?=str_replace('/', '--',$k['no_surat_jalan'])?>`, 'pdf_laporan_barang_stok', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); "
                                                                >
                                                                  <i class="feather icon-file"></i>No Transfer File
                                                                </a>
                                                                <a  
                                                                  href="<?=base_url()?>barang_keluar/delete/<?=str_replace('/', '--',$k['no_surat_jalan'])?>" 
                                                                  class="btn btn-danger btn-square text-light btn-sm" 
                                                                  onclick = "if (! confirm('Apakah Anda Yakin?')) { return false; }"
                                                                >
                                                                  <i class="feather icon-trash-2"></i>hapus
                                                                </a>
                                                              </div>
                                                            </td>
                                                        </tr>
                                                    	<?php
                                                    	}
                                                    	?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ basic-table ] end -->

                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script type="text/javascript">
  $(document).ready(function() {
    $('#export').click(function () {
      var filter_tgl = $('#filter_tgl').val();
      if (filter_tgl=='') {
        window.location = "<?=base_url()?>laporan_barang_stok/pdf_laporan_barang_stok";
      }else{
        var url = "<?=base_url()?>laporan_barang_stok/pdf_laporan_barang_stok/"+filter_tgl.split("/")[2]+"-"+filter_tgl.split("/")[1]+"-"+filter_tgl.split("/")[0];
        window.open(url, 'pdf_laporan_barang_stok', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })
    
  })
</script>
    <!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>barang_keluar/add">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="no_surat_jalan">No Transfer File</label>
              <!-- <input type="text" class="form-control" id="no_surat_jalan" name="no_surat_jalan" placeholder="No Surat Jalan" maxlength="20" required> -->
              <input type="text" class="form-control" id="no_surat_jalan" name="no_surat_jalan" value="../KN/PBBF/VI/2022" maxlength="20" aria-describedby="validationServer03Feedback" required>
              <div id="validationServer03Feedback" class="invalid-feedback">
                Maaf nomor transfer file sudah ada.
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tgl">Tanggal Keluar</label>
              <input type="text" class="form-control datepicker" id="tgl" name="tgl"  placeholder="Tanggal Keluar" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="id_customer">Nama Operator</label>
              <select class="form-control chosen-select" id="id_user" name="id_user" required>
                <option value="">- Pilih Nama Operator -</option>
                <?php 
                  foreach($user as $b){ 
                ?>
                <option value="<?=$b['id_user']?>"><?=$b['nama']?></option>
                <?php
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <!-- <div class="form-group">
              <label for="exp">Tanggal Kadaluarsa</label>
              <input type="text" class="form-control datepicker" id="exp" name="exp"  placeholder="Tanggal Kadaluarsa" required>
            </div> -->
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">No. PO</label>
              <input type="text" class="form-control" id="no_po" name="no_po"  value="../KN/PO/VI/22" aria-describedby="validationServer03Feedback" required>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <textarea class="form-control" id="keterangan" name="note" rows="3"></textarea>
            </div>
          </div>
        </div>
          <input type="hidden" id="jumlah_batch" name="jumlah_batch" value="1">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="id_suplier">No Batch & Nama Barang</label>
                <select class="form-control chosen-select" id="no_batch_add" name="no_batch_add" required>
                  <option value="">- Pilih No Batch & Nama Barang -</option>
                  <?php 
                    foreach($bm as $s){ 
                  ?>
                  <option value="<?=$s['no_batch']?>,<?=$s['nama_barang']?>,<?=$s['stok']?>"><?=$s['no_batch']?> | <?=$s['nama_barang']?> | <?=$s['nama_suplier']?> | <?=$s['stok']?><?=$s['satuan']?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-2">
              <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="text"  class="form-control" id="qty_add" name="qty_add" placeholder="Quantity" onkeypress="return hanyaAngka(event)" maxlength="15"  required>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="exp">Kadaluarsa</label>
                <input type="text" class="form-control datepicker" id="exp" name="exp"  placeholder="Tanggal Kadaluarsa" required>
              </div>
            </div>
            <div class="col-1 text-right">
              <a href="javascript:void(0)" id="uuu" class="btn btn-primary" style="margin-left:-20px;margin-top: 31px;"><b class="text">Input</b></a>
            </div>
          </div>
      
      <div class="table-responsive">
        <table class="table table-bordered table-sm">
          <thead>
            <tr>
              <th>No Batch</th><th>Nama Barang</th><th>Qty</th><th>Kadaluarsa</th><th class="text-right">Hapus</th>
            </tr>
          </thead>
          <tbody id="insert_batch">
          </tbody>
        </table>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        <button type="submit" id="simpan" class="btn btn-primary"
        onclick = "if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>

      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {

    $("#no_surat_jalan").keyup(function(){
      var no_surat_jalan =  $("#no_surat_jalan").val();
      jQuery.ajax({
        url: "<?=base_url()?>barang_keluar/cek_surat_jalan",
        dataType:'text',
        type: "post",
        data:{no_surat_jalan:no_surat_jalan},
        success:function(response){
          if (response =="true") {
            $("#no_surat_jalan").addClass("is-invalid");
            $("#simpan").attr("disabled","disabled");
          }else{
            $("#no_surat_jalan").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }            
      });
    })

    $("#uuu").click(function(){
      // alert()
      var jumlah = parseInt($("#jumlah_batch").val()); // Ambil jumlah data form pada textbox jumlah-form      
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
      $("#jumlah_batch").val(nextform)

      var batch = $("#no_batch_add").val();
      var no_batch = batch.split(",")[0];
      var nama_barang = batch.split(",")[1];
      var stok = batch.split(",")[2];
      var qty = $("#qty_add").val();
      var exp = $("#exp").val();

      if (qty=='' || qty=='') {
        alert("Quantity tidak Boleh Kosong");
      }else if(batch ==''){
        alert("No Batch tidak Boleh Kosong");
      }else if(stok =='0'){
        alert("Stok Kosong");
      }else if(exp ==''){
        alert("Kadaluarsa Kosong");
      }else if(Number(qty) > Number(stok)){
        alert("stock tidak mencukupi");
      }else if(insert_batch ==''){
        alert("tidak Boleh Kosong");
      }else{
        $("#insert_batch").append(`
          <tr id="tr_`+nextform+`">
            <td>`+no_batch+`<input type="hidden" name="no_batch[]" value="`+no_batch+`"></td>
            <td>`+nama_barang+`</td>
            <td>`+qty+`<input type="hidden" name="qty[]" value="`+qty+`"></td>
            <td>`+exp+`<input type="hidden" name="exp[]" value="`+exp+`"></td>
            <td class="text-right"><a href="javascript:void(0)" onclick="remove(`+ nextform +`)" class="text-danger"><i class="feather icon-trash-2"></i></a></td>
          </tr>
        `);
      }

      
      remove = function(param){
      var p = document.getElementById('insert_batch');
      var e = document.getElementById('tr_'+param);
      p.removeChild(e);//menghapus elemen child dengan id error bila kita menginput nama
    }
  })
    $('#add').on('hidden.bs.modal', function(){
    $(this).find('form')[0].reset();
});
  })
</script>



<!-- Modal -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>barang_masuk/update">
        <input type="hidden" id="e_id_barang_masuk" name="id_barang_masuk">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-no_surat_jalan">No Surat Jalan</label>
              <input type="text" class="form-control" id="v-no_surat_jalan" name="v-no_surat_jalan" placeholder="No Surat Jalan" maxlength="20" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tgl">Tanggal Keluar</label>
              <input type="text" class="form-control" id="v-tgl" name="tgl"  placeholder="Tanggal Keluar" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Nama Operator</label>
              <input type="text" class="form-control" id="v-nama" name="v-nama"  placeholder="Nama Operator" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <!-- <div class="form-group">
              <label for="tgl">Tanggal Kadaluarsa</label>
              <input type="text" class="form-control" id="v-exp" name="exp"  placeholder="Tanggal Kadaluarsa" readonly>
            </div> -->
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">No. PO</label>
              <input type="text" class="form-control" id="v-no_po" name="no_po"  placeholder="No PO" readonly>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="v-note">Keterangan</label>
              <textarea class="form-control" id="v-note" name="note" rows="3" readonly></textarea>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>No Batch</th><th>Nama Barang</th><th>Nama Supplier</th><th class="text-right">Qty</th><th class="text-right">Kadaluarsa</th>
              </tr>
            </thead>
            <tbody id="v-barang_keluar">
            </tbody>
          </table>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-info">Update</button> -->
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#view').on('show.bs.modal', function (event) {
  var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
  var l_no_surat_jalan = $(event.relatedTarget).data('l-no_surat_jalan')
  var tgl = $(event.relatedTarget).data('tgl') 
  // var exp = $(event.relatedTarget).data('exp') 
  var note = $(event.relatedTarget).data('note') 
  var nama = $(event.relatedTarget).data('nama')  
  var no_po = $(event.relatedTarget).data('no_po')   



  $(this).find('#v-no_surat_jalan').val(no_surat_jalan)
  $(this).find('#v-tgl').val(tgl)
  // $(this).find('#v-exp').val(exp)
  $(this).find('#v-note').val(note)
  $(this).find('#v-nama').val(nama)
  $(this).find('#v-no_po').val(no_po)
    jQuery.ajax({
        url: "<?=base_url()?>barang_keluar/data_barang_keluar",
        dataType:'json',
        type: "post",
        data:{no_surat_jalan:no_surat_jalan},
        success:function(response){
          var data = response;
          // alert(JSON.stringify(data))
          var $id = $('#v-barang_keluar');
          $id.empty();
          // $id.append('<option value=0>- Pilih Prioritas Kegiatan -</option>');
          for (var i = 0; i < data.length; i++) {
            var exp = data[i].exp.split("-")[2]+"/"+data[i].exp.split("-")[1]+"/"+data[i].exp.split("-")[0]
            $id.append(`
              <tr>
                <td>`+data[i].no_batch+`</td>
                <td>`+data[i].nama_barang+`</td>
                <td>`+data[i].nama_suplier+`</td>
                <td class="text-right">`+data[i].qty+data[i].satuan+`</td>
                <td class="text-right">`+exp+`</td>
              </tr>
            `);
          }        
        }            
      });
  // $(this).find('#e_tgl').datepicker().on('show.bs.modal', function(event) {
  //   // prevent datepicker from firing bootstrap modal "show.bs.modal"
  //   event.stopPropagation();
  // });
})

})

</script>










<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Barang Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>barang_masuk/update">
        <input type="hidden" id="e_id_barang_masuk" name="id_barang_masuk">
      <div class="modal-body">
          <div class="form-group">
            <label for="no_batch">No Batch</label>
            <input type="text" class="form-control" id="e_no_batch" name="no_batch" placeholder="No Batch" maxlength="20" required>
          </div>
          <div class="form-group">
            <label for="tgl">Tanggal Masuk</label>
            <input type="text" class="form-control datepicker" id="e_tgl" name="tgl"  placeholder="text" >
          </div>
          <div class="form-group">
            <label for="id_barang">Nama Barang</label>
            <select class="form-control chosen-select" id="e_id_barang" name="id_barang" required>
              <option value="">- Nama Barang -</option>
              <?php 
                foreach($res_barang as $b){ 
              ?>
              <option value="<?=$b['id_barang']?>">(<?=$b['kode_barang']?>) <?=$b['nama_barang']?></option>
              <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="id_suplier">Nama Supplier</label>
            <select class="form-control chosen-select" id="e_id_suplier" name="id_suplier" required>
              <option value="">- Nama Supplier -</option>
              <?php 
                foreach($res_suplier as $s){ 
              ?>
              <option value="<?=$s['id_suplier']?>">(<?=$s['kode_suplier']?>) <?=$s['nama_suplier']?></option>
              <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control chosen-select" id="e_status" name="status">
              <option value="">- Status -</option>
              <option value="Import">Import</option>
              <option value="Pinjam KN">Pinjam KN</option>
            </select>
          </div>
          <div class="form-group">
            <label for="qty">Quantity</label>
            <input type="text" class="form-control" id="e_qty" name="qty" placeholder="Quantity" onkeypress="return hanyaAngka(event)" maxlength="15" required>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>











<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        	<div class="form-group">
		    <label for="exampleFormControlInput1">Text</label>
		    <input type="text" class="form-control datepicker" id="" placeholder="text">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlInput1">Email address</label>
		    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlSelect1">Example select</label>
		    <select class="form-control chosen-select" id="exampleFormControlSelect1">
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="1">1</option>
		      <option value="2">2</option>

		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="1">1</option>
		      <option value="2">2</option>

		    </select>
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlSelect2">Example multiple select</label>
		    <select multiple class="form-control" id="exampleFormControlSelect2">
		      <option>1</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
		      <option>5</option>
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Example textarea</label>
		    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

