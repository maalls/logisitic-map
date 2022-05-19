function findPos(obj){
  var curleft = 0;
  var curtop = 0;

  if (obj.offsetParent) {
do {
    curleft += obj.offsetLeft;
    curtop += obj.offsetTop;
   } while (obj = obj.offsetParent);

return {X:curleft,Y:curtop};
 }
}

$(document).ready(function() {


  $('#map').mousemove(function(event) {
    pointerX = event.pageX - $('#map').offset().left + $('#scroll').scrollLeft();
    pointerY = event.pageY - $('#map').offset().top + $('#scroll').scrollTop();

    console.log(pointerX, pointerY);
    var step = 0.00001;
    var r = 3.545 + pointerX * step;
    $('#resource').val(r);
    $('#xValue').html(pointerX);
  });

});