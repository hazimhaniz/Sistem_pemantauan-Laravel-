

@include('plugins.dropify')

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true" height="60%">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle"><span class="bold">Maps</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id='form-stesen-edit' role="form" method="post" action="{{ route('projek.updatestesen') }}">

            <input type="hidden" name="id" value="{{$stesen->id}}">
            <div class="modal-body m-t-20">
                <!-- <div id="map" style="width: 100%; height: 300px;"></div> -->
                <div class="col-md-12">
                	<iframe src = "https://maps.google.com/maps?q={{$stesen->latitud}},{{$stesen->longitud}}&hl=es;z=30&amp;output=embed" width="100%" height="500px"></iframe>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" ><i class="fa fa-close m-r-5"></i> tutup</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script> -->
<script type="text/javascript">
$("#modal-edit").modal("show");
$('.modal form').trigger("reset");
$(".modal form").validate();
console.log({{$stesen->longitud}});
console.log({{$stesen->latitud}});
// $(function(){
//    $(window).load(function(){
// 	function initialize() {

// 	   var latlng = new google.maps.LatLng(3.1639773,101.7095128);
// 	    var map = new google.maps.Map(document.getElementById('map'), {
// 	      center: latlng,
// 	      zoom: 13
// 	    });
// 	    var marker = new google.maps.Marker({
// 	      map: map,
// 	      position: latlng,
// 	      draggable: false,
// 	      anchorPoint: new google.maps.Point(0, -29)
// 	   });
// 	    var infowindow = new google.maps.InfoWindow();   
// 	    google.maps.event.addListener(marker, 'click', function() {
// 	      var iwContent = '<div id="iw_container">' +
// 	      '<div class="iw_title"><b>Location</b> : Noida</div></div>';
// 	      // including content to the infowindow
// 	      infowindow.setContent(iwContent);
// 	      // opening the infowindow in the current map and at the current marker location
// 	      infowindow.open(map, marker);
// 	    });
// 	}
// 	google.maps.event.addDomListener(window, 'load', initialize);
// 	});
// });

$("#form-stesen-edit").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    if(!form.valid())
      return;

    $.ajax({
        url: form.attr('action'),
        method: form.attr('method'),
        data: new FormData(form[0]),
        dataType: 'json',
        async: true,
        contentType: false,
        processData: false,
        success: function(data) {
            swal(data.title, data.message);
            $("#modal-edit").modal("hide");
            tableSungai.api().ajax.reload(null, false);
            tableMarin.api().ajax.reload(null, false);
            tableTasik.api().ajax.reload(null, false);
            tableTanah.api().ajax.reload(null, false);
            tableAir.api().ajax.reload(null, false);
            tableUdara.api().ajax.reload(null, false);
            tableBunyi.api().ajax.reload(null, false);
            tableGetaran.api().ajax.reload(null, false);
        }
    });
});
</script>