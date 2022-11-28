

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
                                        <!-- <h5 class="m-b-10">Data Barang Masuk</h5> -->
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Barang Melting Masuk</a></li>
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
                                            <h5>Data Barang Masuk</h5>
                                            
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
                                                            <th>Tanggal</th>
                                                            <th>No Batch</th>
                                                            <th>Kode Barang</th>
                                                            <th>Nama Barang</th>
                                                            <th>Nama Supplier</th>
                                                            <th>Status</th>
                                                            <th>Operator Penerima</th>
                                                            <th class="text-right">Qty</th>
                                                            <th class="text-right">Barang Keluar</th>
                                                            <th class="text-right">Stok</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php 
                                                    	$no=1;
                                                    	foreach($result as $k){ 
                                                        $tgl =  explode('-', $k['tgl'])[2]."/".explode('-', $k['tgl'])[1]."/".explode('-', $k['tgl'])[0];
                                                        if ($k['tot_barang_keluar']==0) {
                                                          $ds="";
                                                        }else{
                                                          $ds="d-none";
                                                        }
                                                    	?>
                                                    	<tr>
                                                            <th scope="row"><?=$no++?></th>
                                                            <td><?=$tgl?></td>
                                                            <td><?=$k['no_batch']?></td>
                                                            <td><?=$k['kode_barang']?></td>
                                                            <td><?=$k['nama_barang']?></td>
                                                            <td><?=$k['nama_suplier']?></td>
                                                            <td><?=$k['status']?></td>
                                                            <td><?=$k['nama']?></td>
                                                            <td class="text-right"><?=number_format($k['qty'],0,",",".")?><?=$k['satuan']?></td>
                                                            <td class="text-right"><?=number_format($k['tot_barang_keluar'],0,",",".")?><?=$k['satuan']?></td>
                                                            <td class="text-right"><?=number_format($k['stok'],0,",",".")?><?=$k['satuan']?></td>
                                                            <td class="text-right">
                                                              <div class="btn-group <?=$ds?>" role="group" aria-label="Basic example">
                                                                <button type="button" 
                                                                  class="btn btn-info btn-square btn-sm" 
                                                                  data-toggle="modal" 
                                                                  data-target="#edit" 

                                                                  data-id_barang_masuk="<?=$k['id_barang_masuk']?>"
                                                                  data-no_batch="<?=$k['no_batch']?>"
                                                                  
                                                                  data-tgl="<?=$tgl?>"
                                                                  data-id_barang="<?=$k['id_barang']?>"
                                                                  data-id_suplier="<?=$k['id_suplier']?>"
                                                                  data-status="<?=$k['status']?>"
                                                                  data-id_user="<?=$k['id_user']?>"
                                                                  data-qty="<?=$k['qty']?>"
                                                                 
                                                                >
                                                                  <i class="feather icon-edit-2"></i>Edit
                                                                </button>
                                                                <a  
                                                                  href="<?=base_url()?>barang_masuk/delete/<?=$k['id_barang_masuk']?>" 
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

    <!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>barang_masuk/add">
      <div class="modal-body">
        
        	<div class="form-group">
		    <label for="no_batch">No Batch</label>
		    <input type="text" class="form-control" id="no_batch" name="no_batch" placeholder="No Batch" maxlength="20" required>
		  </div>
		  <div class="form-group">
        <label for="tgl">Tanggal Masuk</label>
        <input type="text" class="form-control datepicker" id="tgl" name="tgl"  placeholder="Tanggal Masuk" required>
      </div>
      <div class="form-group">
        <label for="id_barang">Nama Barang</label>
        <select class="form-control chosen-select" id="id_barang" name="id_barang" required>
          <option value="">- Pilih Nama Barang -</option>
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
              <option value="">-Pilih Nama Supplier -</option>
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
        <select class="form-control chosen-select" id="status" name="status">
          <option value="">- Pilih Status -</option>
          <option value="Import">Import</option>
          <option value="Pinjam KN">Pinjam KN</option>
          <option value="Return">Return</option>
          <option value="Pinjam Lain-lain">Pinjam Lain-lain</option>
        </select>
      </div>
      <div class="form-group">
        <label for="id_barang">Operator Penerima</label>
        <select class="form-control chosen-select" id="id_barang" name="id_user" required>
          <option value="">- Pilih Operator -</option>
          <?php 
            foreach($res_user as $b){ 
          ?>
          <option value="<?=$b['id_user']?>">(<?=$b['nama']?>) <?=$b['level']?></option>
          <?php
            }
          ?>
        </select>
      </div>
		  <div class="form-group">
        <label for="qty">Quantity</label>
        <input type="text" class="form-control" id="qty" name="qty" placeholder="Quantity" onkeypress="return hanyaAngka(event)" maxlength="15" required>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

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
            <input type="text" class="form-control datepicker" id="e_tgl" name="tgl"  placeholder="text">
          </div>
          <div class="form-group">
            <label for="id_barang">Nama Barang</label>
            <select class="form-control chosen-select" id="e_id_barang" name="id_barang" required>
              <option value="">-Pilih Nama Barang -</option>
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
              <option value="">-Pilih Nama Supplier -</option>
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
              <option value="">-Pilih Status -</option>
               <option value="Import">Import</option>
               <option value="Pinjam KN">Pinjam KN</option>
               <option value="Return">Return</option>
               <option value="Pinjam Lain-lain">Pinjam Lain-lain</option>
            </select>
          </div>
          <div class="form-group">
        <label for="id_barang">Operator Penerima</label>
        <select class="form-control chosen-select" id="id_barang" name="id_user" required>
          <option value="">- Pilih Operator -</option>
          <?php 
            foreach($res_user as $b){ 
          ?>
          <option value="<?=$b['id_user']?>">(<?=$b['nama']?>) <?=$b['level']?></option>
          <?php
            }
          ?>
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
<script type="text/javascript">
$(document).ready(function() {
    $('#edit').on('show.bs.modal', function (event) {
  var id_barang_masuk = $(event.relatedTarget).data('id_barang_masuk') 
  var no_batch = $(event.relatedTarget).data('no_batch') 
  var tgl = $(event.relatedTarget).data('tgl') 
  var id_barang = $(event.relatedTarget).data('id_barang')
  var id_suplier = $(event.relatedTarget).data('id_suplier') 
  var status = $(event.relatedTarget).data('status')
  var id_user = $(event.relatedTarget).data('id_user') 
  var qty = $(event.relatedTarget).data('qty') 


  $(this).find('#e_id_barang_masuk').val(id_barang_masuk)
  $(this).find('#e_no_batch').val(no_batch)
  $(this).find('#e_tgl').val(tgl)
  $(this).find('#e_id_barang').val(id_barang)
  $(this).find('#e_id_suplier').val(id_suplier)
  $(this).find('#e_status').val(status)
  $(this).find('#e_id_user').val(id_user)
  $(this).find('#e_qty').val(qty)
  $(this).find('#e_tgl').datepicker().on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });
})

})

</script>










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