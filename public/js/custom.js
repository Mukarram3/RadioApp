$(document).ready(function () {
  $(".searchBtn").click(function () {
    $(".searchDiv").slideToggle("fast");
  });
  $(".menuBtn").click(function () {
    $(".menuDiv").slideToggle("fast");
  });

  $(".slider").slick({
    dots: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
  });

  $(".slider_many").slick({
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
  });
});

function showMore() {
  document.getElementById("panel").style.display = "block";
  document.getElementById("readMoreLink").style.display = "none";
}

$(".selectpicker").selectpicker();
