<?php

/**
 * main model trait
 */
Trait Model
{
    use Database;

    // public $data = [];
    // protected $table = 'users';

    protected $limit = 10;
    protected $offset = 0;
    protected $order_type = "desc";
    protected $order_column = "id";

    public $errors = [];

    /**
     * function
     */
    public function findAll()
    {
        $query = "SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type LIMIT $this->limit offset $this->offset";

        return $this->getRows($query);
    }

    /**
    * function
    */
    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= $key . " = '" . $data[$key] . "' && ";
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != '". $data_not[$key] . "' && ";
        }

        $query = trim($query, " && ");
        $query .= " order by $this->order_column $this->order_type limit $this->limit offset $this->offset";
        $this->getRows($query);
    }

   /**
    * function
    */
    public function first($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= $key . " = '" . $data[$key] . "' && ";
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != '". $data_not[$key] . "' && ";
        }

        $query = trim($query, " && ");
        $query .= " limit $this->limit offset $this->offset";

        $result = $this->getRows($query);

        if ($result) {
            return $result;
        }

        return false;
    }

   /**
    * function
    */
    public function insert($data)
    {
        /** remove unwanted data **/
        // if(!empty($this->allowedColumns))
        // {
        // 	foreach ($data as $key => $value) {

        // 		if(!in_array($key, $this->allowedColumns))
        // 		{
        // 			unset($data[$key]);
        // 		}
        // 	}
        // }

        $keys = array_keys($data);

        $query = "INSERT INTO $this->table (".implode(",", $keys).") values ('".implode("','", $data)."')";
        // $this->getRows($query);

        if ($this->connection->query($query) == true) {
            $this->getQuery($query);
            echo "Data inserted successfully";
            // $this->findAll();
        } else {
            echo "Failed to insert data";
        }

        return false;
    }

   /**
    * function
    */
    public function update($id, $data, $id_column = 'id')
    {
        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";

        foreach ($keys as $key) {
            $query .= $key . " = '" . $data[$key] . "' , ";
        }


        $query = trim($query, " , ");
        $query .= "WHERE $id_column = $id";

        $data[$id_column] = $id;
        // echo $query;
        $this->getQuery($query);

        return false;
        
    }

    /** 
    * function
    */
    public function delete($id, $id_column = 'id')
    {
        $query = "DELETE FROM $this->table WHERE $id_column = $id";

        if ($this->connection->query($query) == true) {
            $this->getQuery($query);
            echo "Data deleted successfully";
        // $this->getQuery($query);
        } else {
            echo "Failed to insert data";
        }

        return false;
        // $this->getRows($query);
    }
}