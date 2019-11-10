<?php

namespace Citrus\Models;

use Citrus\Init\Model;
use \PDO;

class AdministratorModel extends Model
{
    protected $table_name = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    public function check_admin_login($username, $password)
    {
        $password = md5($password);
        $query = "SELECT user_id 
                  FROM ".DB_NAME.".".$this->table_name."
                  WHERE user_username = :username AND user_password = :password";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([':username'=>$username, ':password'=>$password]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['user_id'] : false;
    }
}
