<!-- iCheck -->
<link rel="stylesheet" href="<?= base_url('assets/plugins/iCheck/square/purple.css'); ?>">
<!-- iCheck -->
<script src="<?= base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- map -->
<!-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCtbzten3-5ExkqPqd438Qq5AuCsMIcWC8"></script> -->
<script src="http://maps.googleapis.com/maps/api/js"></script>

<!-- iCheck -->
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-purple',
      radioClass: 'icheckbox_square-purple',
      increaseArea: '20%' /* optional */
    });
  });
</script>

<!-- maps -->
<script type="text/javascript">
// start map 
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

// end map

</script>