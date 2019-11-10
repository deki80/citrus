<?php

namespace Citrus\Models;

use Citrus\Init\Model;
use \PDO;

class CommentModel extends Model
{
    protected $table_name = "comments";

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($name, $email, $text)
    {
        try{
            $query = "INSERT INTO ".DB_NAME.".".$this->table_name." (comment_name, comment_email, comment_text)
                  VALUES (:name, :email, :text)";
            $stmt = $this->connection->prepare($query);
            $stmt->execute([':name'=>$name, ':email'=>$email, ':text'=>$text]);
            return "Thank you, comment is waiting for approval...";
        }catch (\PDOException $e) {
            return "Error inserting comment, please contact administrator...";
        }

    }

    public function get_all()
    {
        $query = "SELECT comment_text, comment_name, comment_email, comment_date 
                  FROM ".DB_NAME.".".$this->table_name."
                  WHERE comment_approved = 2 ORDER BY comment_date DESC";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function get_for_approval()
    {
        $query = "SELECT comment_id, comment_text, comment_name, comment_email, comment_date 
                  FROM ".DB_NAME.".".$this->table_name."
                  WHERE comment_approved = 1";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function approve($comment_id)
    {
        $query = "UPDATE ".DB_NAME.".".$this->table_name." SET comment_approved = 2 
                  WHERE comment_id = :comment_id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([':comment_id'=>$comment_id]);
        return $stmt->rowCount() ? true : false;
    }

    public function delete($comment_id)
    {
        $query = "DELETE FROM ".DB_NAME.".".$this->table_name." WHERE comment_id = :comment_id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([':comment_id'=>$comment_id]);
    }
}
