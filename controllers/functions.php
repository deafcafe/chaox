<?php

function generate_key()
{
	return md5(microtime(). rand());
}

function generate_hash($key, $options)
{
	return password_hash($key, PASSWORD_BCRYPT, $options);
}

function tempnam_sfx($path, $suffix){
        do {
            $file = $path."/".mt_rand().$suffix;
            $fp = @fopen($file, 'x');
        }
        while(!$fp);
        fclose($fp);
        return $file;
}