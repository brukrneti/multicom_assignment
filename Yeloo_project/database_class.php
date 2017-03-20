<?php
class Database {
    const server = "localhost";
    const username = "username";
    const password = "password";
    const db = "yelooDB";

    private $connection = null;
    private $errorMsg = "";

    // Create connection
    public function ConnectDB(){
        $this->connection = new mysqli(self::server, self::username, self::password, self::db);
        // Check connection
        if ($this->connection->connect_errno) {
            echo "Connecting to database failed: " . $this->connection->connect_errno . ", " . $this->connection->connect_error;
            $this->errorMsg = $this->connection->connect_error;
        }
        $this->connection->set_charset("utf8");
        if ($this->connection->connect_errno) {
            echo "Charset setting failed: " . $this->connection->connect_errno . ", " .
                $this->connection->connect_error;
            $this->errorMsg = $this->connection->connect_error;
        }
        return $this->connection;
    }

    public function DisconnectDB () {
        $this->connection->close();
    }

    public function SelectDB($query) {
        $result = $this->connection->query($query);
        if ($this->connection->connect_errno) {
            echo "There was an error in SQL syntax: {$query} - " . $this->connection->connect_errno . ", " .
                $this->connection->connect_error;
            $this->errorMsg = $this->connection->connect_error;
        }
        if (!$result) {
            $result = null;
        }
        return $result;
    }

    public function UpdateDB($query, $script = '') {
        $result = $this->connection->query($query);
        if ($this->connection->connect_errno) {
            echo "There was an error in SQL syntax: {$query} - " . $this->connection->connect_errno . ", " .
                $this->connection->connect_error;
            $this->errorMsg = $this->connection->connect_error;
        } else {
            if ($script != '') {
                header("Location: $script");
            }
        }

        return $result;
    }

    public function ErrorDB() {
        if ($this->errorMsg != '') {
            return true;
        } else {
            return false;
        }
    }


    // Create database
    /*$sql = "CREATE DATABASE myDB";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $conn->close();*/
}
?>
