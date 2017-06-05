<?php

$uploaddir = '/opt/lampp/uploads/';
$session = new Session();
$gid = $session->get('group_id');
$data = App::get('database')->selectAll('groups')->where('group_id', '=', $gid)->get();
$newfile = $data['gpic_original_name'];
header("Content-Type: " . $data['gpic_mime_type']);
readfile($uploaddir.$data['g_picname']);