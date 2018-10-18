<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/croppie.js') }}"></script>
<script type="text/javascript">

// start proccess of club Profile ImageFile crop in [[ register Proccess ]] to [[ store ]]

$clubProfileImage_crop = $('#clubProfileImage_crop').croppie({
        enableExif: true,
        viewport: {
          width:200,
          height:200,
          type:'square' //circle
        },
        boundary:{
          width:300,
          height:300
        }
      });
  $(document).on('change', "#clubProfileImageFile", function () {

    var reader = new FileReader();
    reader.onload = function (event) {
      $clubProfileImage_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    //alert('done') ;
    $('#clubProfileImageModal').modal('show');
  });

  //$('.crop_image').click(function(event){
  $(document).on('click', ".crop_clubProfileImage", function (event) {
    //$('.imageInfo').css('opacity', '0.6');
    //$('.imageInfoLoader').fadeIn();
    $clubProfileImage_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $('#clubProfileImagePlaceholder').attr({src: response});
      $("input[name=user_img]").attr({value: response});
      $('#clubProfileImageModal').modal('hide');
      var clubProfileImageFile = $("#clubProfileImageFile");
      clubProfileImageFile.replaceWith( clubProfileImageFile = clubProfileImageFile.clone( true ) );
    })
  });

 //end proccess of club Profile ImageFile crop in [[ register Proccess ]] to [[ store ]]

// start proccess of club Profile ImageFile crop in [[ register Proccess ]] to [[ update ]]
$EditclubProfileImage_crop = $('#EditclubProfileImage_crop').croppie({
        enableExif: true,
        viewport: {
          width:200,
          height:200,
          type:'square' //circle
        },
        boundary:{
          width:300,
          height:300
        }
      });
  $(document).on('change', "#editClubProfileImageFile", function () {

    var reader = new FileReader();
    reader.onload = function (event) {
      $EditclubProfileImage_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    //alert('done') ;
    $('#EditclubProfileImageModal').modal('show');
  });

  //$('.crop_image').click(function(event){
  $(document).on('click', ".crop_editClubProfileImage", function (event) {
    //$('.imageInfo').css('opacity', '0.6');
    //$('.imageInfoLoader').fadeIn();
    $EditclubProfileImage_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $('#editClubProfileImagePlaceholder').attr({src: response});
      $("input[name=user_img]").attr({value: response});
      $('#EditclubProfileImageModal').modal('hide');
      $('#updateClubProfileImage').fadeIn() ;
      var editClubProfileImageFile = $("#editClubProfileImageFile");
      editClubProfileImageFile.replaceWith( editClubProfileImageFile = editClubProfileImageFile.clone( true ) );
    })
  });

 //end proccess of club Profile ImageFile crop in [[ register Proccess ]] to [[ update ]]


  // start proccess of profile image crop and upload
  $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $(document).on('change', "#upload", function () {

    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    //alert('done') ;
    $('#uploadimageModal').modal('show');
  });
  // End proccess of profile image crop and upload

  //$('.crop_image').click(function(event){
  $(document).on('click', ".crop_image", function (event) {
    $('.imageInfo').css('opacity', '0.6');
    $('.imageInfoLoader').fadeIn();
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      var _token = $("input[name=_token]").val();
      var clubId = $("input[name=clubId]").val();
      $.ajax({
        url:"/changeProfilePhoto/club",
        type: "POST",
        data:{
          "image": response,
          "_token":_token,
          'clubId':clubId
        },
        success:function(data)
        {
          var upload = $("#upload");
          upload.replaceWith( upload = upload.clone( true ) );
          $('#uploadimageModal').modal('hide');
          $('.imageInfo').load('/imageinfodivload/club').fadeIn('slow');
          $('.imageInfo').css('opacity', '1');
          $('.imageInfoLoader').fadeOut();
          // try to change all photos in page
          $('#updateable-1').attr('src', data.imgUrl);
          $("#updateable-2").attr("src", data.imgUrl);
          $("#updateable-3").attr("src", data.imgUrl);
          console.log(data.imgUrl);
        }
      });
    })
  });


