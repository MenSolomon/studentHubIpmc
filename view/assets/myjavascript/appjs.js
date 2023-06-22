window.onload = function(){

let picInputHandler = document.getElementById('FileuploadInput');
picInputHandler.onchange = function(evt){
  let tagetElmnt = evt.target || window.event.srcElement;
  var files = tagetElmnt.files;
  if(FileReader){
    var frd = new FileReader();
    frd.onload = function(){
      var ImgElmnt = document.getElementById("loadedpic");
      ImgElmnt.src = frd.result ;
    }
    frd.readAsDataURL(files[0]);
  }else{
    alert("Bad result");
  }
 }
}
