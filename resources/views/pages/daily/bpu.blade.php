@extends('layouts.user')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h2 class="page-title"><i class="fa fa-wrench"></i> Tambah Data Perbaikan Unit Baru</h2>
      <p class="text-muted">Lengkapi data perbaikan unit anda.</p>
    </div>
    <div class="col-md-4">
      <div class="card shadow mb-4">
        <div class="card-header">
          <strong class="card-title">Tambah data baru</strong>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label>Tanggal <a class="text-danger">*</a></label>
            <input type="date" id="tgl_add" class="form-control" value="<?php echo strftime('%Y-%m-%d', strtotime($list['now'])); ?>">
            <span class="help-block"><small>Default tanggal dipilih <strong>Hari ini</strong></small></span>
          </div>
          <div class="form-group">
            <label for="simple-select2">No. Polisi & Driver <a class="text-danger">*</a></label>
            <select class="form-control select2" id="vehicle_add">
              <option value="Pilih" hidden>Pilih</option>
              @foreach($list['vehicle'] as $key => $item)
                  <option value="{{ $item->id }}" style="text-transform: uppercase"><label>{{ $item->nopol }} ({{ $item->nama }})</option>
              @endforeach
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="example-textarea">Keterangan <a class="text-danger">*</a></label>
            <textarea class="form-control" id="ket_add" rows="4" placeholder="e.g. Ganti Oli, Cek angin, dan Tambal Ban"></textarea>
          </div>
          <div class="form-group">
              <label>Jumlah <a class="text-danger">*</a></label>
              <input type="text" id="jumlah_add" maxlength="17" class="form-control" placeholder="e.g. 100xxx" required>
          </div>
          <button class="btn btn-primary float-right" onclick="tambah()"><i class="fe fe-save"></i> Submit</button>
        </div>
      </div> <!-- / .card -->
    </div>
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-header">
          <strong class="card-title">Tabel Data Perbaikan Unit</strong>
          <button type="button" class="btn btn-sm float-right" onclick="refreshTable()"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table datatables table-striped" id="tableku">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>TGL</th>
                  <th>VEHICLE</th>
                  <th>DRIVER</th>
                  <th>KET</th>
                  <th>JML</th>
                  <th>UPDATE</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="tampil-tbody"><tr><td colspan="8"><i class="fa fa-spinner fa-spin fa-fw"></i> Memproses data...</td></tr></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-ubah" role="dialog" aria-labelledby="confirmFormLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          Ubah Data Perbaikan Unit
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <input type="text" name="id" id="id_edit" hidden>
        <div class="form-group">
          <label>Tanggal <a class="text-danger">*</a></label>
          <input type="date" id="tgl_edit" class="form-control" value="<?php echo strftime('%Y-%m-%d', strtotime($list['now'])); ?>">
        </div>
        <div class="form-group">
          <label for="simple-select2">No. Polisi & Driver <a class="text-danger">*</a></label>
          <select class="form-control select2" id="vehicle_edit"></select>
        </div>
        <div class="form-group mb-3">
          <label for="example-textarea">Keterangan</label>
          <textarea class="form-control" id="ket_edit" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label>Jumlah :</label>
            <input type="text" id="jumlah_edit" maxlength="17" class="form-control" placeholder="e.g. 100xxx" required>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success text-white float-right" onclick="ubah()"><i class="fe fe-save"></i> Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-fw fa fa-close"></i> Tutup</button>
      </div>
    </div>
  </div>
</div>


{{-- SCRIPT --}}
@include('inc.script')

