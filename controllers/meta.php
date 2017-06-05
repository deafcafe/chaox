<?php

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

@$online = App::get('database')->count("*", 'user_group')->where('gid', '=', $gid)->andWhere('status', '=', 1)->get();

@$joined = App::get('database')->count('*', 'user_group')->where('gid', '=', $gid)->get();

@$online_count = $online['count(*)'];

@$joined_count = $joined['count(*)'];

@$meta = [
	"online" => $online_count,
	"joined" => $joined_count
];

startedAt = time();

do
{
  if ((time() - $startedAt) > 1)
  {
    die();
  }
  if(isset($meta) && !empty($meta))
  {
      echo 'meta:' .  json_encode($meta) ."\n\n";
      ob_flush();
      flush();
      unset($meta);
  }

  sleep(1);

} while(true);