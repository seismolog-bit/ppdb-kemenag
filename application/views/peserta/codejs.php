<!-- smartwizard -->
<script src="<?= base_url();?>assets/bower_components/smart-wizard/js/jquery.smartWizard.js"></script>
<!-- select2 -->
<script src="<?= base_url('assets/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<!-- datepicker -->
<script src="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<?= base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
<!-- map -->
<!-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCtbzten3-5ExkqPqd438Qq5AuCsMIcWC8"></script> -->
<script src="http://maps.googleapis.com/maps/api/js"></script>

<!-- iCheck -->
<link rel="stylesheet" href="<?= base_url('assets/plugins/iCheck/square/purple.css'); ?>">
<!-- iCheck -->
<script src="<?= base_url();?>assets/plugins/iCheck/icheck.min.js"></script>

<!-- iCheck -->
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-purple',
      radioClass: 'icheckbox_flat-green',
      increaseArea: '20%' /* optional */
    });
  });
</script>

<script type="text/javascript">
//select2
    $('.select2').select2();
//Date picker
    $('#tanggal_lahir').datepicker({
      autoclose: true
    })
    $('#tanggal_daftar').datepicker({
      autoclose: true
    })

 //---------------
 //- smartWizard -
 //---------------
 $(document).ready(function(){
     // Toolbar extra buttons
     var btnFinish = $('<button></button>').text('Daftar Sekarang')
                                     .attr('id','btn-finish')
                                      .addClass('<?= $this->config->item('botton')?>')
                                      .on('click', function(){
                                         });
     var btnCancel = $('<button></button>').text('Cancel')
                                      .addClass('btn btn-danger btn-flat')
                                      .on('click', function(){
                                             $('#smartwizard').smartWizard("reset");
                                         });
     // Smart Wizard
     $('#smartwizard').smartWizard({
             selected: 0,
             theme: 'dots',
             transitionEffect:'fade',
             toolbarSettings: {toolbarPosition: 'bottom',
                               toolbarExtraButtons: [btnFinish, btnCancel]
                             },
             anchorSettings: {
                         markDoneStep: true, // add done css
                         markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                         removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                         enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                     }
          });
     $("#btn-finish").addClass('disabled');
      $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
            //alert("You are on step "+stepNumber+" now");
            if(stepPosition == 'first'){
                $("#prev-btn").addClass('disabled');
                $("#btn-finish").addClass('disabled');
            }else if(stepPosition == 'final'){
                $("#next-btn").addClass('disabled');
                $("#btn-finish").removeClass('disabled');
            }else{
                $("#prev-btn").removeClass('disabled');
                $("#next-btn").removeClass('disabled');
                $("#btn-finish").addClass('disabled');
            }
         });
 });

// start map ----------------------------------------
// variabel global marker
var marker;
  
function taruhMarker(peta, posisiTitik){
    if( marker ){
      // pindahkan marker
      marker.setPosition(posisiTitik);
    } else {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta
      });
    }  
    // isi nilai koordinat ke form
    document.getElementById("latitude").value = posisiTitik.lat();
    document.getElementById("longitude").value = posisiTitik.lng();
}
  
function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(<?= $pengaturan->latitude ?>,<?= $pengaturan->longitude ?>),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });
}

// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);

