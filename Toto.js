function loadDoc(btnType) {
  var xhttp;
  if(window.XMLHttpRequest) {
    xhttp = new XMLHttpRequest();
  } else {
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState == 4 && xhttp.status == 200) {
      var myArr = JSON.parse(xhttp.responseText);
      myFunction(myArr, btnType);
    }
  };
  xhttp.open("GET", "Toto.php", true);
  xhttp.send();
}

function loopEach(arr, type) {
  var i,
          output = '';
  for(i = 0; i < arr.length; i++) {
    output += '<div class="alert alert-info" role="alert">Колона ' + (i + 1) + ':    <b>' + arr[i] + '</b></div>';
  }
  switch(type) {
    case 'num35':
      document.getElementById("5/35").innerHTML = output;
      break;
    case 'num42':
      document.getElementById("6/42").innerHTML = output;
      break;
    case 'num47':
      document.getElementById("6/47").innerHTML = output;
      break;
    case 'num49':
      document.getElementById("6/49").innerHTML = output;
      break;
  }
  return;
}

function myFunction(arr, type) {
  var i,
          j,
          array = arr.use35,
          num35 = [],
          num42 = [],
          num47 = [],
          num49 = [];
  for(i = 0; i < array.length; i++) {
    j = 0;
    while(j < array[i].length) {
      if(j == 0) {
        num35.push(array[i][j]);
      }
      if(j == 1) {
        num42.push(array[i][j]);
      }
      if(j == 2) {
        num47.push(array[i][j]);
      }
      if(j == 3) {
        num49.push(array[i][j]);
      }
      j++;
    }
  }
  switch(type) {
    case 'all':
      loopEach(num35, 'num35');
      loopEach(num42, 'num42');
      loopEach(num47, 'num47');
      loopEach(num49, 'num49');
      break;
    case '5/35':
      loopEach(num35, 'num35');
      break;
    case '6/42':
      loopEach(num42, 'num42');
      break;
    case '6/47':
      loopEach(num47, 'num47');
      break;
    case '6/49':
      loopEach(num49, 'num49');
      break;
  }
}