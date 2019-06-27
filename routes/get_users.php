<?
if (!defined("_VALID_PHP")) {
    die('Direct access to this location is not allowed.');
}
require_once 'models/user.php';

// $data = user::get_list();
$data = [];
echo json_encode([
  'success' => true,
  'status'  => 200,
  'data'    => $data
]);
