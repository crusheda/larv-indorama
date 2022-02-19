@extends('layouts.user')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h2 class="page-title"><i class="fa fa-legal"></i> Tambah Data Resume SPK Baru</h2>
      <p class="text-muted">Lengkapi data resume SPK anda.</p>
    </div>
    <div class="accordion w-100" id="accordion1">
      <div class="card shadow">
        <div class="card-header" id="heading1">
          <a role="button" href="#collapse1" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
            <i class="fe fe-chevron-down"></i>&nbsp;&nbsp;<strong>Tambah data baru</strong>
          </a>
          {{-- <div class="custom-control custom-switch float-right">
            <input type="checkbox" class="custom-control-input" id="lain1" onclick="lainnya()">
            <label class="custom-control-label" for="lain1">Lainnya</label>
          </div> --}}
          <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion1">
        </div>
          <div class="col-md-12">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group mb-3">
                    <label for="example-month">Bulan <a class="text-danger">*</a></label>
                    <input class="form-control" id="bulan_add" type="month">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="simple-select2">Pelanggan <a class="text-danger">*</a></label>
                    <select class="form-control select2" id="customer_add">
                      <option value="Pilih" hidden>Pilih</option>
                      @foreach($list['customer'] as $key => $item)
                          <option value="{{ $item->id }}" style="text-transform: uppercase"><label>{{ $item->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>No. Inv</label>
                    <input type="text" name="nama" id="inv_add" class="form-control" placeholder="e.g. Sunaryo" autofocus>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Tonase Tagihan <a class="text-danger">*</a></label>
                      <input type="text" id="tonase_add" maxlength="17" class="form-control" placeholder="e.g. 100xxx">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Harga Armada <a class="text-danger">*</a></label>
                      <input type="text" id="harga_arm_add" maxlength="17" class="form-control" placeholder="e.g. 100xxx">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Total Biaya</label>
                      <input type="text" id="total_biaya_add" maxlength="17" class="form-control" placeholder="Rp. -" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Fee Management</label>
                      <input type="text" id="fee_mgmt_add" maxlength="17" class="form-control" placeholder="Rp. -" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Entertainer <a class="text-danger">*</a></label>
                      <input type="text" id="entertainer_add" maxlength="17" class="form-control" placeholder="e.g. 100xxx">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Susut <a class="text-danger">*</a></label>
                      <input type="text" id="susut_add" maxlength="17" class="form-control" placeholder="e.g. 100xxx">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Deduction BBM <a class="text-danger">*</a></label>
                      <input type="text" id="deduction_bbm_add" maxlength="17" class="form-control" placeholder="e.g. 100xxx">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Pengalihan Rute <a class="text-danger">*</a></label>
                      <input type="text" id="pengalihan_rute_add" maxlength="17" class="form-control" placeholder="e.g. 100xxx">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Harga SPK <a class="text-danger">*</a></label>
                      <input type="text" id="harga_spk_add" maxlength="17" class="form-control" placeholder="e.g. 100xxx">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Jasa Pelabuhan <a class="text-danger">*</a></label>
                      <input type="text" id="jasa_pelabuhan_add" maxlength="17" class="form-control" placeholder="e.g. 100xxx">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Jasa Timbangan <a class="text-danger">*</a></label>
                      <input type="text" id="jasa_timbangan_add" maxlength="17" class="form-control" placeholder="e.g. 100xxx">
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <label>DPP</label>
                      <input type="text" id="dpp_add" maxlength="17" class="form-control" placeholder="Rp. -" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>PPN</label>
                      <input type="text" id="ppn_add" maxlength="17" class="form-control" placeholder="Rp. -" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>PPH</label>
                      <input type="text" id="pph_add" maxlength="17" class="form-control" placeholder="Rp. -" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Total Inv</label>
                      <input type="text" id="total_inv_add" maxlength="17" class="form-control" placeholder="Rp. -" readonly>
                  </div>
                </div>
              </div>
              <button class="btn btn-success float-left mb-3 text-white" id="hitung_add" onclick="hitung()"><i class="fa fa-calculator"></i> Hitung</button>
              <button class="btn btn-primary float-right mb-3" id="submit_add" onclick="tambah()" disabled><i class="fe fe-save"></i> Submit</button>
            </div>
          </div>
        </div>
      </div>
      <div class="card shadow">
        <div class="card-header" id="heading1">
          <a role="button" href="#collapse2" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
            <i class="fe fe-chevron-down"></i>&nbsp;&nbsp;<strong>Tabel Data Resume SPK</strong>
          </a>
        </div>
        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion1">
          <div class="col-md-12">
            <div class="card-body">
              <div class="button-group">
                <button class="btn btn-success text-white" onclick="pembayaran()" disabled><i class="fe fe-server"></i> Rekap Pembayaran</button>
                <button type="button" class="btn btn-sm float-right" onclick="refreshTable()"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
              </div>
              <hr>
              <div class="table-responsive">
                <table class="table datatables table-striped" id="tableku" style="width: 100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>INV</th>
                      <th>BLN</th>
                      <th>PELANGGAN</th>
                      <th>TONASE</th>
                      <th>HARGA ARM</th>
                      <th>TOTAL BIAYA</th>
                      <th>FEE MGMT</th>
                      <th>ENTERTAINER</th>
                      <th>SUSUT</th>
                      <th>JASA PELABUHAN</th>
                      <th>JASA TIMBANGAN</th>
                      <th>DEDUCTION BBM</th>
                      <th>PENGALIHAN RUTE</th>
                      <th>HARGA SPK</th>
                      <th>DPP</th>
                      <th>PPN</th>
                      <th>PPH</th>
                      <th>TOTAL INV</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody id="tampil-tbody"><tr><td colspan="15"><i class="fa fa-spinner fa-spin fa-fw"></i> Memproses data...</td></tr></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- SCRIPT --}}
