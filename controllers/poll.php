<?php

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$session = new Session();
$chat_id = $session->get('chat_id');
$group_id = $session->get('group_id');
$user_id = $session->get('user_id');

$data = App::get('database')
        ->select('group_user_chats')
        ->values('id', 'group_user_chats.user_id', 'users.user_name', 'chat_text')
        ->join('users', 'ON', 'group_user_chats.user_id', '=', 'users.user_id')
        ->where('id', '>', $chat_id)
        ->andWhere('group_id', '=', $group_id)
        ->orderBy('group_user_chats.id')
        ->getAll();

$data = change_data($data, $user_id);

$startedAt = time();

do
{
  if ((time() - $startedAt) > 1)
  {
    die();
  }
  if(isset($data) && !empty($data))
  {
      $count = count($data);
      $max_id = $data[$count-1]['id'];
      $max_id = substr($max_id, 1);
      echo 'data:' .  json_encode($data) ."\n\n";
      ob_flush();
      flush();
      $session->set('chat_id', $max_id);
      unset($data);
  }

  sleep(1);

} while(true);




function change_data($data, $uid)
{
  $i = 0;
  foreach ($data as $ar)
  {
    if($ar['user_id'] == $uid)
    {
      $data[$i]['id'] = 'l' . $ar['id'];
      $data[$i]['user_name'] = "You";
    }

    else
      $data[$i]['id'] = 'r' . $ar['id'];

    unset($data[$i]['user_id']);
    $i++; 
  }

  return $data;
}