<script>
  $(document).ready( function () {
    $.fn.digits = function(){ 
      return this.each(function(){ 
          $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
      })
    }
    $.ajax(
      {
        url: "./bpu/table",
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
          $("#tampil-tbody").empty();
          if(res.length == 0){
          } else {
            res.forEach(item => {
              $("#tampil-tbody").append(`
                <tr id="data${item.id}">
                  <td>${item.id}</td>
                  <td>${item.tgl}</td>
                  <td>${item.nopol}</td>
                  <td>${item.nama}</td>
                  <td>${item.ket}</td>
                  <td>Rp. ${item.jml.toLocaleString().replace(/[,]/g,'.')}</td>
                  <td>${item.updated_at}</td>
                  <td>
                    <center>
                      <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="aksi${item.id}">
                        <span class="text-muted sr-only">Aksi</span>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" onclick="showUbah(${item.id})">Ubah</a>
                        <a class="dropdown-item" onclick="hapus(${item.id})">Hapus</a>
                      </div>
                    </center>
                  </td>
                </tr>
              `);
            });
              // content = "<tr id='data"+ item.id +"'><td>" + item.id + "</td><td>" 
              //   + item.nopol + "</td><td>" 
              //   + item.armada + "</td><td>"
              //   + item.updated_at + "</td>"
              //   + "<td><center><div class='btn-group' role='group'>"
              //   + "<button class='btn btn-sm dropdown-toggle more-horizontal' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><span class='text-muted sr-only'>Aksi</span></button>"
              //   + "<div class='dropdown-menu dropdown-menu-right'><a class='dropdown-item' href='./perencanaan/"+item.id+"'>Ubah</a>"
              //   + "<a class='dropdown-item' onclick='hapus("+item.id+")' >Hapus</a></div></div></center></td></tr>";
              // $('#tampil-tbody').append(content);
          }
          $('#tableku').DataTable(
            {
              paging: true,
              searching: true,
              dom: 'Bfrtip',
              buttons: [
                  'excel', 'pdf','colvis',
              ],
              'columnDefs': [
                  // { targets: 0, visible: false },
                  // { targets: 3, visible: false },
                  // { targets: 6, visible: false },
                  // { targets: 8, visible: false },
              ],
              language: {
                  buttons: {
                      colvis: 'Sembunyikan Kolom',
                      excel: 'Jadikan Excell',
                      pdf: 'Jadikan PDF',
                  }
              },
              order: [[ 6, "desc" ]],
              pageLength: 10
            }
          );
        }
      }
    );
  });
</script>

