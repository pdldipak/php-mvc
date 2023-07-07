<?php

Trait Database
{
    private $connection;

    /**
    * function
    */
    public function __construct()
    {
        $DB_HOST = $_ENV['DB_HOST'];
        $DB_USER = $_ENV['DB_USER'];
        $DB_PASS = $_ENV['DB_PASS'];
        $DB_NAME = $_ENV['DB_NAME'];

        $this->connection = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

        // Check connection
        if ($this->connection->connect_error) {
            $this->connection = die('Connection failed: ' . $this->connection->connect_error);
        }
        // echo 'Connected successfully';
        // die();

        return $this->connection;
    }

    /**
    * function
    */
     public function getQuery($sql)
     {
         $result = $this->connection->query($sql);

         if (! $result) {
             die("Query failed: " . $this->connection->error);
         }

         return $result;
     }

   /**
    * function
    */
     public function getRows($query)
     {
         $result = $this->getQuery($query);
         $data = $result->fetch_all(MYSQLI_ASSOC);

         if ($result->num_rows > 0) {
             echo json_encode($data);
         } else {
             echo "No data found";
         }
     }

    /**
    * function
    */
     public function getRow($query)
     {
         $result = $this->getQuery($query);
         $data = $result->fetch_all(MYSQLI_ASSOC);

         if ($result->num_rows > 0) {
             //  echo json_encode(mysqli_fetch_assoc($result));
             echo json_encode($data[0]);
         } else {
             echo "No data found";
         }
     }

     public function __destruct()
     {
         $this->connection->close();
     }
}
// //Usage example
// $db = new Database();
// $db->connect();

// $result = $db->query("SELECT * FROM users");

// while ($row = $result->fetch_assoc()) {
//     echo $row["name"] . "<br>";
// }

// $db->disconnect();