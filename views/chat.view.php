<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://localhost/chatox/public/css/bootstrap.min.css" rel="stylesheet">
<link href="http://localhost/chatox/public/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body style="overflow:hidden;">
<script>
  var posts = 0;
  var arrow = "noset";
if(!!window.EventSource) {
  var source = new EventSource('/chatox/chat/show');
  
} else {
  alert('Something wrong');
}
source.addEventListener('message', function(event) {
  var data = JSON.parse(event.data);
    for (var value in data) {
    if (data.hasOwnProperty(value)) {
      place = data[value].id.charAt(0);
      msg = data[value].chat_text;
      name = data[value].user_name;
      time = data[value].TIMEONLY;
      if(place == "l") place = "lmd"
      else place = "rmd";
      create_nodes(name, place, msg ,time);
      var objDiv = document.getElementById("r1");
      objDiv.scrollTop = objDiv.scrollHeight;
    }
    posts++;
  }
  document.getElementById("pno").innerHTML=posts;
}, false);

source.addEventListener('message', function(e) {
  if (e.origin != 'http://localhost') {
    alert('Origin was not http://localhost');
    return;
  }
}, false);

source.addEventListener('open', function(e) {
  console.log('Connection Open');
});

source.addEventListener('error', function(e) {
  if(e.readyState == EventSource.CLOSED) {
    console.log('Connection Closed');
  }
}, false);


window.onload = function() {
  resetC();
};

function resetC() {
"use strict";
var http = new XMLHttpRequest();
var url = "set/";
var params = "set=-1";
http.open("POST", url, true);
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
http.onreadystatechange = function() {
    if(http.readyState == 4 && http.status == 200) {
        console.log(http.responseText);
    }
}
http.send(params);
}

function create_nodes(name, place, msg, time) {
      "use strict";
      var div = document.createElement("div");
      div.setAttribute("class", "col-md-7 col-md-offset-1 col-xs-10 col-xs-offset-1 "+ place +" visible-lg visible-md visible-sm");
      var divsmall = document.createElement("div");
      if(place == "lmd") place ="ls";
      else place = "rs";
      divsmall.setAttribute("class", "col-md-7 col-md-offset-1 col-xs-10 col-xs-offset-1 " +place+" visible-xs info");
      var span = document.createElement("span");
      var spansmall = document.createElement("span");
      span.setAttribute("class", "time");
      spansmall.setAttribute("class", "time");
      var text = document.createTextNode(msg);
      var textsmall = document.createTextNode(msg);
      var str = name+" . "+time;
      var meta = document.createTextNode(str);
      var metasmall = document.createTextNode(str);
      span.appendChild(meta);
      spansmall.appendChild(metasmall);
      divsmall.appendChild(textsmall);
      divsmall.appendChild(spansmall);
      div.appendChild(text);
      div.appendChild(span);

      document.getElementById("msg").appendChild(div);
      document.getElementById("msg").appendChild(divsmall);
}

</script>


<div class="container-fluid">
  <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #fff;border:none">
    <div class="row">
      <div class="col-md-4">
        <div class="row" style="padding-top:3px;padding-bottom: 3px;">
        <div class="col-md-7 col-xs-3" style="padding-top:5px;">
        <button type="button" class="btn-file button-tag visible-xs" style="background-image:url('showimage/');background-color: #ffffff;border-radius:50%;width:35px;height:35px;background-size: 100% 100%;border-radius:50%" data-toggle="modal" data-target="#gridSystemModal2">
          <!-- <img src="showimage/" style="" width="40"/> -->
        </button>



        </div>
        <div class="col-md-3 col-md-offset-2 col-xs-3 col-xs-offset-6" style="padding-top: 10px;">

        <a class="btn btn-file" href="logout/" role="button">Leave</a>
        </div>
        </div>
      </div>

      <div class="col-md-8 visible-md visible-sm visible-lg" id="r0" style="border-left:5px solid #fff;height: 56px;background-color: #f1f1f1">
      &nbsp;
      </div>
    </div>
  </nav>


<div class="row" style="padding:0px;padding-top: 56px;">
<div class="col-md-4 visible-md visible-sm visible-lg" style="height: 580px;">
<div class="row" style="padding: 10px">
<div class="col-md-4" style="text-align:center;background-image:url('showimage/');background-size: 100% 100%;border-radius: 50%;width:93px;height: 93px">

</div>
<div class="col-md-8" style="padding-top: 10px;font-size: 12px;">
<h6 class="info" style="text-align: justify;padding: 5px;background-color: #f1f1f1;border-radius: 5px;"><?= $data['group_title']; ?></h6>
<h6 style="text-align: left">Posts: <span id="pno"></span></h5>
<h6><span>Key: <?= $data['group_key']; ?></span></h6>
</div>
<div class="col-md-12" style="padding:0px;padding-top: 20px;">
  <ul class="nav nav-tabs" role="tablist" style="border-bottom: 2px solid #d1d1d1">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><h6 style="margin:0;padding:0;">Description</h6></a></li>
    <li role="presentation" id="phash"><a href="#profile" id="getpeople" aria-controls="profile" role="tab" data-toggle="tab"><h6 style="margin:0;padding:0;">People</h6></a></li>
  </ul>