<script>
  //function
  function refreshTable() {
    $("#tampil-tbody").empty().append(`<tr><td colspan="8"><i class="fa fa-spinner fa-spin fa-fw"></i> Memproses data...</td></tr>`);
    $.ajax(
      {
        url: "./bpu/table",
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
          $("#tampil-tbody").empty();
          if(res.length == 0){
          } else {
            res.forEach(item => {
              $("#tampil-tbody").append(`
                <tr id="data${item.id}">
                  <td>${item.id}</td>
                  <td>${item.tgl}</td>
                  <td>${item.nopol}</td>
                  <td>${item.nama}</td>
                  <td>${item.ket}</td>
                  <td>${item.jml.toLocaleString().replace(/[,]/g,'.')}</td>
                  <td>${item.updated_at}</td>
                  <td>
                    <center>
                      <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Aksi</span>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" onclick="showUbah(${item.id})">Ubah</a>
                        <a class="dropdown-item" onclick="hapus(${item.id})">Hapus</a>
                      </div>
                    </center>
                  </td>
                </tr>
              `);
            });
              // content = "<tr id='data"+ item.id +"'><td>" + item.id + "</td><td>" 
              //   + item.nopol + "</td><td>" 
              //   + item.armada + "</td><td>"
              //   + item.updated_at + "</td>"
              //   + "<td><center><div class='btn-group' role='group'>"
              //   + "<button class='btn btn-sm dropdown-toggle more-horizontal' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><span class='text-muted sr-only'>Aksi</span></button>"
              //   + "<div class='dropdown-menu dropdown-menu-right'><a class='dropdown-item' href='./perencanaan/"+item.id+"'>Ubah</a>"
              //   + "<a class='dropdown-item' onclick='hapus("+item.id+")' >Hapus</a></div></div></center></td></tr>";
              // $('#tampil-tbody').append(content);
          }
          $('#tableku').DataTable();
        }
      }
    );
  }
  
  function tambah() {
    // var driver = $("#driver_add").val();
    var tgl = $("#tgl_add").val();
    var vehicle = document.getElementById("vehicle_add").value;
    var ket = $("#ket_add").val();
    var jml = $("#jumlah_add").val();
    console.log(ket);
    // $("#nopol_add").val("");
    // $("#armada_add").val("");
    if (tgl == "" || vehicle == "Pilih" || ket == "" || jml == "") {
      Swal.fire({
        title: 'Pesan Galat!',
        text: 'Mohon lengkapi semua data terlebih dahulu',
        icon: 'error',
        showConfirmButton:false,
        showCancelButton:false,
        allowOutsideClick: true,
        allowEscapeKey: true,
        timer: 3000,
        timerProgressBar: true,
        backdrop: `rgba(26,27,41,0.8)`,
      });
    } else {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: './bpu/tambah', 
        dataType: 'json', 
        data: { 
          tgl: tgl,
          vehicle: vehicle,
          ket: ket,
          jml: jml,
        }, 
        success: function(res) {
          Swal.fire({
            title: 'Tambah Data Berhasil!',
            text: 'Silakan periksa kembali data anda',
            icon: 'success',
            showConfirmButton:false,
            showCancelButton:false,
            allowOutsideClick: true,
            allowEscapeKey: true,
            timer: 3000,
            timerProgressBar: true,
            backdrop: `rgba(26,27,41,0.8)`,
          });
          if (res) {
            refreshTable();
          }
        }
      }); 
    }
  }
  
  function showUbah(id) {
    $('#modal-ubah').modal('show');
    $.ajax(
      {
        url: "./bpu/getubah/"+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
          $("#vehicle_edit").find('option').remove();
          $("#id_edit").val(res.id);
          $("#tgl_edit").val(res.tgl);
          $("#ket_edit").val(res.ket);
          // document.getElementById("ket_edit").innerHtml = res.ket;
          $("#jumlah_edit").val("Rp. "+(res.jml).toLocaleString().replace(/[,]/g,'.'));
          res.vehicle.forEach(item => {
              $("#vehicle_edit").append(`
                  <option value="${item.id}" ${item.id == res.id_vehicle? "selected":""}>${item.nopol} (${item.nama})</option>
              `);
          });
        }
      }
    );
  }

  function ubah() {
    var id = $("#id_edit").val();
    var tgl = $("#tgl_edit").val();
    var vehicle = document.getElementById("vehicle_edit").value;
    var ket = $("#ket_edit").val();
    var jml = $("#jumlah_edit").val();
    if (tgl == "" || vehicle == "Pilih" || ket == "" || jml == "") {
      Swal.fire({
        title: 'Pesan Galat!',
        text: 'Mohon lengkapi semua data terlebih dahulu',
        icon: 'error',
        showConfirmButton:false,
        showCancelButton:false,
        allowOutsideClick: true,
        allowEscapeKey: true,
        timer: 3000,
        timerProgressBar: true,
        backdrop: `rgba(26,27,41,0.8)`,
      });
    } else {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: './bpu/ubah/'+id, 
        dataType: 'json', 
        data: { 
          id: id,
          tgl: tgl,
          vehicle: vehicle,
          ket: ket,
          jml: jml,
        }, 
        success: function(res) {
          Swal.fire({
            title: 'Tambah Data Berhasil!',
            text: 'Silakan periksa kembali data anda',
            icon: 'success',
            showConfirmButton:false,
            showCancelButton:false,
            allowOutsideClick: true,
            allowEscapeKey: true,
            timer: 3000,
            timerProgressBar: true,
            backdrop: `rgba(26,27,41,0.8)`,
          });
          if (res) {
            $('#modal-ubah').modal('hide');
            refreshTable();
          }
        }
      });
    }
  }

  function hapus(id) {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: 'Untuk menghapus data Perbaikan Unit ID : '+id,
      icon: 'warning',
      reverseButtons: false,
      showDenyButton: false,
      showCloseButton: false,
      showCancelButton: true,
      focusCancel: true,
      confirmButtonColor: '#FF4845',
      confirmButtonText: `<i class="fa fa-trash"></i> Hapus`,
      cancelButtonText: `<i class="fa fa-close"></i> Close`,
      backdrop: `rgba(26,27,41,0.8)`,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "./bpu/hapus/"+id,
          type: 'GET',
          dataType: 'json', // added data type
          success: function(res) {
            Swal.fire({
              title: `Hapus Berhasil!`,
              text: 'Pada '+res,
              icon: `success`,
              showConfirmButton:false,
              showCancelButton:false,
              allowOutsideClick: true,
              allowEscapeKey: true,
              timer: 3000,
              timerProgressBar: true,
              backdrop: `rgba(26,27,41,0.8)`,
            });
            refreshTable();
          },
          error: function(res) {
            Swal.fire({
              title: `Gagal di hapus!`,
              text: 'Pada '+res,
              icon: `error`,
              showConfirmButton:false,
              showCancelButton:false,
              allowOutsideClick: true,
              allowEscapeKey: true,
              timer: 3000,
              timerProgressBar: true,
              backdrop: `rgba(26,27,41,0.8)`,
            });
          }
        }); 
      }
    })
  }
  
  // RUPIAH TAMBAH
  var rupiah_tambah = document.getElementById('jumlah_add');
  // RUPIAH EDIT
  var rupiah_edit = document.getElementById('jumlah_edit');

  if (rupiah_tambah) {
      rupiah_tambah.addEventListener('keyup', function(e){
          // tambahkan 'Rp.' pada saat form di ketik
          // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
          rupiah_tambah.value = formatRupiah(this.value, 'Rp. ');
      });
  }
  if (rupiah_edit) {
      rupiah_edit.addEventListener('keyup', function(e){
          // tambahkan 'Rp.' pada saat form di ketik
          // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
          rupiah_edit.value = formatRupiah(this.value, 'Rp. ');
      });
  }

  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split   		= number_string.split(','),
      sisa     		= split[0].length % 3,
      rupiah     		= split[0].substr(0, sisa),
      ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
</script>

@endsection