@include('inc.script')

<script>
  $(document).ready( function () {
    // $('#modal-ubah').modal('show');
    // $("body").addClass('collapsed');
    $.fn.digits = function(){ 
      return this.each(function(){ 
          $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
      })
    }
    // $('#bpu_ket_add').keydown(function () {
    //   var len = $(this).val().length;
    //     if (len >= 1) {
    //       $('#bpu_jumlah_add').prop('disabled', false);
    //     } else {
    //       $('#bpu_jumlah_add').prop('disabled', true).val('');
    //     }
    // });
    // $('#bpu_ket_edit').keydown(function () {
    //   var len = $(this).val().length;
    //     if (len >= 1) {
    //       $('#bpu_jumlah_edit').prop('disabled', false);
    //     } else {
    //       $('#bpu_jumlah_edit').prop('disabled', true).val('');
    //     }
    // });
    $.ajax(
      {
        url: "./resume/table",
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
                  <td>${item.nopol} (${item.nama})</td>
                  <td>${item.pks ? item.lokasi_pks : '-'} / ${item.tujuan ? item.lokasi_tujuan : '-'} (Rp. ${item.ongkos.toLocaleString().replace(/[,]/g,'.')})</td>
                  <td>${item.lainnya}</td>
                  <td>Rp. ${item.t_muat ? item.t_muat.toLocaleString().replace(/[,]/g,'.') : '-'} / Rp. ${item.t_bongkar ? item.t_bongkar.toLocaleString().replace(/[,]/g,'.') : '-'} (${item.susut})</td>
                  <td>Rp. ${item.bbm_perliter.toLocaleString().replace(/[,]/g,'.')} x ${item.bbm_liter}L</td>
                  <td>Rp. ${item.bbm_rp.toLocaleString().replace(/[,]/g,'.')}</td>
                  <td>Rp. ${item.uang_makan.toLocaleString().replace(/[,]/g,'.')}</td>
                  <td>${item.bpu_ket}</td>
                  <td>Rp. ${item.bpu_rp.toLocaleString().replace(/[,]/g,'.')}</td>
                  <td><b>Rp. ${item.kotor.toLocaleString().replace(/[,]/g,'.')}</b></td>
                  <td><b>Rp. ${item.bersih.toLocaleString().replace(/[,]/g,'.')}</b></td>
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
                  { targets: 0, visible: false },
                  { targets: 4, visible: false },
                  { targets: 6, visible: false },
                  { targets: 9, visible: false },
              ],
              language: {
                  buttons: {
                      colvis: 'Sembunyikan Kolom',
                      excel: 'Jadikan Excell',
                      pdf: 'Jadikan PDF',
                  }
              },
              order: [[ 13, "desc" ]],
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
  function hitung() {
    // const ongkos = parseInt($('#ongkos_add').val().replace(/[Rp. ]/g,''));
    var tonase = parseInt($('#tonase_add').val().replace(/[Rp. ]/g,''));
    var harga_arm = parseInt($('#harga_arm_add').val().replace(/[Rp. ]/g,''));

    // HITUNG KOTOR
    // if (isNaN(ongkos) == false && isNaN(t_bongkar) == false) {
    //   var kotor = ongkos * t_bongkar;
    // } else {
    //   var kotor = 0;
    // }
    // $('#kotor_add').val("Rp. "+(kotor).toLocaleString().replace(/[,]/g,'.'));

    // HITUNG BERSIH
    if (isNaN(tonase) == true)  { toanse = 0; }
    if (isNaN(harga_arm) == true) { harga_arm = 0; }

    var total_biaya = tonase * harga_arm;
    $('#total_biaya_add').val("Rp. "+(total_biaya).toLocaleString().replace(/[,]/g,'.'));

    // if (bersih == 0) {
    //   $('#submit_add').prop('disabled', true);
    //   Swal.fire({
    //     title: 'Hitung Gagal!',
    //     text: 'Silakan periksa kembali Nominal anda',
    //     icon: 'warning',
    //     showConfirmButton:false,
    //     showCancelButton:false,
    //     allowOutsideClick: true,
    //     allowEscapeKey: true,
    //     timer: 3000,
    //     timerProgressBar: true,
    //     backdrop: `rgba(26,27,41,0.8)`,
    //   });
    // } else {
    //   $('#submit_add').prop('disabled', false);
    // }
  }
  function hitung_edit() {
    const ongkos = parseInt($('#ongkos_edit').val().replace(/[Rp. ]/g,''));
    const t_bongkar = parseInt($('#t_bongkar_edit').val().replace(/[Rp. ]/g,''));
    var bbm_harga = parseInt($('#bbm_harga_edit').val().replace(/[Rp. ]/g,''));
    var uang_makan = parseInt($('#uang_makan_edit').val().replace(/[Rp. ]/g,''));
    var bpu_jumlah = parseInt($('#bpu_jumlah_edit').val().replace(/[Rp. ]/g,''));
    var bbm_jumlah = parseInt($('#bbm_jumlah_edit').val());

    // HITUNG KOTOR
    if (isNaN(ongkos) == false && isNaN(t_bongkar) == false) {
      var kotor = ongkos * t_bongkar;
    } else {
      var kotor = 0;
    }
    $('#kotor_edit').val("Rp. "+(kotor).toLocaleString().replace(/[,]/g,'.'));

    // HITUNG BERSIH
    if (isNaN(bbm_harga) == true)  { bbm_harga = 0; }
    if (isNaN(bbm_jumlah) == true) { bbm_jumlah = 0; }
    if (isNaN(uang_makan) == true) { uang_makan = 0; }
    if (isNaN(bpu_jumlah) == true) { bpu_jumlah = 0; }

    var bersih = kotor - ((bbm_harga * bbm_jumlah) + uang_makan + bpu_jumlah);
    $('#bersih_edit').val("Rp. "+(bersih).toLocaleString().replace(/[,]/g,'.'));

    if (bersih == 0) {
      $('#submit_edit').prop('disabled', true);
      $('#hitung_klik').prop('hidden', false);
      Swal.fire({
        title: 'Hitung Gagal!',
        text: 'Silakan periksa kembali Nominal anda',
        icon: 'warning',
        showConfirmButton:false,
        showCancelButton:false,
        allowOutsideClick: true,
        allowEscapeKey: true,
        timer: 3000,
        timerProgressBar: true,
        backdrop: `rgba(26,27,41,0.8)`,
      });
    } else {
      $('#submit_edit').prop('disabled', false);
      $('#hitung_klik').prop('hidden', true);
    }
  }
  function lainnya() { // Slide Lainnya
    if ($('#lain1').is(':checked')) {
      $('#pks_hidden').prop('hidden', true); 
      $('#tujuan_hidden').prop('hidden', true); 
      $('#ongkos_hidden').prop('hidden', true); 
      $('#ket_hidden').prop('hidden', false);
      $('#t_muat_add').prop('disabled', true).val(''); 
      $('#t_bongkar_add').prop('disabled', true).val('');
      $('#pks_add').val('');
      $('#tujuan_add').val('');
      $('#ongkos_add').val('');
    } else {
      $('#pks_hidden').prop('hidden', false); 
      $('#tujuan_hidden').prop('hidden', false); 
      $('#ongkos_hidden').prop('hidden', false); 
      $('#ket_hidden').prop('hidden', true);
      $('#t_muat_add').prop('disabled', false); 
      $('#t_bongkar_add').prop('disabled', false); 
      $('#kotor_add').prop('disabled', false); 
      $('#lainnya_add').val('');
    }
  }
  function lainnya_edit() { // Slide Lainnya
    if ($('#lain2').is(':checked')) {
      $('#pks_hidden_edit').prop('hidden', true); 
      $('#tujuan_hidden_edit').prop('hidden', true); 
      $('#ongkos_hidden_edit').prop('hidden', true); 
      $('#ket_hidden_edit').prop('hidden', false);
      $('#t_muat_edit').prop('disabled', true).val(''); 
      $('#t_bongkar_edit').prop('disabled', true).val('');
      $('#pks_edit').val('');
      $('#tujuan_edit').val('');
      $('#ongkos_edit').val('');
    } else {
      $('#pks_hidden_edit').prop('hidden', false); 
      $('#tujuan_hidden_edit').prop('hidden', false); 
      $('#ongkos_hidden_edit').prop('hidden', false); 
      $('#ket_hidden_edit').prop('hidden', true);
      $('#t_muat_edit').prop('disabled', false); 
      $('#t_bongkar_edit').prop('disabled', false); 
      $('#kotor_edit').prop('disabled', false); 
      $('#lainnya_edit').val('');
    }
  }
  function refreshTable() {
    $("#tampil-tbody").empty().append(`<tr><td colspan="8"><i class="fa fa-spinner fa-spin fa-fw"></i> Memproses data...</td></tr>`);
    $.ajax(
      {
        url: "./pu/table",
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
                  <td>${item.id}</td>
                  <td>${item.tgl}</td>
                  <td>${item.nopol} (${item.nama})</td>
                  <td>${item.pks ? item.lokasi_pks : '-'} / ${item.tujuan ? item.lokasi_tujuan : '-'} (Rp. ${item.ongkos.toLocaleString().replace(/[,]/g,'.')})</td>
                  <td>${item.lainnya}</td>
                  <td>Rp. ${item.t_muat ? item.t_muat.toLocaleString().replace(/[,]/g,'.') : '-'} / Rp. ${item.t_bongkar ? item.t_bongkar.toLocaleString().replace(/[,]/g,'.') : '-'} (${item.susut})</td>
                  <td>Rp. ${item.bbm_perliter.toLocaleString().replace(/[,]/g,'.')} x ${item.bbm_liter}L</td>
                  <td>Rp. ${item.bbm_rp.toLocaleString().replace(/[,]/g,'.')}</td>
                  <td>Rp. ${item.uang_makan.toLocaleString().replace(/[,]/g,'.')}</td>
                  <td>${item.bpu_ket}</td>
                  <td>Rp. ${item.bpu_rp.toLocaleString().replace(/[,]/g,'.')}</td>
                  <td><b>Rp. ${item.kotor.toLocaleString().replace(/[,]/g,'.')}</b></td>
                  <td><b>Rp. ${item.bersih.toLocaleString().replace(/[,]/g,'.')}</b></td>
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
                  { targets: 0, visible: false },
                  { targets: 4, visible: false },
                  { targets: 6, visible: false },
                  { targets: 9, visible: false },
              ],
              language: {
                  buttons: {
                      colvis: 'Sembunyikan Kolom',
                      excel: 'Jadikan Excell',
                      pdf: 'Jadikan PDF',
                  }
              },
              order: [[ 13, "desc" ]],
              pageLength: 10
            }
          );
        }
      }
    );
  }
  
  function tambah() {
    var tgl = $("#tgl_add").val();
    var vehicle = document.getElementById("vehicle_add").value;
    var bbm_harga = $("#bbm_harga_add").val();
    var bbm_jumlah = $("#bbm_jumlah_add").val();
    var uang_makan = $("#uang_makan_add").val();
    var bpu_ket = $("#bpu_ket_add").val();
    var bpu_jumlah = $("#bpu_jumlah_add").val();
    var kotor = $("#kotor_add").val();
    var bersih = $("#bersih_add").val();
    
    if ($('#lain1').is(':checked')) {
      var lainnya = $("#lainnya_add").val();

      if (tgl == "" || vehicle == "Pilih" || lainnya == "") {
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
        if (kotor == "Rp. -" || bersih == "Rp. -") {
          Swal.fire({
            title: 'Pesan Galat!',
            text: 'Klik Hitung terlebih dahulu untuk melanjutkan Submit Data',
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
            url: './pu/tambah', 
            dataType: 'json', 
            data: { 
              tgl: tgl,
              vehicle: vehicle,
              // pks: pks,
              // tujuan: tujuan,
              // ongkos: ongkos,
              lainnya: lainnya,
              // t_muat: t_muat,
              // t_bongkar: t_bongkar,
              bbm_harga: bbm_harga,
              bbm_jumlah: bbm_jumlah,
              uang_makan: uang_makan,
              bpu_ket: bpu_ket,
              bpu_jumlah: bpu_jumlah,
              kotor: kotor,
              bersih: bersih,
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
    } else {
      var pks = $("#pks_add").val();
      var tujuan = $("#tujuan_add").val();
      var ongkos = $("#ongkos_add").val();
      var t_muat = $("#t_muat_add").val();
      var t_bongkar = $("#t_bongkar_add").val();
      
      if (tgl == "" || vehicle == "Pilih" || pks == "" || tujuan == "" || ongkos == "" || t_muat == "" || t_bongkar == "") {
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
        if (kotor == "Rp. -" || bersih == "Rp. -") {
          Swal.fire({
            title: 'Pesan Galat!',
            text: 'Klik Hitung terlebih dahulu untuk melanjutkan Submit Data',
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
            url: './pu/tambah', 
            dataType: 'json', 
            data: { 
              tgl: tgl,
              vehicle: vehicle,
              pks: pks,
              tujuan: tujuan,
              ongkos: ongkos,
              // lainnya: lainnya,
              t_muat: t_muat,
              t_bongkar: t_bongkar,
              bbm_harga: bbm_harga,
              bbm_jumlah: bbm_jumlah,
              uang_makan: uang_makan,
              bpu_ket: bpu_ket,
              bpu_jumlah: bpu_jumlah,
              kotor: kotor,
              bersih: bersih,
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
    }
  }
  
  function showUbah(id) {
    $('#modal-ubah').modal('show');
    $.ajax(
      {
        url: "./pu/getubah/"+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
          $("#id_edit").val(res.id);
          $("#tgl_edit").val(res.tgl);
          $("#bbm_harga_edit").val("Rp. "+(res.bbm_harga).toLocaleString().replace(/[,]/g,'.'));
          $("#bbm_jumlah_edit").val(res.bbm_jumlah);
          $("#uang_makan_edit").val("Rp. "+(res.uang_makan).toLocaleString().replace(/[,]/g,'.'));
          $("#bpu_ket_edit").val(res.bpu_ket);
          $("#bpu_jumlah_edit").val("Rp. "+(res.bpu_jumlah).toLocaleString().replace(/[,]/g,'.'));
          $("#kotor_edit").val("Rp. "+(res.kotor).toLocaleString().replace(/[,]/g,'.'));
          $("#bersih_edit").val("Rp. "+(res.bersih).toLocaleString().replace(/[,]/g,'.'));

          $("#vehicle_edit").find('option').remove();
          res.vehicle.forEach(item => {
              $("#vehicle_edit").append(`
                  <option value="${item.id}" ${item.id == res.vehicle? "selected":""}>${item.nopol} (${item.nama})</option>
              `);
          });

          if (res.ongkos == null) {
            $("#lainnya_edit").val(res.lainnya);
          } else {
            $("#pks_edit").find('option').remove();
            res.destination.forEach(item => {
                $("#pks_edit").append(`
                    <option value="${item.id}" ${item.id == res.pks? "selected":""}>${item.lokasi}</option>
                `);
            });
            $("#tujuan_edit").find('option').remove();
            res.destination.forEach(item => {
                $("#tujuan_edit").append(`
                    <option value="${item.id}" ${item.id == res.tujuan? "selected":""}>${item.lokasi}</option>
                `);
            });
            $("#ongkos_edit").val("Rp. "+(res.ongkos).toLocaleString().replace(/[,]/g,'.'));
            $("#t_muat_edit").val("Rp. "+(res.t_muat).toLocaleString().replace(/[,]/g,'.'));
            $("#t_bongkar_edit").val("Rp. "+(res.t_bongkar).toLocaleString().replace(/[,]/g,'.'));
          }
        }
      }
    );
  }

  function ubah() {
    var id = $("#id_edit").val();
    var tgl = $("#tgl_edit").val();
    var vehicle = document.getElementById("vehicle_edit").value;
    var bbm_harga = $("#bbm_harga_edit").val();
    var bbm_jumlah = $("#bbm_jumlah_edit").val();
    var uang_makan = $("#uang_makan_edit").val();
    var bpu_ket = $("#bpu_ket_edit").val();
    var bpu_jumlah = $("#bpu_jumlah_edit").val();
    var kotor = $("#kotor_edit").val();
    var bersih = $("#bersih_edit").val();

    if ($('#lain1').is(':checked')) {
    var lainnya = $("#lainnya_edit").val();

      if (tgl == "" || vehicle == "Pilih" || lainnya == "") {
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
        if (kotor == "Rp. -" || bersih == "Rp. -") {
          Swal.fire({
            title: 'Pesan Galat!',
            text: 'Klik Hitung terlebih dahulu untuk melanjutkan Submit Data',
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
            url: './pu/ubah/'+id, 
            dataType: 'json', 
            data: { 
              id: id,
              tgl: tgl,
              vehicle: vehicle,
              // pks: pks,
              // tujuan: tujuan,
              // ongkos: ongkos,
              lainnya: lainnya,
              // t_muat: t_muat,
              // t_bongkar: t_bongkar,
              bbm_harga: bbm_harga,
              bbm_jumlah: bbm_jumlah,
              uang_makan: uang_makan,
              bpu_ket: bpu_ket,
              bpu_jumlah: bpu_jumlah,
              kotor: kotor,
              bersih: bersih,
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
    } else {
      var pks = document.getElementById("pks_edit").value;
      var tujuan = document.getElementById("tujuan_edit").value;
      var ongkos = $("#ongkos_edit").val();
      var t_muat = $("#t_muat_edit").val();
      var t_bongkar = $("#t_bongkar_edit").val();

      if (tgl == "" || vehicle == "Pilih" || pks == "" || tujuan == "" || ongkos == "" || t_muat == "" || t_bongkar == "") {
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
        if (kotor == "Rp. -" || bersih == "Rp. -") {
          Swal.fire({
            title: 'Pesan Galat!',
            text: 'Klik Hitung terlebih dahulu untuk melanjutkan Submit Data',
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
            url: './pu/ubah/'+id, 
            dataType: 'json', 
            data: { 
              id: id,
              tgl: tgl,
              vehicle: vehicle,
              pks: pks,
              tujuan: tujuan,
              ongkos: ongkos,
              // lainnya: lainnya,
              t_muat: t_muat,
              t_bongkar: t_bongkar,
              bbm_harga: bbm_harga,
              bbm_jumlah: bbm_jumlah,
              uang_makan: uang_makan,
              bpu_ket: bpu_ket,
              bpu_jumlah: bpu_jumlah,
              kotor: kotor,
              bersih: bersih,
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
              $('#submit_edit').prop('disabled', true); 
              $('#hitung_klik').prop('hidden', false); 
            }
          });
        }
      }
    }
  }

  function hapus(id) {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: 'Untuk menghapus data Pendapatan Unit ID : '+id,
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
          url: "./pu/hapus/"+id,
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
  var tonase1 = document.getElementById('tonase_add');
  var harga_arm1 = document.getElementById('harga_arm_add');
  var entertainer1 = document.getElementById('entertainer_add');
  var susut1 = document.getElementById('susut_add');
  var jasa_pelabuhan1 = document.getElementById('jasa_pelabuhan_add');
  var jasa_timbangan1 = document.getElementById('jasa_timbangan_add');
  var deduction_bbm1 = document.getElementById('deduction_bbm_add');
  var pengalihan_rute1 = document.getElementById('pengalihan_rute_add');
  var harga_spk1 = document.getElementById('harga_spk_add');
  // RUPIAH EDIT
  var tonase2= document.getElementById('tonase_edit');
  var harga_arm2 = document.getElementById('harga_arm_edit');
  var entertainer2 = document.getElementById('entertainer_edit');
  var susut2 = document.getElementById('susut_edit');
  var jasa_pelabuhan2 = document.getElementById('jasa_pelabuhan_edit');
  var jasa_timbangan2 = document.getElementById('jasa_timbangan_edit');
  var deduction_bbm2 = document.getElementById('deduction_bbm_edit');
  var pengalihan_rute2 = document.getElementById('pengalihan_rute_edit');
  var harga_spk2 = document.getElementById('harga_spk_edit');

  if (tonase1) { tonase1.addEventListener('keyup', function(e){ tonase1.value = formatRupiah(this.value, 'Rp. '); }); }
  if (harga_arm1) { harga_arm1.addEventListener('keyup', function(e){ harga_arm1.value = formatRupiah(this.value, 'Rp. '); }); }
  if (entertainer1) { entertainer1.addEventListener('keyup', function(e){ entertainer1.value = formatRupiah(this.value, 'Rp. '); }); }
  if (susut1) { susut1.addEventListener('keyup', function(e){ susut1.value = formatRupiah(this.value, 'Rp. '); }); }
  if (jasa_pelabuhan1) { jasa_pelabuhan1.addEventListener('keyup', function(e){ jasa_pelabuhan1.value = formatRupiah(this.value, 'Rp. '); }); }
  if (jasa_timbangan1) { jasa_timbangan1.addEventListener('keyup', function(e){ jasa_timbangan1.value = formatRupiah(this.value, 'Rp. '); }); }
  if (deduction_bbm1) { deduction_bbm1.addEventListener('keyup', function(e){ deduction_bbm1.value = formatRupiah(this.value, 'Rp. '); }); }
  if (pengalihan_rute1) { pengalihan_rute1.addEventListener('keyup', function(e){ pengalihan_rute1.value = formatRupiah(this.value, 'Rp. '); }); }
  if (harga_spk1) { harga_spk1.addEventListener('keyup', function(e){ harga_spk1.value = formatRupiah(this.value, 'Rp. '); }); }

  if (tonase2) { tonase2.addEventListener('keyup', function(e){ tonase2.value = formatRupiah(this.value, 'Rp. '); }); }
  if (harga_arm2) { harga_arm2.addEventListener('keyup', function(e){ harga_arm2.value = formatRupiah(this.value, 'Rp. '); }); }
  if (entertainer2) { entertainer2.addEventListener('keyup', function(e){ entertainer2.value = formatRupiah(this.value, 'Rp. '); }); }
  if (susut2) { susut2.addEventListener('keyup', function(e){ susut2.value = formatRupiah(this.value, 'Rp. '); }); }
  if (jasa_pelabuhan2) { jasa_pelabuhan2.addEventListener('keyup', function(e){ jasa_pelabuhan2.value = formatRupiah(this.value, 'Rp. '); }); }
  if (jasa_timbangan2) { jasa_timbangan2.addEventListener('keyup', function(e){ jasa_timbangan2.value = formatRupiah(this.value, 'Rp. '); }); }
  if (deduction_bbm2) { deduction_bbm2.addEventListener('keyup', function(e){ deduction_bbm2.value = formatRupiah(this.value, 'Rp. '); }); }
  if (pengalihan_rute2) { pengalihan_rute2.addEventListener('keyup', function(e){ pengalihan_rute2.value = formatRupiah(this.value, 'Rp. '); }); }
  if (harga_spk2) { harga_spk2.addEventListener('keyup', function(e){ harga_spk2.value = formatRupiah(this.value, 'Rp. '); }); }

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