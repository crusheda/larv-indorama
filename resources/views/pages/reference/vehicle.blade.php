@extends('layouts.user')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h2 class="page-title"><i class="fe fe-truck"></i> Tambah Unit Armada Baru</h2>
      <p class="text-muted">Lengkapi data unit armada anda.</p>
    </div>
    <div class="col-md-4">
      <div class="card shadow mb-4">
        <div class="card-header">
          <strong class="card-title">Tambah data baru</strong>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="simple-select2">Driver <a class="text-danger">*</a></label>
            <select class="form-control select2" id="driver_add">
              <option value="Pilih" hidden>Pilih</option>
              @foreach($list['driver'] as $key => $item)
                  <option value="{{ $item->id }}" style="text-transform: uppercase"><label>{{ $item->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>No. Polisi <a class="text-danger">*</a></label>
            <input type="text" id="nopol_add" class="form-control" placeholder="e.g. KH 1234 XX" required>
          </div>
          <div class="form-group">
            <label>Merk</label>
            <input type="text" name="armada" id="armada_add" class="form-control" placeholder="e.g. Canter">
          </div>
          <div class="form-group">
            <label>Jenis</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="jenis_add" id="jenis1" value="1" checked>
              <label class="form-check-label" for="jenis1">IRM</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="jenis_add" id="jenis2" value="2">
              <label class="form-check-label" for="jenis2">Rental</label>
            </div>
          </div>
          <button class="btn btn-primary float-right" onclick="tambah()"><i class="fe fe-save"></i> Submit</button>
        </div>
      </div> <!-- / .card -->
    </div>
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-header">
          <strong class="card-title">Tabel Unit Armada</strong>
          <button type="button" class="btn btn-sm float-right" onclick="refreshTable()"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table datatables table-striped" id="tableku">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>DRIVER</th>
                  <th>NOPOL</th>
                  <th>ARMADA</th>
                  <th>JENIS</th>
                  <th>UPDATE</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="tampil-tbody"><tr><td colspan="7"><i class="fa fa-spinner fa-spin fa-fw"></i> Memproses data...</td></tr></tbody>
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
          Ubah Data Kendaraan
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <input type="text" name="id" id="id_edit" hidden>
        <div class="form-group">
          <label for="simple-select2">Driver <a class="text-danger">*</a></label>
          <select class="form-control select2" id="driver_edit"></select>
        </div>
        <div class="form-group">
          <label>No. Polisi <a class="text-danger">*</a></label>
          <input type="text" id="nopol_edit" value="" class="form-control" placeholder="e.g. KH 1234 XX" required autofocus>
        </div>
        <div class="form-group">
          <label>Merk</label>
          <input type="text" name="armada" id="armada_edit" value="" class="form-control" placeholder="e.g. Canter">
        </div>
        <div class="form-group">
          <label>Jenis</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis_edit" id="jenis3" value="1">
            <label class="form-check-label" for="jenis3">IRM</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis_edit" id="jenis4" value="2">
            <label class="form-check-label" for="jenis4">Rental</label>
          </div>
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
    
    $.ajax(
      {
        url: "./vehicle/table",
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
                  <td>${item.nama}</td>
                  <td>${item.nopol}</td>
                  <td>${item.armada? item.armada : "" }</td>
                  <td>${item.jenis == '1'? "IRM" : "Rental"}</td>
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
              select: {
                  style: 'single'
              },
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
              order: [[ 5, "desc" ]],
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
    $("#tampil-tbody").empty().append(`<tr><td colspan="7"><i class="fa fa-spinner fa-spin fa-fw"></i> Memproses data...</td></tr>`);
    $.ajax(
      {
        url: "./vehicle/table",
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
                  <td>${item.nama}</td>
                  <td>${item.nopol}</td>
                  <td>${item.armada? item.armada : "" }</td>
                  <td>${item.jenis == '1'? "IRM" : "Rental"}</td>
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
    var driver = document.getElementById("driver_add").value;
    var nopol = $("#nopol_add").val();
    var armada = $("#armada_add").val();
    var jenis = $('input[type="radio"][name="jenis_add"]:checked').val();
    // $("#nopol_add").val("");
    // $("#armada_add").val("");
    if (nopol == "" || driver == "Pilih") {
      Swal.fire({
        title: 'Pesan Galat!',
        text: 'Nomor Polisi / Driver wajib diisi.',
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
        url: './vehicle/tambah', 
        dataType: 'json', 
        data: { 
          driver: driver,
          nopol: nopol,
          armada: armada,
          jenis: jenis,
        }, 
        success: function(res) {
          Swal.fire({
            title: 'Tambah Data Berhasil!',
            text: 'Silakan periksa kembali data anda',
            icon: 'success',
            showConfirmButton:false,
            showCancelButton:false,
            allowOutsideClick: false,
            allowEscapeKey: false,
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
        url: "./vehicle/getubah/"+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
          $("#driver_edit").find('option').remove();
          $("#id_edit").val(res.id);
          $("#nopol_edit").val(res.nopol);
          console.log(res.jenis)
          if (res.jenis == 1) {
            $("#jenis3").prop('checked', true)
          } else {
            $("#jenis4").prop('checked', true)
            
          }
          $("#armada_edit").val(res.armada);
          res.driver.forEach(item => {
              $("#driver_edit").append(`
                  <option value="${item.id}" ${item.id == res.id_driver? "selected":""}>${item.nama}</option>
              `);
          });
        }
      }
    );
  }

  function ubah() {
    var id = $("#id_edit").val();
    // var driver = $("#driver_edit").val();
    var driver = document.getElementById("driver_edit").value;
    var nopol = $("#nopol_edit").val();
    var armada = $("#armada_edit").val();
    var jenis = $('input[type="radio"][name="jenis_edit"]:checked').val();
    
    if (nopol == "" || driver == "Pilih") {
      Swal.fire({
        title: 'Pesan Galat!',
        text: 'Nomor Polisi / Driver wajib diisi.',
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
        url: './vehicle/ubah/'+id, 
        dataType: 'json', 
        data: { 
          id: id,
          driver: driver,
          nopol: nopol,
          armada: armada,
          jenis: jenis,
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
      text: 'Untuk menghapus NOPOL Armada ID : '+id,
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
          url: "./vehicle/hapus/"+id,
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
</script>

@endsection