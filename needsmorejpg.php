<?php
include_once "header.php";

?>
<script>
function _(el){
  return document.getElementById(el);
}

function uploadFile(){
	var file = _("file1").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "upload_parser.php");
	ajax.send(formdata);
}
function progressHandler(event){
	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
  if (percent == 100){
    _("status").innerHTML = "Processing...";}
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	// _("status").innerHTML = "Processing Complete!"
	//_("progressBar").value = 0;
  window.location = event.target.responseText;
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}

</script>
<html>

<div class="moar">
<div class="JPGUpload">
  <h1>Need more jpg??</h1>
  <h2>Get some here...</h2>
  <!--<form action="includes/needsmorejpg-inc.php" method="POST" enctype="multipart/form-data"> -->
  <form id="upload_form" method="POST" enctype="multipart/form-data">
    <input type="file" name="file1" id="file1"><br>
    <button type="button" value="Upload File" class="nav-button" onclick="uploadFile()" name="submit"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
    <progress id="progressBar" value="0" max="100" class="uploadBar"></progress>
    <h3 id="status"></h3>
    <p id="loaded_n_total"></p>
  </form>
</div>
</div>


</html>

<?php
include_once "footer.php";

?>
