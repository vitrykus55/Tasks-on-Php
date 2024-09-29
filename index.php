<?php

class DataBaseConnection
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password_db = "root";
        $dbname = "logini_db";
        $port = 3306;
        $socket = '/Applications/MAMP/tmp/mysql/mysql.sock';

        try {
            $this->connection = new mysqli($servername, $username, $password_db, $dbname, $port, $socket);

            if ($this->connection->connect_error) {
                throw new Exception("Connection failed: " . $this->connection->connect_error);
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
            echo 'Error: ' . $error;
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new DataBaseConnection();
        }
        return self::$instance;
    }

    public function query($sql)
    {
        return $this->connection->query($sql);
    }

    public function prepare($sql)
    {
        return $this->connection->prepare($sql);
    }
}

$db = DataBaseConnection::getInstance();
$result = $db->query("SELECT * FROM user");

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo $row['name'] . " - " . $row['email'] . "<br>";
    }
}

$db2 = DataBaseConnection::getInstance();
$statement = $db2->prepare("SELECT * FROM user WHERE email = ?");
$email = 'test@example.com';  
$statement->bind_param('s', $email);
$statement->execute();
$user_result = $statement->get_result();

while ($user = $user_result->fetch_assoc()) {
    echo $user['name'] . " - " . $user['email'] . "<br>";
}
