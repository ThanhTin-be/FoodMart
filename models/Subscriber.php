
<?php
require_once ROOT . "core/database.php";

class Subscriber extends Database {
    protected $table = "subscribers";

    public function findByEmail($email) {
        $sql = "SELECT * FROM $this->table WHERE email = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            die("❌ Query prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function create($userId, $email) {
        $sql = "INSERT INTO $this->table (user_id, email) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            die("❌ Insert prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("is", $userId, $email);
        return $stmt->execute();
    }
}
