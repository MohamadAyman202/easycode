<?php

namespace App\Interface;

interface SystemInterface
{
    // Start Version (1)

    /**
     * Function Store Database
     * @param $model Required Please Enter First Model Create Source (2) Please Enter End Model Image Create pass (3) Argument value 2 From Array
     * @param $data Required
     * @param $name_en null
     * @param $var_relationship Null
     * @param $relationship_name Null
     * @param $relationship_value Null
     * @param $message Required
     * @param $column_id relations image Table Not Required
     * @return Response
     */
    public function store(array $model, array $data, array $var, string $message, $request = null, string $name_en = null, string $relationship_name = null, string $relationship_value = null, string $column_id = null,);

    /**
     * Function Update Database
     * @param $model Required Please Enter First Model Create Source (2) Please Enter End Model Image Create pass (3) Argument value 2 From Array
     * @param $id Required
     * @param $data Required
     * @param $name_en null
     * @param $var_relationship Null
     * @param $relationship_name Null
     * @param $relationship_value Null
     * @param $message Required
     * @param $relations Datatype String
     * @param $image Datatype String
     * @param $column_id relations image Table Not Required
     * @return Response
     */
    public function update(array $model, int $id, array $data, array $var, string $message, $request = null, string $name_en = null, string $relationship_name = null, string $relationship_value = null, string $column_id = null,  string $relations = null, string $image = null);

    /**
     * Function Delete
     * @param $model Required Datatype String 
     * @param $id Required Datatype Integer
     * @param $message Required
     * @param $relations Datatype String
     * @param $image Datatype String
     */

    public function delete(string $model, int $id, string $message, string $relations = null, string $image = null);
}
