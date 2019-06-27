<?php
if (!defined("_VALID_PHP")) {
    die('Direct access to this location is not allowed.');
}
class user {
  protected static $table = 'users';

  public static function save($data)
  {
      $params = [];
      foreach ($data as $k => $item) {
        $params[':' . $k] = $item;
      }
      return App::$db->exec('INSERT INTO ' . self::$table . ' (serial, email, name, hash, is_active, created_at) VALUES ( :serial, :email, :name, :hash, :is_active, :created_at)', $params);
  }

  public static function get_list ()
  {
    return App::$db->getAll('SELECT * FROM ' . self::$table);
  }

  public static function exists ($serial)
  {
    return (bool)App::$db->getOne('SELECT id FROM ' . self::$table . ' WHERE serial = :serial LIMIT 1', [':serial' => $serial])['id'];
  }

  public static function update ($data, $serial)
  {
    $params = [
      ':serial' => $serial
    ];
    foreach ($data as $k => $value) {
      $params[':' . $k] = $value;
      $columns[] = $k . ' = :' . $k;
    }
    return App::$db->exec('UPDATE ' . self::$table . ' SET ' . (implode(', ', $columns)) . ' WHERE serial = :serial', $params);
  }

  public static function find_one ($serial)
  {
    return App::$db->getOne('SELECT * FROM ' . self::$table . ' WHERE serial = :serial LIMIT 1', [':serial' => $serial]);
  }


}
