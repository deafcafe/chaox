  $(document).ready(function() {

  var $w_height = $(window).height();
  var $r0_height = $('#r0').outerHeight();
  var $r2_height = $('#r2').outerHeight();
  var $r1_height = $w_height - $r0_height - $r2_height;
  var $r2_top = $w_height - $r2_height;
  $r1_height += "px";
  $("#r1").css("height", $r1_height);

  $("#po").click(function(event){
    $.ajax({
      url: 'chat/',
      data: {pv: $("#chat_text").val()},
      type: 'POST'
    }).promise().then(function(data) {
      console.log(data);
    });
    $("#chat_text").val('');});

  $("#mpo").click(function(event){
    $.ajax({
      url: 'chat/',
      data: {pv: $("#mchat_text").val()},
      type: 'POST'
    }).promise().then(function(data) {
      console.log(data);
    });
    $("#mchat_text").val('');});

});

  $("#show").click(function(){
    $.get("/chatox/chat/show", function(data){
        alert("Data: " + data);
    });
});




$("#getpe").click(function(event){
   document.getElementById("prof").innerHTML = "";
   $.ajax({
                url: 'showpeople/',
                type: 'POST'
            }).promise().then(function(data) {
                var people = JSON.parse(data);
                for (var value in people) {
                if (people.hasOwnProperty(value)) {
                  name = people[value].user_name;
                  createlist(name, "prof");
            }}

  });
        
});


$("#getpeople").click(function(event){
   document.getElementById("profile").innerHTML = "";
   //document.getElementById("prof").innerHTML = "";
   $.ajax({
                url: 'showpeople/',
                type: 'POST'
            }).promise().then(function(data) {
                var people = JSON.parse(data);
                for (var value in people) {
                if (people.hasOwnProperty(value)) {
                  name = people[value].user_name;
                  createlist(name, "profile");
            }}

  });      
});


function createlist(name, where){
  r = Math.random() * 50 * Math.PI;
  g = Math.random() * 50 * Math.PI;
  b = Math.random() * 50 * Math.PI;
  color = parseInt(r)+","+parseInt(g)+","+parseInt(b);
  li = document.createElement('li');
  li.setAttribute('class', 'list-group-item');
  li.style.display ="inline-block";
  li.style.margin ="5px";
  span = document.createElement('div');
  span.setAttribute('class', 'c');
  span.style.display="inline-block";
  span.style.backgroundColor = "rgb("+color+")";
  t = document.createTextNode(" ");
  span.appendChild(t);
  h5 = document.createElement('h6');
  h5.setAttribute('class' ,'ss');
  text = document.createTextNode(name);
  h5.appendChild(text);
  li.appendChild(span);
  li.appendChild(h5);
  document.getElementById(where).appendChild(li);
}

$('#chat_text').enscroll({
    showOnHover: false,
    verticalTrackClass: 'track3',
    verticalHandleClass: 'handle3'
});

$('.mchat').enscroll({
    showOnHover: false,
    verticalTrackClass: 'track3',
    verticalHandleClass: 'handle3'
});

$('.chats').enscroll({
    showOnHover: false,
    verticalTrackClass: 'track3',
    verticalHandleClass: 'handle3'
});

