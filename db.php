<?php

include "env.php";

class db
{

    public $connection;
    public $query;

    public $sql;

    // When I Create Object From This Class This MAgic Method Connected With Database Direct
    public function __construct()
    {
        $this->connection = mysqli_connect(SERVER, USER, PASSWORD, DBNAME);
    }

    // select & where & andWhere & orWhere  Functions Used To Crete Aquery sql 
    public function select($columns, $table)
    {
        $this->sql = "SELECT $columns FROM $table";
        return $this;
    }


    // public function whereOptions($column, $compair, $value){


    // }


    public function where($column, $compair, $value)
    {

        $this->sql .= " WHERE `$column` $compair '$value'";
        return $this;
    }


    public function andWhere($column, $compair, $value)
    {

        $this->sql .= " AND `$column` $compair '$value'";
        return $this;
    }


    public function orWhere($column, $compair, $value)
    {

        $this->sql .= " OR `$column` $compair '$value'";
        return $this;
    }

    // Returning Data As A Multi Dimension Also If The Data is One Record

    public function getAll()
    {
        $this->query();
        while ($row = mysqli_fetch_assoc($this->query)) {

            $data[] = $row;
        }

        return $data;
    }


    // Returning Data As A Indexed Array (One Record)
    public function getRow()
    {
        $this->query();
        $row = mysqli_fetch_assoc($this->query);
        return $row;
    }

    // Function To Inserting Data In dataBase

    // public function insert($table, $data)
    // {

    //     $columns = '';
    //     $values = '';

    //     foreach ($data as $key => $value) {

    //         $columns .= " `$key` ,";
    //         $values .= $this->prepareData($value) . ",";
    //     }

    //     $columns = rtrim($columns, ",");
    //     $values = rtrim($values, ",");


    //     $this->sql = "INSERT INTO `$table` ($columns) VALUES ($values)";

    //     return $this;
    // }

/*
    == Function To Updateing & Inserting Data In dataBase Depands on The Condition [ update | Insert] 
    == we can combaine the query of [Update & Insert] in The Same Function Because There are anthor syntax of insert query like update query
    == "INSERT `$table_name` SET $columns " 
*/
    public function update_insert($table, $data, $condition)
    {
        $columns = $this->buildSql($data);

        if(isset($condition )){

            $condition = strtoupper($condition);

            $this->sql = "$condition `$table` SET $columns";

        }else {

            return false;
        }
        return $this;

    }

    // This Function Used To Making Loop On The Array Of Data To Know [$keys = $columns] => [$value = $values] 

    public function buildSql($data)
    {

        $columns = '';

        foreach ($data as $key => $value) {

            // Check The Values Of Data String Or Integer
            $columns .= " `$key` =" . $this->prepareData($value) . ",";
        }

        $columns = rtrim($columns, ",");

        return $columns;
    }

    // This Function To Check The Values Of Data String Or Integer

    public function prepareData($data)
    {

        if (gettype($data) == 'string') {

            return "' $data '";
        } else {

            return $data;
        }
    }

    // Function To Deleting Data In dataBase

    public function delete($table)
    {

        $this->sql = "DELETE FROM `$table`";

        return $this;
    }

    // function to handle query mysql 

    public function query()
    {

        $this->query = mysqli_query($this->connection, $this->sql);
    }

    // This Function Used To Execute Functions Insert And Update And Delete
    public function exec()
    {
        $this->query();

        if (mysqli_affected_rows($this->connection)) {

            return true;
        } else {
            return false;
        }
    }

    public function __destruct()
    {
        mysqli_close($this->connection);
    }
}
