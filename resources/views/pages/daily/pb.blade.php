@extends('layouts.user')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h2 class="page-title"><i class="fe fe-life-buoy"></i> Tambah Data Pemakaian Ban Baru</h2>
      <p class="text-muted">Lengkapi data pemakaian ban anda.</p>
    </div>
    <div class="col-md-4">
      <div class="card shadow mb-4">
        <div class="card-header">
          <strong class="card-title">Tambah data baru</strong>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Kode Unit <a class="text-danger">*</a></label>
                <input type="number" id="kode_add" class="form-control" maxlength="2" max="30" autofocus oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group mb-3">
                <label for="example-month">Bulan <a class="text-danger">*</a></label>
                <input class="form-control" id="bulan_add" type="month">
              </div>
            </div>
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
          <div class="form-group">
            <label for="simple-select2">Kode Ban <a class="text-danger">*</a></label>
            <select class="form-control select2" id="ban_add">
              <option value="Pilih" hidden>Pilih</option>
              @foreach($list['ban'] as $key => $item)
                  <option value="{{ $item->id }}" style="text-transform: uppercase"><label>{{ $item->kode }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="example-textarea">Keterangan (Optional)</label>
            <textarea class="form-control" id="ket_add" rows="4" placeholder="e.g. Ganti 2 Ban Depan"></textarea>
          </div>
          <div class="form-group">
              <label>Harga Ban <a class="text-danger">*</a></label>
              <input type="text" id="harga_add" maxlength="17" class="form-control" placeholder="Rp. -" disabled>
          </div>
          <div class="form-group">
              <label>Bayar Ban</label>
              <input type="text" id="bayar_add" maxlength="17" class="form-control" placeholder="e.g. 210xxx">
          </div>
          <button class="btn btn-primary float-right" onclick="tambah()"><i class="fe fe-save"></i> Submit</button>
        </div>
      </div> <!-- / .card -->
      {{-- <div class="card shadow mb-4">
        <div class="card-body">
        </div>
      </div> --}}
    </div>
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-header">
          <strong class="card-title">Tabel Data Perbaikan Unit</strong>
          <button type="button" class="btn btn-sm float-right" onclick="refreshTable()"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
        </div>
        <div class="card-body">
          <button class="btn btn-success text-white" onclick="rekap()" disabled><i class="fe fe-server"></i> Rekap</button>
          <hr>
          <div class="table-responsive">
            <table class="table datatables table-striped" id="tableku">
              <thead>
                <tr>
                  <th></th>
                  <th>ID</th>
                  <th>BULAN</th>
                  <th>KODE UNIT</th>
                  <th>NOPOL</th>
                  <th>SOPIR</th>
                  <th>BAN</th>
                  <th>KETERANGAN</th>
                  <th>HARGA</th>
                  <th>BAYAR</th>
                  <th>UPDATE</th>
                </tr>
              </thead>
              <tbody id="tampil-tbody"><tr><td colspan="11"><i class="fa fa-spinner fa-spin fa-fw"></i> Memproses data...</td></tr></tbody>
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
        <div class="form-group mb-3">
          <label for="example-month">Bulan <a class="text-danger">*</a></label>
          <input class="form-control" id="bulan_edit" type="month">
        </div>
        <div class="form-group">
          <label>Kode Unit <a class="text-danger">*</a></label>
          <input type="number" id="kode_edit" class="form-control" placeholder="e.g. 01" maxlength="2" max="30" autofocus oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        </div>
        <div class="form-group">
          <label for="simple-select2">No. Polisi & Driver <a class="text-danger">*</a></label>
          <select class="form-control select2" id="vehicle_edit"></select>
        </div>
        <div class="form-group">
          <label for="simple-select2">Kode Ban <a class="text-danger">*</a></label>
          <select class="form-control select2" id="ban_edit"></select>
        </div>
        <div class="form-group mb-3">
          <label for="example-textarea">Keterangan (Optional)</label>
          <textarea class="form-control" id="ket_edit" rows="4" placeholder="e.g. Ganti 2 Ban Belakang"></textarea>
        </div>
        <div class="form-group">
            <label>Harga Ban <a class="text-danger">*</a></label>
            <input type="text" id="harga_edit" maxlength="17" class="form-control" placeholder="e.g. 170xxx" required>
        </div>
        <div class="form-group">
            <label>Bayar Ban</label>
            <input type="text" id="bayar_edit" maxlength="17" class="form-control" placeholder="e.g. 210xxx" required>
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
    $('#ban_add').change(function() { 
      // console.log(this.value);
      
        if (this.value == 'Pilih') {
          $("#harga_add").val("");
        } else {
          $.ajax({
            url: "./pb/getban/"+this.value,
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
              var harga = res.harga.toLocaleString().replace(/[,]/g,'.')
              $("#harga_add").val("Rp. "+harga);
              // document.getElementById('harga_add').value = formatRupiah(res.harga, 'Rp. ');
              // rupiah_harga.value = formatRupiah(this.value, 'Rp. ');

              // if (rupiah_harga) {
              //   rupiah_harga.addEventListener('keyup', function(e){
              //         // tambahkan 'Rp.' pada saat form di ketik
              //         // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
              //         rupiah_harga.value = formatRupiah(this.value, 'Rp. ');
              //     });
              // }
            }
          });
        }
      });
    $.ajax(
      {
        url: "./pb/table",
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
          $("#tampil-tbody").empty();
          if(res.length == 0){
          } else {
            res.forEach(item => {
              $("#tampil-tbody").append(`
                <tr id="data${item.id}">
                  <td>
                    <center>
                      <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="aksi${item.id}">
                        <span class="text-muted sr-only">Aksi</span>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item" onclick="showUbah(${item.id})">Ubah</a>
                        <a href="#" class="dropdown-item" onclick="hapus(${item.id})">Hapus</a>
                      </div>
                    </center>
                  </td>
                  <td>${item.id}</td>
                  <td>${item.bulan}</td>
                  <td>${item.kode_unit}</td>
                  <td>${item.nopol}</td>
                  <td>${item.driver}</td>
                  <td>${item.ban}</td>
                  <td>${item.ket}</td>
                  <td>Rp. ${item.harga.toLocaleString().replace(/[,]/g,'.')}</td>
                  <td>Rp. ${item.bayar.toLocaleString().replace(/[,]/g,'.')}</td>
                  <td>${item.updated_at}</td>
                </tr>
              `);
            });
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
                  { targets: 1, visible: false },
                  // { targets: 3, visible: false },
                  { targets: 7, visible: false },
                  // { targets: 8, visible: false },
              ],
              language: {
                  buttons: {
                      colvis: 'Sembunyikan Kolom',
                      excel: 'Jadikan Excell',
                      pdf: 'Jadikan PDF',
                  }
              },
              order: [[ 9, "desc" ]],
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
        url: "./pb/table",
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
          $("#tampil-tbody").empty();
          $('#tableku').DataTable().clear().destroy();
          if(res.length == 0){
          } else {
            res.forEach(item => {
              $("#tampil-tbody").append(`
                <tr id="data${item.id}">
                  <td>
                    <center>
                      <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="aksi${item.id}">
                        <span class="text-muted sr-only">Aksi</span>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item" onclick="showUbah(${item.id})">Ubah</a>
                        <a href="#" class="dropdown-item" onclick="hapus(${item.id})">Hapus</a>
                      </div>
                    </center>
                  </td>
                  <td>${item.id}</td>
                  <td>${item.bulan}</td>
                  <td>${item.kode_unit}</td>
                  <td>${item.nopol}</td>
                  <td>${item.driver}</td>
                  <td>${item.ban}</td>
                  <td>${item.ket}</td>
                  <td>Rp. ${item.harga.toLocaleString().replace(/[,]/g,'.')}</td>
                  <td>Rp. ${item.bayar.toLocaleString().replace(/[,]/g,'.')}</td>
                  <td>${item.updated_at}</td>
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
                  { targets: 1, visible: false },
                  // { targets: 3, visible: false },
                  { targets: 7, visible: false },
                  // { targets: 8, visible: false },
              ],
              language: {
                  buttons: {
                      colvis: 'Sembunyikan Kolom',
                      excel: 'Jadikan Excell',
                      pdf: 'Jadikan PDF',
                  }
              },
              order: [[ 9, "desc" ]],
              pageLength: 10
            }
          );
          // $('#tableku').DataTable();
        }
      }
    );
  }
  
  function tambah() {
    var bulan   = $("#bulan_add").val();
    var kode    = $("#kode_add").val();
    var vehicle = document.getElementById("vehicle_add").value;
    var ban     = document.getElementById("ban_add").value;
    var ket     = $("#ket_add").val();
    var harga   = $("#harga_add").val();
    var bayar   = $("#bayar_add").val();
    // console.log(ket);
    if (bulan == "" || kode == "" || vehicle == "Pilih" || ban == "Pilih" || harga == "") {
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
        url: './pb/tambah', 
        dataType: 'json', 
        data: { 
          bulan: bulan,
          kode: kode,
          vehicle: vehicle,
          ban: ban,
          ket: ket,
          harga: harga,
          bayar: bayar,
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
        url: "./pb/getubah/"+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
          
    // var bulan   = $("#bulan_add").val();
    // var kode    = $("#kode_add").val();
    // var vehicle = document.getElementById("vehicle_add").value;
    // var ban     = document.getElementById("ban_add").value;
    // var ket     = $("#ket_add").val();
    // var harga   = $("#harga_add").val();
    // var bayar   = $("#bayar_add").val();
    
          $("#vehicle_edit").find('option').remove();
          $("#ban_edit").find('option').remove();
          $("#id_edit").val(res.id);
          $("#bulan_edit").val(res.bulan);
          $("#kode_edit").val(res.show.kode_unit.replace(/[IRM]/g,''));
          $("#ket_edit").val(res.show.ket);
          // document.getElementById("ket_edit").innerHtml = res.ket;
          $("#harga_edit").val("Rp. "+(res.show.harga).toLocaleString().replace(/[,]/g,'.'));
          $("#bayar_edit").val("Rp. "+(res.show.bayar).toLocaleString().replace(/[,]/g,'.'));
          res.vehicle.forEach(item => {
              $("#vehicle_edit").append(`
                  <option value="${item.id}" ${item.id == res.show.id_vehicle? "selected":""}>${item.nopol} (${item.nama})</option>
              `);
          });
          res.ban.forEach(item => {
              $("#ban_edit").append(`
                  <option value="${item.id}" ${item.id == res.show.id_ban? "selected":""}>${item.kode}</option>
              `);
          });
        }
      }
    );
  }

  function ubah() {
    var id = $("#id_edit").val();
    var bulan   = $("#bulan_edit").val();
    var kode    = $("#kode_edit").val();
    var vehicle = document.getElementById("vehicle_edit").value;
    var ban     = document.getElementById("ban_edit").value;
    var ket     = $("#ket_edit").val();
    var harga   = $("#harga_edit").val();
    var bayar   = $("#bayar_edit").val();
    if (bulan == "" || kode == "" || vehicle == "Pilih" || ban == "Pilih" || harga == "") {
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
        url: './pb/ubah/'+id, 
        dataType: 'json', 
        data: { 
          id: id,
          bulan: bulan,
          kode: kode,
          vehicle: vehicle,
          ban: ban,
          ket: ket,
          harga: harga,
          bayar: bayar,
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
      text: 'Untuk menghapus data Pemakaian Ban ID : '+id,
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
          url: "./pb/hapus/"+id,
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
  var rupiah_tambah_harga = document.getElementById('harga_add');
  var rupiah_tambah_bayar = document.getElementById('bayar_add');
  // RUPIAH EDIT
  var rupiah_edit_harga = document.getElementById('harga_edit');
  var rupiah_edit_bayar = document.getElementById('bayar_edit');

  if (rupiah_tambah_harga) {
      rupiah_tambah_harga.addEventListener('keyup', function(e){
          // tambahkan 'Rp.' pada saat form di ketik
          // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
          rupiah_tambah_harga.value = formatRupiah(this.value, 'Rp. ');
      });
  }
  if (rupiah_tambah_bayar) {
      rupiah_tambah_bayar.addEventListener('keyup', function(e){
          // tambahkan 'Rp.' pada saat form di ketik
          // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
          rupiah_tambah_bayar.value = formatRupiah(this.value, 'Rp. ');
      });
  }
  if (rupiah_edit_harga) {
      rupiah_edit_harga.addEventListener('keyup', function(e){
          // tambahkan 'Rp.' pada saat form di ketik
          // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
          rupiah_edit_harga.value = formatRupiah(this.value, 'Rp. ');
      });
  }
  if (rupiah_edit_bayar) {
      rupiah_edit_bayar.addEventListener('keyup', function(e){
          // tambahkan 'Rp.' pada saat form di ketik
          // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
          rupiah_edit_bayar.value = formatRupiah(this.value, 'Rp. ');
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