<?php

namespace Fdci\Models;

use Fdci\Core\Model;

class UserModel extends Model
{
    protected $table = 'users';

    public function insert($data)
    {
        try {
            $sql = "INSERT INTO $this->table (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':password', $data['password']);

            return $stmt->execute();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function checkEmail($email)
    {
        try {
            $sql = "SELECT COUNT(*) FROM $this->table WHERE email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['email' => $email]);

            $count = $stmt->fetchColumn();

            return $count > 0;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}