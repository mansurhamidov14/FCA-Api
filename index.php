<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once 'App.php';
$action = @$_GET['action'];
$registered_actions = ['add_user', 'get_users', 'activate_user', 'check_serial_status'];
if (!in_array($action, $registered_actions)) {
  print json_encode([
    'success'    => false,
    'status'     => 404,
    'message'    => 'Unregistered action'
  ]);
  die;
}

require_once './routes/' . $action . '.php';
?>
