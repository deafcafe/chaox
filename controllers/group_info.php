<?php

$gid = $session->get('group_id');


$data = App::get('database')->selectAll('groups')->where('group_id', '=', $gid)->get();
