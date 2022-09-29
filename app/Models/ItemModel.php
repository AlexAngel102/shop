<?php

namespace App\Models;
use App\Classes\DBConnection;

class ItemModel
{

    public static function getItems(int $category_id, string $order = "name")
    {
        $query =
            "
            SELECT *
            FROM items
            WHERE category_id = :id
            ORDER BY :order
        ";
        $statement = DB->prepare($query);
        $statement->bindParam(':id', $category_id);
        switch ($order){
            case "price":
                $sort = "price";
                break;
            case "date":
                $sort = "date";
                break;
            default:
                $sort = "name";
        }
        $statement->bindParam(':order', $sort);
        $statement->execute();
        $result = $statement->fetchAll(DBConnection::FETCH_ASSOC);
        if (empty($result)) {
            return;
        }
        return $result;

    }

    public static function getItem(int $id)
    {

    }
}