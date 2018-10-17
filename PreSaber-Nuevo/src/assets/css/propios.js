var abrio=0;
var actual=0;
function desplegar(obj) {
  console.log(abrio);
  if (obj['id'] !== actual){
    $(".panelTabla").slideUp(100);
    abrio=0;
  }
  if (abrio === 0){
    $("#"+obj.childNodes[1]['id']).slideDown(100);
    actual = obj['id'];
    abrio = 1;
  }else{
    $("#"+obj.childNodes[1]['id']).slideUp(100);
    actual = obj['id'];
    abrio = 0;
  }
}
