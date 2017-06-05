<!-- <div class="modal fade" id="gridSystemModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="gridSystemModalLabel">Create a Group</h4>
</div>
<div class="modal-body" style="padding-bottom: 0px;">
<div class="row">
<div class="col-md-1 col-xs-2">
<img src="download.png" width="50px;" class="img-circle"/>
</div>
<div class="col-md-11 col-xs-10" ">
<form name="c_group" method="POST" action="create/">
<div class="form-group" style="margin:0">
<input type="text" class="form-control chat-box info" name="cg_title" id="exampleInputEmail1" placeholder="Group Title" style="height:50px;border:none;border-radius:0px;border-bottom:2px solid #f1f1f1;">
</div>
</div>
</div>
<div class="row">
<div class="col-md-1 col-xs-2"></div>
<div class="col-md-11 col-xs-10"><textarea class="form-control chat-box info" name="cg_desc"  placeholder="Description about the group (200 words)" rows="6" style="border:none;width:100%;outline:none;border-radius:0px;resize:none"></textarea></div>
</div>
<div class="row" style="background-color: #f1f1f1;padding-top: 20px;padding-bottom: 20px;">
<div class="col-md-6 info">
<div class="btn-group" data-toggle="buttons">
<label class="btn btn-primary t">
<input type="radio" name="cg_type" id="option2" value="0" autocomplete="off"> Open Group
</label>
<label class="btn btn-primary info">
<input type="radio"  name="cg_type" id="option3" value="1" autocomplete="off"> Closed Group
</label>
</div>
</div>
<div class="col-md-3 col-md-offset-3">
<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>Create</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div> -->

<div class="modal fade" id="gridSystemModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="padding: 0px;">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header" style="border:none;padding-bottom: 10px;padding-top: 10px;">
<form name="createGroup" action="create/" method="POST" enctype="multipart/form-data">
<button type="button" style="float: left;" class="close" data-dismiss="modal" aria-label="Close"><img src="http://localhost/chatox/public/img/cross.svg" width="40"/></button>
<button type="submit" name="create" class="btn btn-primary special fcur" style="float:right;">Start</button>
</div>
<div class="modal-body" style="padding-bottom: 0px;margin:10px;padding-top: 0px;padding-bottom: 0px;">
<div class="row" style="background-color: #f1f1f1;border-radius: 2px;">
<div class="col-md-2 col-xs-3" style="padding-left:5px;padding-top:3px;padding-bottom: 3px;">

  <label class="btn btn-default btn-file">
    <img class="img-circle" src="http://localhost/chatox/public/img/user.png" width="50"/><input type="file" name="image" hidden>
</label>
</div>
<div class="col-md-10 col-xs-9" style="padding-right:3px;padding-left:0px;padding-top:3px;padding-bottom: 3px;">

<div class="form-group" style="margin:0">
<input type="text" class="form-control chat-box info" name="cg_title" id="exampleInputEmail1" placeholder="Group Name" style="height:50px;border:none;border-radius:3px;">
</div>
</div>
</div>
<div class="row" style="margin-top:20px;margin-bottom: 20px;background-color: #f1f1f1;border-radius: 2px;">
<div class="col-md-12 col-xs-12" style="padding: 3px;"><textarea class="form-control chat-box info" name="cg_desc"  placeholder="Description (200 words)" rows="4" style="border:none;width:100%;outline:none;border-radius:3px;resize:none"></textarea></div>
</form>
</div>
</div>
</div>
</div>
</div>