</div>
<div class="col-md-12" style="padding: 0px">
<div class="tab-content" style="padding-left:0px;padding-right: 0px;">
    <div role="tabpanel" class="tab-pane active" id="home">
    <h6 style="padding: 10px;background-color: #f1f1f1;border-radius: 3px;">
      <?= $data['group_desc'];?>
    </h6>

    </div>
    <div role="tabpanel" class="tab-pane" id="profile">

    </div>
      </div>
</div>
</div>
</div>
<div class="col-md-8 col-xs-12" style="background-color: #f1f1f1;">
<div class="row">
<div class="col-md-12 chats" id="r1" style="background-color:#f1f1f1;padding-bottom:60px;height:auto;overflow-x: hidden;overflow-y:scroll;">
<div class="row" id="msg">

</div>
</div>

<div class="col-md-12">


<nav class="navbar navbar-default navbar-fixed-bottom col-md-8 col-md-offset-4 col-xs-12 visible-lg visible-md visible-sm" id="r2" style="border-top:1px dotted #a2a2a2;background-color:#F5F1EE;padding:15px;padding-left: 70px;padding-right: 70px;">
<form id="fdata" method="POST">
<div class="input-group">
<textarea id="chat_text" name="chat_text" class="form-control chat-box" placeholder="Type a message" style="height:42px;border:1px solid #d1d1d1;border-radius:4px;resize: none;padding-top:10px;padding-bottom:10px;padding-left:15px;border:none"></textarea>
<span class="input-group-btn">
<button class="btn special btn-default btn-circle" type="button" id="po" style="margin-left:5px;border-radius: 50%;"><i class="fa fa-check"></i></button>
</span>
</div>
</form>
</nav>


<nav class="navbar navbar-default navbar-fixed-bottom col-md-8 col-md-offset-4 col-xs-12 visible-xs" id="r2" style="border:none;background-color:#fff;padding:5px;padding-bottom:0px;padding-right:10px">
<form id="fdata" method="POST">
<div class="input-group">
<textarea id="mchat_text" name="chat_text" class="form-control chat-box mchat" placeholder="Type a message" style="height:32px;border:1px solid #d1d1d1;border-radius:4px;resize: none;padding-top:10px;padding-bottom:5px;padding-left:5px;border:none"></textarea>
<span class="input-group-btn">
<button class="btn special btn-default btn-circle" type="button" id="mpo" style="text-align:center;width:35px;height:35px;margin-left:5px;border-radius: 50%;"><i class="fa fa-check" style="font-size:14px;"></i></button>
</span>


</div>
</form>
</nav>


</div>
</div>
</div>
</div>
</div>



<!-- MODal-->
<div class="modal fade" id="gridSystemModal2" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel2" style="padding: 0px;">
<div class="modal-dialog" role="document" style="width:100%;height:100%;padding:0px;margin:0;">
<div class="modal-content">
<div class="modal-header" style="border:none;padding:0px;padding-bottom: 10px;padding-top: 15px;">

<div class="container">
<div class="row" style="padding-top: 0px;">
<div class="col-md-3 col-xs-4" >

<button type="button" id="cprofile" style="float: left;" class="close" data-dismiss="modal" aria-label="Close"><img src="http://localhost/chatox/public/img/goback.jpg" width="25" /></button>
</div>
<div class="col-md-2 col-xs-3 col-xs-offset-5 col-md-offset-7">
<h6><a class="btn btn-file" href="logout/" role="button">Leave</a></h6>
</div>
</div>
</div>




</div>
<div class="modal-body" style="padding: 0px;padding-right: 5px;">
<div class="container">
<div class="row" style="">
<div class="col-md-1 col-md-offset-2 col-xs-3 col-xs-offset-0" style="background-image:url('showimage/');background-size: 100% 100%;border-radius: 50%;width:60px;height: 60px">

<!-- <img class="img-circle" src="showimage/" width="55" /> -->

</div>
<div class="col-md-6 col-xs-9" style="">
<h6 style="margin-bottom: 0px;padding:5px;background-color: #f1f1f1;border-radius:5px;">
<?= $data['group_title']; ?>
</h6>
<h6><span>Key: <?= $data['group_key']; ?></span></h6>
</div>
</div>
</div>

<div class="container">
<div class="row" style="padding-top: 20px;">
<div class="col-md-7 col-md-offset-2 col-xs-12 col-xs-offset-0" style="padding: 0px">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home1" aria-controls="home" role="tab" data-toggle="tab"><h6 style="margin:0;padding:0;">Description</h6></a></li>
    <li role="presentation"><a href="#prof" id="getpe" aria-controls="prof" role="tab" data-toggle="tab"><h6 style="margin:0;padding:0;">People</h6></a></li>
  </ul>
</div>
</div>
<div class="row" style="padding-top: 5px;">
<div class="col-md-7 col-md-offset-2 col-xs-12 col-xs-offset-0" style="padding: 0px">
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home1">
    <h6 style="text-align: justify;padding:5px;background-color: #f1f1f1;border-radius: 5px;"><?= $data['group_desc'];?></h6>
    </div>
    <div role="tabpanel" class="tab-pane" id="prof">
hello
      </div>

</div>
</div>
</div>


</div>
</div>
</div>
</div>


<script src="http://localhost/chatox/public/js/jquery.min.js"></script>
<script src="http://localhost/chatox/public/js/bootstrap.min.js"></script>
<script src="http://localhost/chatox/public/js/enscroll-0.6.2.min.js"></script>
<script src="http://localhost/chatox/public/js/script.js"></script>

</body>
</html>