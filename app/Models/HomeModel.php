<?php

namespace Citrus\Models;

use Citrus\Init\Model;
use \PDO;

class HomeModel extends Model
{
    protected $table_name = 'products';

    public function __construct($db_name = DB_NAME)
    {
        parent::__construct($db_name);
    }

    public function get_products()
    {
        $query = "SELECT product_image, product_title, product_description FROM ".DB_NAME.".".$this->table_name;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
