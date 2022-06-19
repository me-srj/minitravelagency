var gotdistance1=false;
var gotdistance2=false;
var address ='';
  var lat ='';
  var long ='';
var app = angular.module('plunker', ['vsGoogleAutocomplete']);

app.controller('MainCtrl', function($scope,$http,$interval) {
$scope.retun_d='';
$scope.retun_dmin='';
$scope.later_booking=true;
$scope.local_datetime=true;
  navigator.geolocation.getCurrentPosition(function (p) {
                    var latlng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            // console.log(results[1]);
                            if (results[1]) {
                                 address = results[1].formatted_address;
                                  lat = p.coords.latitude;
                                 long = p.coords.longitude;

                                }
                        }
                    });
                });
  // $scope.options = {
  //   types: ['(cities)'],
  //   componentRestrictions: { country: 'FR' }
  // };
  
  $scope.address = {
    name: '',
    place: '',
    components: {
      placeId: '',
      streetNumber: '', 
      street: '',
      city: '',
      state: '',
      countryCode: '',
      country: '',
      postCode: '',
      district: '',
      location: {
        lat: '',
        long: ''
      }
    }
  };
    function gotdischange1() {
   gotdistance1=true;
  }
  function gotdischange2() {
     gotdistance2=true;
  }

address=document.getElementById("address");
address.addEventListener("change", gotdischange1);
address2=document.getElementById("address2");
address2.addEventListener("change", gotdischange1);
address3=document.getElementById("address3");
address3.addEventListener("change", gotdischange2);
address4=document.getElementById("address4");
address4.addEventListener("change", gotdischange2);
  $interval(function () {
    if(lat===''||long==='')
    {
    $("#locationmsg2").show();
     $("#locationmsg").show();
     $(".currentlocdiv").hide();
    }
    else
    {
      $("#locationmsg2").hide();
      $(".currentlocdiv").show();
      $("#locationmsg").hide();
    }
   //console.log("afas");
           var origin_latitude=$('#lat').val();
           var origin_longitude=$('#long').val();
           var destination_latitude=$('#lat2').val();
           var destination_longitude=$('#long2').val();
           var Outstation_origin_lat=$('#lat3').val();
            var Outstation_origin_long=$('#long3').val();
             var Outstation_destination_lat=$('#lat4').val();
              var Outstation_destination_long=$('#long4').val();
if (origin_latitude!=""&&origin_longitude!=""&&destination_longitude!=""&&destination_latitude!=""&&gotdistance1) {
//console.log("asdsa");
$scope.calcRoute1();
gotdistance1=false;
}
else if(Outstation_origin_lat!=""&&Outstation_origin_long!=""&&Outstation_destination_lat!=""&&Outstation_destination_long!=""&&gotdistance2)
{
 $scope.calcRoute2();
gotdistance2=false;
}
else
{
  //asd
}
  }, 1000);
  // calculate distance script
  $scope.calcRoute1 = function() {
      
//create a DirectionsService object to use the route method and get a result for our request
var directionsService = new google.maps.DirectionsService();

//create a DirectionsRenderer object which we will use to display the route
var directionsDisplay = new google.maps.DirectionsRenderer();


       //create request
    var origin_point=$('#lat').val()+","+$('#long').val();
    var destination_point=$('#lat2').val()+","+$('#long2').val();

    var request = {
        origin: origin_point,
        destination: destination_point,
        travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
        unitSystem: google.maps.UnitSystem.METRIC
    }

    //pass the request to the route method
    directionsService.route(request, function (result, status) {
        if (status == google.maps.DirectionsStatus.OK) {

            //Get distance and time
           // $("#output").html( result.routes[0].legs[0].distance.text + ".</div>");

           
           //$("#output").html('The Distance is' + result.routes[0].legs[0].distance.text);
           $("#output").html(result.routes[0].legs[0].distance.text + ".<br />Duration: " + result.routes[0].legs[0].duration.text + ".</div>");
           distance=result.routes[0].legs[0].distance.text;
           km=distance.split(" ");
           if(parseInt(km[0]) < parseInt('50'))
           {  
            kms=$('#distance').val(km[0]);
           travel_time=$('#travel_time').val(result.routes[0].legs[0].duration.text);
           }
           else{
               $('#address').val('');
                $('#address2').val('');
               
           $('#frameModalTopInfoDemo').modal();
           
           } 
         } else {
            //show error message
            $("#output").html("<div class=' alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><b>Error!</b> Could not retrieve driving distance.</div>");
        }
    });
    console.log("removed");
$("#local_btn").removeAttr("disabled");
}

 // calculate Outstation distance script
  $scope.calcRoute2 = function() {
//create a DirectionsService object to use the route method and get a result for our request
var directionsService = new google.maps.DirectionsService();

//create a DirectionsRenderer object which we will use to display the route
var directionsDisplay = new google.maps.DirectionsRenderer();

       //create request
    var origin_point=$('#lat3').val()+","+$('#long3').val();
    var destination_point=$('#lat4').val()+","+$('#long4').val();

    var request = {
        origin: origin_point,
        destination: destination_point,
        travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
        unitSystem: google.maps.UnitSystem.METRIC
    }

    //pass the request to the route method
    directionsService.route(request, function (result, status) {
        if (status == google.maps.DirectionsStatus.OK) {

            //Get distance and time
           // $("#output").html( result.routes[0].legs[0].distance.text + ".</div>");

           
           //$("#output").html('The Distance is' + result.routes[0].legs[0].distance.text);
           $("#output").html(result.routes[0].legs[0].distance.text + ".<br />Duration: " + result.routes[0].legs[0].duration.text + ".</div>");
           distance=result.routes[0].legs[0].distance.text;
           km=distance.split(" ");
           if(km[0] > 50)
           {
            kms=$('#Outstation').val(km[0]);
           travel_time=$('#travel_time2').val(result.routes[0].legs[0].duration.text);
           }
           else{
            //alert(km[0]);
           $('#frameModalTopInfoDemo2').modal();
           } 
         } else 
         {
         //          
        }
    });
$("#fcar").removeAttr("disabled");
}
// current location script
$scope.currentlocation = function(){
  if(lat===''||long==='')
  {
  $("#locationmsg2").show();
   $("#locationmsg").show();
   $(".currentlocdiv").hide();
  }
  else
  {
    $("#locationmsg2").hide();
    $(".currentlocdiv").show();
    $("#locationmsg").hide();
    $("fa-crosshairs").attr("class","fa fa-crosshairs fa-spin");
    $scope.address.name = address;
    $scope.address.components.location.lat = lat;
    $scope.address.components.location.long = long;
   $("fa-crosshairs").attr("class","fa fa-crosshairs");
  }
}
// current location script
//dateFunc
$scope.dateFunc =function()
{
  var d = $scope.dateVal;
  $scope.retun_dmin=d.getFullYear() + "-" + $scope.checklessten((d.getMonth()+1)) + "-" + $scope.checklessten(d.getDate()) + "T" + $scope.checklessten(d.getHours()) + ':' + $scope.checklessten(d.getMinutes());  
  strto=d.getTime();
  newv =strto+(864000*1000);
  maxreturn=new Date(newv);
$scope.retun_d=maxreturn.getFullYear() + "-" + $scope.checklessten((maxreturn.getMonth()+1)) + "-" + $scope.checklessten(maxreturn.getDate()) + "T" + $scope.checklessten(maxreturn.getHours()) + ':' + $scope.checklessten(maxreturn.getMinutes());
}
//booking later_function
$scope.later_booking_fuC = function(){
  $scope.later_booking=false;
  $scope.local_datetime=false;
}
$scope.checklessten=function(number)
{
if (number>10) 
{
  return number;
}
else
{
  return "0"+number;
}
}
//booking_later close
//location on button function

//close location on buttion function
// findbtn loader
$('#local_btn').click(function(){
 if($scope.address.name !='' && $scope.address2.name !=''){
  $('#local_btn').html('<i class="fa fa-spinner fa-spin"></i> Searching..');  
 }
});
$('#fcar').click(function(){
 if($scope.address4.name !=''){
  $('#fcar').html('<i class="fa fa-spinner fa-spin"></i> Searching..');  
 }
});
});