
// console.log();

window.addEventListener('load',function(e){
        var current = document.getElementById('cur');
        var currentName = document.getElementById('curName');


if ("lang" in localStorage ){

    var currentVal = localStorage.getItem("current_lang");
      var setlang = "en"+"-"+currentVal;
    var displayLang = localStorage.getItem("name");
    var txt = document.getElementsByTagName('p');

    currentName.innerHTML = displayLang;
    current.setAttribute('value',currentVal);

var h2 = document.getElementsByTagName('h2');
var h4 = document.getElementsByTagName('h4');
var h1 = document.getElementsByTagName('h1');
var h3 = document.getElementsByTagName('h3');
var h5 = document.getElementsByTagName('h5');

for (var i = 0, len = txt.length; i < len; i++) {

    updateLocation(setlang,txt[i]);
}

for (var i = 0, len = h2.length; i < len; i++) {

    updateLocation(setlang,h2[i]);
}

for (var i = 0, len = h1.length; i < len; i++) {

    updateLocation(setlang,h1[i]);
}
for (var i = 0, len = h4.length; i < len; i++) {

    updateLocation(setlang,h4[i]);
}

for (var i = 0, len = h5.length; i < len; i++) {

    updateLocation(setlang,h5[i]);
}

}

},false);











      var select = document.getElementById('sele');
select.addEventListener('change',function(e){

    var current = document.getElementById('cur');
var currentName = document.getElementById('curName');
  var options = this.getElementsByTagName("option");
  var optionHTML = options[this.selectedIndex].innerHTML;
// console.log(optionHTML);
var trans = current.value+'-'+select.value

localStorage.setItem("lang",trans);
localStorage.setItem("name",optionHTML);
localStorage.setItem("current_lang",select.value);




var txt = document.getElementsByTagName('p');
var h2 = document.getElementsByTagName('h2');
var h4 = document.getElementsByTagName('h4');
var h1 = document.getElementsByTagName('h1');
var h3 = document.getElementsByTagName('h3');
var h5 = document.getElementsByTagName('h5');

for (var i = 0, len = txt.length; i < len; i++) {

    updateClassLocation(trans,txt[i]);
}

for (var i = 0, len = h2.length; i < len; i++) {

    updateClassLocation(trans,h2[i]);
}

for (var i = 0, len = h1.length; i < len; i++) {

    updateClassLocation(trans,h1[i]);
}
for (var i = 0, len = h4.length; i < len; i++) {

    updateClassLocation(trans,h4[i]);
}










function updateClassLocation(lng,txt){


// console.log(txt);

  var method = 'POST';
  var params = 'key='+ 'trnsl.1.1.20180322T094849Z.a0e06dbaea195453.9dd078cb93a20c1ecfe6bcdff53c1792c0a8957f';
  params += '&lang='+lng;
  params += '&text='+ txt.innerHTML;
  var url = 'https://translate.yandex.net/api/v1.5/tr.json/translate';


  ajax(url, method, params,txt);


}

function ajax(url, method, params,text){
        var current = document.getElementById('cur');
var currentName = document.getElementById('curName');

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if(xhr.readyState == 4){
      var res = JSON.parse(xhr.responseText);
      text.innerHTML = res.text;
      current.value = select.value;
        currentName.innerHTML = optionHTML;



    }
  }
  xhr.open(method, url, true);
  xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
//   xhr.setRequestHeader("Host","translate.yandex.net");
  xhr.setRequestHeader("ACCEPT","*/*");
  var sd = xhr.send(params);
  //console.log(sd);
}



},false);







function updateLocation(lng,txt){

// console.log(text.innerHTML);
console.log(lng);

  var method = 'POST';
  var params = 'key='+ 'trnsl.1.1.20180324T123534Z.00bf2b22df8199fc.b1e448f7055a41a784c6eea12a62ac494f8e59d8';
  params += '&lang='+lng;
  params += '&text='+ txt.innerHTML;
  var url = 'https://translate.yandex.net/api/v1.5/tr.json/translate';
  ajax2(url, method, params,txt);
}



function ajax2(url, method, params,text){
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if(xhr.readyState == 4){
      var res = JSON.parse(xhr.responseText);
      text.innerHTML = res.text
    }
  }
  xhr.open(method, url, true);
  xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
//   xhr.setRequestHeader("Host","translate.yandex.net");
  xhr.setRequestHeader("ACCEPT","*/*");
  var sd = xhr.send(params);
  //console.log(sd);
}
