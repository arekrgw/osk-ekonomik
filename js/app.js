$(function() {
  $('a[href*="#"]:not([href="#carouselExampleIndicators"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top - 80
        }, 800);
        return false;
      }
    }
  });
});

(function ($) {
  $(document).ready(function(){

    // hide .navbar first
    $(".navbar").hide();

    // fade in .navbar
    $(function () {
        $(window).scroll(function () {

                 // set distance user needs to scroll before we start fadeIn
            if ($(this).scrollTop() > 50) {
                $('.navbar').fadeIn();
            } else {
                $('.navbar').fadeOut();
            }
        });
    });

});
  }(jQuery));

$('.loader').delay(750).fadeOut();


// var get = document.querySelector(".top-bar");
// get.innerHTML = "Najbliższy termin rozpoczęcia kursu na prawo jazdy: " + date.data + " ("+date.dzienTyg+") o godz. "+date.godzina+".  w LO im. B.Prusa sala nr "+date.sala;

function initMap() {

  var osk = {lat: 51.958002, lng: 20.186314};
  var prus = {lat: 51.963231, lng: 20.147550};

  var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 12,
  center: osk
  });
  //OSK
  var oskMark = new google.maps.Marker({
  position: osk,
  map: map,
  title: 'OSK Ekonomik'
  });
  var oskContent = '<h4>OSK Ekonomik</h4>' + 'Miedniewice 7A';

  var oskInfo = new google.maps.InfoWindow({
    content: oskContent
  });
  oskMark.addListener('click', function(){
    oskInfo.open(map, oskMark);
    prusInfo.close();
  });

  //OSK END
  //PRUS

  var prusMark = new google.maps.Marker({
  position: prus,
  map: map
  });
  var prusContent = '<h4>Sala Wykładowa</h4>' + 'Skierniewice, Sienkiewicza 10';

  var prusInfo = new google.maps.InfoWindow({
    content: prusContent
  });
  prusMark.addListener('click', function(){
    prusInfo.open(map, prusMark);
    oskInfo.close();
  });
  oskInfo.open(map, oskMark);
}
