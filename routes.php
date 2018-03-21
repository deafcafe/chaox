<?php

/*
* GET Request Routes.
*/
$router->get('chatox', 'controllers/index.php');
$router->get('chatox/views', 'controllers/index.php');
$router->get('chatox/views/partials', 'controllers/index.php');
$router->get('chatox/core', 'controllers/index.php');
$router->get('chatox/core/database', 'controllers/index.php');
$router->get('chatox/chat', 'controllers/chat.php');
$router->get('chatox/chat/show', 'controllers/poll.php');
$router->get('chatox/logout', 'controllers/logout.php');
$router->get('chatox/chat/meta', 'controllers/meta.php');
$router->get('chatox/showimage', 'controllers/show_image.php');

/*
* POST Request Routes.
*/
$router->post('chatox/create', 'controllers/create_group.php');
$router->post('chatox/join', 'controllers/join_group.php');
$router->post('chatox/chat', 'controllers/chat.php');
$router->post('chatox/set', 'controllers/set.php');
$router->post('chatox/showpeople', 'controllers/showpeople.php');