// end of proccess of profile image crop and upload

// start proccess of branch image crop

$logo_crop = $('#logo_crop').croppie({
        enableExif: true,
        viewport: {
          width:200,
          height:200,
          type:'square' //circle
        },
        boundary:{
          width:300,
          height:300
        }
      });
  $(document).on('change', "#logoUpload", function () {

    var reader = new FileReader();
    reader.onload = function (event) {
      $logo_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    //alert('done') ;
    $('#uploadBranchLogoModal').modal('show');
  });

  //$('.crop_image').click(function(event){
  $(document).on('click', ".crop_BranchLogoImage", function (event) {
    //$('.imageInfo').css('opacity', '0.6');
    //$('.imageInfoLoader').fadeIn();
    $logo_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $('#branchLogoPlaceholder').attr({src: response});
      $("input[name=c_b_logo]").attr({value: response});
      $('#uploadBranchLogoModal').modal('hide');
      var logoUpload = $("#logoUpload");
      logoUpload.replaceWith( logoUpload = logoUpload.clone( true ) );
      if ($("#ChangeBranchLogo").length > 0){
        $("#ChangeBranchLogo").show('400');
      }
    })
  });
 //end of proccess of branch image crop

 // start proccess of branch banner crop

 $banner_crop = $('#BannerImage').croppie({
    enableExif: true,
    viewport: {
      width:300,
      height:150,
      type:'square' //circle
    },
    boundary:{
      width:400,
      height:400
    }
  });
  $(document).on('change', "#bannerUpload", function () {

    var reader = new FileReader();
    reader.onload = function (event) {
      $banner_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    //alert('done') ;
    $('#uploadBranchBannerModal').modal('show');
  });

  //$('.crop_image').click(function(event){
  $(document).on('click', ".crop_BranchBannerImage", function (event) {
    //$('.imageInfo').css('opacity', '0.6');
    //$('.imageInfoLoader').fadeIn();
    $banner_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $('#branchBannerPlaceholder').attr({src: response});
      $("input[name=c_b_banner]").attr({value: response});
      $('#uploadBranchBannerModal').modal('hide');
      var bannerUpload = $("#bannerUpload");
      bannerUpload.replaceWith( bannerUpload = bannerUpload.clone( true ) );
      if ($("#ChangeBranchBanner").length > 0){
        $("#ChangeBranchBanner").show('400');
      }
    })
  });
 //end of proccess of branch banner crop

</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('js/rate.js') }}" ></script>





<!-- this script for google map API-->
<script>
  /*var map ;

 $( "#useMap" ).click(function() {

   jQuery(this).prev("div").attr("id","map");

   initMap() ;


 }) ;*/