// end map ----------------------------------------

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                    "iStart": oSettings._iDisplayStart,
                    "iEnd": oSettings.fnDisplayEnd(),
                    "iLength": oSettings._iDisplayLength,
                    "iTotal": oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
        };

    var t = $("#mytable").DataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode != 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    scrollCollapse : true,
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "peserta/json", "type": "POST"},
                    columns: [
                         {
                            "data": "id_peserta",
                            "orderable": false,
                            "className" : "text-center"
                        },
                        {
                            "data": "id_peserta",
                            "orderable": false
                        },{"data": "no_pendaftaran","className" : "text-center"},
                            // {"data": "tanggal_daftar"},
                            // {"data": "tahun_pelajaran"},
                            // {"data": "jalur"},
                            {"data": "nama_peserta"},
                            // {"data": "jenis_kelamin"},
                            // {"data": "nisn"},
                            // {"data": "nik"},
                            // {"data": "tempat_lahir"},
                            // {"data": "tanggal_lahir"},
                            // {"data": "no_registrasi_akta_lahir"},
                            // {"data": "agama"},
                            // {"data": "kewarganegaraan"},
                            // {"data": "berkebutuhan_khusus"},
                            // {"data": "alamat"},
                            // {"data": "rt"},
                            // {"data": "rw"},
                            // {"data": "nama_dusun"},
                            // {"data": "nama_kelurahan"},
                            // {"data": "kecamatan"},
                            // {"data": "kode_pos"},
                            // {"data": "latitude"},
                            // {"data": "longitude"},
                            // {"data": "tempat_tinggal"},
                            // {"data": "moda_transportasi"},
                            // {"data": "no_kks"},
                            // {"data": "anak_ke"},
                            // {"data": "penerima_kps_pkh"},
                            // {"data": "no_kps_pkh"},
                            // {"data": "penerima_kip"},
                            // {"data": "no_kip"},
                            // {"data": "nama_tertera_di_kip"},
                            // {"data": "terima_fisik_kartu_kip"},
                            // {"data": "nama_ayah"},
                            // {"data": "nik_ayah"},
                            // {"data": "tahun_lahir_ayah"},
                            // {"data": "pendidikan_ayah"},
                            // {"data": "pekerjaan_ayah"},
                            // {"data": "penghasilan_bulanan_ayah"},
                            // {"data": "berkebutuhan_khusus_ayah"},
                            // {"data": "nama_ibu"},
                            // {"data": "nik_ibu"},
                            // {"data": "tahun_lahir_ibu"},
                            // {"data": "pendidikan_ibu"},
                            // {"data": "pekerjaan_ibu"},
                            // {"data": "penghasilan_bulanan_ibu"},
                            // {"data": "berkebutuhan_khusus_ibu"},
                            // {"data": "nama_wali"},
                            // {"data": "nik_wali"},
                            // {"data": "tahun_lahir_wali"},
                            // {"data": "pendidikan_wali"},
                            // {"data": "pekerjaan_wali"},
                            // {"data": "penghasilan_bulanan_wali"},
                            // {"data": "no_telepon_rumah"},
                            // {"data": "nomor_hp"},
                            // {"data": "email"},
                            // {"data": "jenis_ekstrakurikuler"},
                            // {"data": "tinggi_badan"},
                            // {"data": "berat_badan"},
                            // {"data": "jarak"},
                            // {"data": "jumlah_saudara_kandung"},
                            {"data": "nama_jurusan"},
                            // {"data": "pilihan_dua"},
                            // {"data": "pilihan_sekolah_lain"},
                            // {"data": "asal_sekolah"},
                            // {"data": "no_un"},
                            // {"data": "no_seri_ijazah"},
                            // {"data": "no_seri_skhu"},
                            // {"data": "nilai_rapor"},
                            // {"data": "nilai_usbn"},
                            // {"data": "nilai_unbk_unkp"},
                            // {"data": "skor_jarak"},
                            {"data": "jalur"},
                            {"data": "status","className" : "text-center"},
                            {"data": "status_hasil","className" : "text-center"},
                            {"data": "status_daftar_ulang","className" : "text-center"},
                        {  
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    columnDefs: [
                        {
                            className: "text-center",
                            targets: 0,
                            checkboxes: {
                                selectRow: true,
                            }
                        }

                    ],
                    select:{
                        style: 'multi'
                    },
                    order: [[1, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(1)', row).html(index);
                        // var id = data.id_peserta;
                        var stt = data.status;
                        if (stt=="Belum diverifikasi"){
                            $('td:eq(6)', row).html('<span class="label label-warning">Belum diverifikasi</span>');
                        } else if (stt=="Sudah diverifikasi"){
                            $('td:eq(6)', row).html('<span class="label label-success">Sudah diverifikasi</span>');
                        } else if (stt=="Berkas Kurang"){
                            $('td:eq(6)', row).html('<span class="label label-danger">Berkas kurang/tidak sesuai</span>');
                        }                    

                        var stt_hasil = data.status_hasil; 
                        if (stt_hasil=="Cadangan"){
                            $('td:eq(7)', row).html('<span class="label label-warning">Cadangan</span>');
                        } else if (stt_hasil=="Di Terima"){
                            $('td:eq(7)', row).html('<span class="label label-success">Di Terima</span>');
                        } else if (stt_hasil=="Tidak di terima"){
                            $('td:eq(7)', row).html('<span class="label label-danger">Tidak di terima</span>');
                        } else if (stt_hasil=="Belum ada"){
                            $('td:eq(7)', row).html('<span class="label label-primary">Belum ada</span>');
                        }    

                        var stt_du = data.status_daftar_ulang;
                        if (stt_du=="Belum daftar ulang"){
                            $('td:eq(8)', row).html('<span class="label label-warning">Belum daftar ulang</span>');
                        } else if (stt_du=="Sudah daftar ulang"){
                            $('td:eq(8)', row).html('<span class="label label-success">Sudah daftar ulang</span>');
                        } else if (stt_du=="Tidak daftar ulang"){
                            $('td:eq(8)', row).html('<span class="label label-danger">Tidak daftar ulang</span>');
                        } else if (stt_du=="Menunggu"){
                            $('td:eq(8)', row).html('<span class="label label-primary">Menunggu</span>');
                        } 
                    }
                });

                $('#myform').keypress(function(e){
                    if ( e.which == 13 ) return false;

                });

                 $("#myform").on('submit', function(e){
                    var form = this
                    var rowsel = t.column(0).checkboxes.selected();
                    $.each(rowsel, function(index, rowId){
                        $(form).append(
                            $('<input>').attr('type','hidden').attr('name','id[]').val(rowId)
                        )
                    });

                    if(rowsel.join(",") == ""){
                        alertify.alert('', 'Tidak ada data terpilih!', function(){ });

                    }else{
                        var prompt =  alertify.confirm('Apakah anda yakin akan menghapus data tersebut?', 'Apakah anda yakin akan menghapus data tersebut?').set('labels', {ok:'Yakin', cancel:'Batal'}).set('onok',function(closeEvent){
                            $.ajax({
                                url: "peserta/deletebulk",
                                type: "post",
                                data: "msg = "+rowsel.join(",") ,
                                success: function (response) {
                                    if(response == true){
                                        location.reload();
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                   console.log(textStatus, errorThrown);
                                }
                            });

                        });
                    }
                    $(".ajs-header").html("Konfirmasi");
                });
            });
            function confirmdelete(linkdelete) {
              alertify.confirm("Apakah anda yakin akan  menghapus data tersebut?", function() {
                location.href = linkdelete;
              }, function() {
                alertify.error("Penghapusan data dibatalkan.");
              });
              $(".ajs-header").html("Konfirmasi");
              return false;
            }          
</script>