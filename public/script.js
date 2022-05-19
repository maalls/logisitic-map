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

  var img = new Image();
  var imageHeight;
  var imageWidth;
  img.onload = function(){
      imageHeight = img.height;
      imageWidth = img.width;
      console.log('dimension', height, width);
      // code here to use the dimensions
    }

  img.src = document.getElementById('map').src;


  var step = parseFloat($('#map').data('step'));
  var rMin = parseFloat($('#map').data('rmin'));

  console.log(step, rMin);

  /*$('#map').mousemove(function(event) {
    
    positions = getPosition(event);
    $('#resource').html(positions.r);
    $('#xValue').html(positions.pointerX);
  });*/

  var positionMode = 1;
  /*$('#map').click(function(event) {

    console.log(positionMode);
    positions = getPosition(event);

    if(positionMode == 1) {

      $('#rMin').val(positions.r);
      positionMode = 2;
    }
    else {
      $('#rMax').val(positions.r);
      positionMode = 1;

      $('#form').submit();
    }

  });*/


  function getPosition(event) {
    pointerX = event.pageX - $('#map').offset().left;
    pointerY = event.pageY - $('#map').offset().top;

    console.log(pointerX);
    
    var r = rMin + pointerX * step;

    return {
      step: step,
      r: r,
      pointerX: pointerX
    }
  }





var div = document.getElementById('select'), x1 = 0, y1 = 0, x2 = 0, y2 = 0;
var width = 0;
function reCalc() {
    var x3 = Math.min(x1,x2);
    var x4 = Math.max(x1,x2);
    var y3 = Math.min(y1,y2);
    var y4 = Math.max(y1,y2);

    width = x4 - x3;
    div.style.left = x3 + 'px';
    div.style.top = y3 + 'px';
    div.style.width = width + 'px';
    div.style.height = width + 'px';
}

var positionMode = 1;
$('#map,#select').mousedown(function(e) {

  if(positionMode == 1) {
    div.hidden = 0;
    x1 = e.clientX ;
    y1 = e.clientY + window.scrollY ;
    x2 = x1;
    y2 = y1;
    reCalc();
    $('#x1').html(rMin + x1 * step);
    $('#y1').html(imageHeight - y1 + $('#map').offset().top);
    $('#rMin').val(rMin + x1 * step);
    positionMode = 2;
  }
  else if(positionMode == 2) {

    console.log('mode 2');
    //div.hidden = 1;
    //$('#x2').html(rMin + x2 * step);
    //$('#y2').html(imageHeight - y2 - width + $('#map').offset().top);
    $('#rMax').val(rMin + x2 * step);
    positionMode = 1;
    //$('#form').submit();

  }
});
$('#map,#select').mousemove(function(e) {
  if(positionMode == 2) {
    x2 = e.clientX;
    //y2 = e.clientY;
    reCalc();
    console.log('calc', positionMode);
    
      $('#x2').html(rMin + x2 * step);
      $('#y2').html(imageHeight - y2 - width + $('#map').offset().top);
    }
});

});
