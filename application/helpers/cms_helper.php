<?php 

function btn_edit($uri){
	return anchor($uri, '<i class="icon-edit"></i>');
}
function btn_delete($uri){
	return anchor($uri, 'Delete', array('onclick' => "return confirm('You are about to delete a record, and may remove all components attached. This cannot be undone. Are you sure?');", 'class' => 'btn btn-danger'));
}
function btn_deactivate($uri){
	return anchor($uri, '<i class="icon-remove"></i>', array('onclick' => "return confirm('You are about to deactivate an equipment item, and may remove all components attached to it. This cannot be undone. Are you sure?');"));
}
function btn_view($uri) {
	return anchor($uri, '<i class="icon-eye-open"></i>');
}
function btn_image($uri) {
	return anchor($uri, '<i class="icon-picture"></i>');
}
function btn_pdf($uri) {
	return anchor($uri, '<i class="icon-book"></i>');
}
function btn_active($uri) {
	return anchor($uri, '<i class="icon-star-empty"></i>');
}
function btn_rename($uri) {
	return anchor($uri, '<i class="icon-comment"></i>');
}
function btn_accept($uri){
	return anchor($uri, '<i class="icon-ok"></i>', "class='acceptBtn'");
}
function btn_decline($uri){
	return anchor($uri, '<i class="icon-remove"></i>', array('onclick' => "return confirm('Are you sure you want to decline this image from your gallery?');", 'class' => 'declineBtn'));
}
/*--------------------------------------------------------------------------
	encode($id) used througout controllers to encrypt and double url  
	encode an ID to be passed through the url. We double url encode to 
	avoid additional '/' in the encrypted ID. This would break the uri 
	segments in codeigniter. 	
--------------------------------------------------------------------------*/
function encode($id) {
	$this->load->library('encrypt');
	$id = $this->encrypt->encode($id);
	$id = urlencode($id);
	$id = urlencode($id);
	return $id;
}

/*--------------------------------------------------------------------------
	decode() rolls back the encryption used on a variable with the encode 
	function. Note we have to double url decode. 
--------------------------------------------------------------------------*/
function decode($id) {
	$id = urldecode($id);
	$id = urldecode($id);
	$id = $this->encrypt->decode($id);
	return $id;
}