/* $( "#get_it" ).click(function(map) {

   //this block of code to find my location !!

   infoWindow = new google.maps.InfoWindow;

   if (navigator.geolocation) {
     navigator.geolocation.getCurrentPosition(function(position) {
       var pos = {
         lat: position.coords.latitude,
         lng: position.coords.longitude
       };

       map.setOptions({ zoom: 15 });

       var data ;

       map.setCenter(pos);

       geocodeLatLng(geocoder, map, infowindow, pos); //by google

       function geocodeLatLng(geocoder, map, infowindow,pos) {
           //var input = document.getElementById('latlng').value;
           //var latlngStr = input.split(',', 2);

           var latlng = {lat: pos.lat, lng: pos.lng};
           geocoder.geocode({'location': latlng}, function(results, status) {
               if (status === 'OK') {
                   if (results[0]) {
                       map.setZoom(15);
                       var marker = new google.maps.Marker({
                           position: latlng,
                           map: map
                       });
                       infowindow.setContent(results[0].formatted_address);

                       var arrAddress = results[0].address_components;
                       for (ac = 0; ac < arrAddress.length; ac++) {
                           if (arrAddress[ac].types[0] == "street_number") {
                               //document.getElementById("tbUnit").value = arrAddress[ac].long_name
                               alert(arrAddress[ac].long_name) ;
                           }
                           if (arrAddress[ac].types[0] == "route") {
                               //document.getElementById("tbStreet").value = arrAddress[ac].short_name
                               alert(arrAddress[ac].short_name) ;
                           }
                           if (arrAddress[ac].types[0] == "locality") {
                               //document.getElementById("tbCity").value = arrAddress[ac].long_name
                               alert(arrAddress[ac].long_name) ;
                           }
                           if (arrAddress[ac].types[0] == "administrative_area_level_1") {
                               //document.getElementById("tbState").value = arrAddress[ac].short_name
                               alert(arrAddress[ac].short_name) ;
                           }
                           if (arrAddress[ac].types[0] == "administrative_area_level_2") {
                               //document.getElementById("tbState").value = arrAddress[ac].short_name
                               alert(arrAddress[ac].short_name) ;
                           }
                           if (arrAddress[ac].types[0] == "country") {
                               //document.getElementById("tbZip").value = arrAddress[ac].long_name
                               alert(arrAddress[ac].long_name) ;
                           }
                       }

                       //$( "#p_address" ).val = p_address ;
                       document.getElementById("p_address").value = results[0].formatted_address ;
                       infowindow.open(map, marker);
                       p_address = results[0].formatted_address ;
                       //alert(p_address) ;
                       //p_address = results[0].formatted_address ;
                       alert(p_address) ;
                   } else {
                       window.alert('No results found');
                   }
               } else {
                   window.alert('Geocoder failed due to: ' + status);
               }
           });
       }
       //$( "#p_address" ).value = p_address ;
       //alert(p_address) ;
     }, function() {
       handleLocationError(true, infoWindow, map.getCenter());
     });
   } else {
     // Browser doesn't support Geolocation
     handleLocationError(false, infoWindow, map.getCenter());
   }


 });*/

 /*function addMarker(coords) {

           var marker = new google.maps.Marker({
               position: coords,//options.center,
               map: map,
         //icon: 'https://picsum.photos/40/40'
     });

   }

 function initMap() {

   //Map Options
   var options = {
     zoom: 5,
     center: {lat: 26.820553, lng: 30.802498},
   }

   // Create New Map Pbject
   var map = new google.maps.Map(document.getElementById('map'), options);

   var geocoder = new google.maps.Geocoder; // by google

   var infowindow = new google.maps.InfoWindow;  // by google

 }*/


 </script>
 <!-- <script async defer
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkp8m3A7J0iyEoJc_Z2j_ogelyFHwXdok&callback=initMap">
 </script> -->

 <script>
 ///////////////////////////////////////////////////////////////////////////////////////////////////
 ///////////////// start change between forms to [ add / edit ] club users [ admin, manager ]//////////////////
 ///////////////////////////////////////////////////////////////////////////////////////////////////
 $('input[type=radio][name=changeForm]').on('change', function() {
      switch($(this).val()) {
          case 'addClubAdminForm':
              //alert("addClubAdminForm");
              $('#addClubManagerForm').hide() ;
              $('#formTitle').text('{!! trans('club.adminName') !!}') ;
              $('input[type=hidden][name=type]').val(3) ;
              break;
          case 'addClubManagerForm':
              //alert("addClubManagerForm");
              //$('#addClubAdminForm').hide() ;
              $('#addClubManagerForm').fadeIn() ;
              $('#formTitle').text('{!! trans('club.managerName') !!}') ;
              $('input[type=hidden][name=type]').val(4) ;
              break;
           case 'editClubAdminForm':
              //alert("editClubAdminForm");
              $('#editClubManagerForm').hide() ;
              $('#editClubAdminForm').fadeIn() ;
              break;
          case 'editClubManagerForm':
              //alert("editClubManagerForm");
              $('#editClubAdminForm').hide() ;
              $('#editClubManagerForm').fadeIn() ;
              break;
      }
 });
 ///////////////////////////////////////////////////////////////////////////////////////////////////
 ///////////////// end change between forms to [ add / edit ] club users [ admin, manager ]//////////////////
 ///////////////////////////////////////////////////////////////////////////////////////////////////

 </script>
