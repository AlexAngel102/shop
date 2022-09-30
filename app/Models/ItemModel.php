<?php

namespace App\Models;

use App\Classes\DBConnection;

class ItemModel
{

    public static function getItems(int $category_id, string $orderBy = "name")
    {
        $query =
            "SELECT *
             FROM items
             WHERE category_id = :id
        ";
        $statement = DB->prepare($query, [DBConnection::ATTR_CURSOR => DBConnection::CURSOR_SCROLL]);
        $statement->bindParam(':id', $category_id);
        $statement->execute();
        $result = $statement->fetchAll();

        if (empty($result)) {
            return;
        }

        $order = 'ascending';
        switch ($orderBy) {
            case "price":
                $column = "price";
                $order = 'descending';
                break;
            case "date":
                $column = "date";
                $order = "descending";
                break;
            default:
                $column = "name";
        }

        if ($order == 'ascending' ) {
            usort($result, fn($a, $b) => $a[$column] <=> $b[$column]);
        } else {
            usort($result, fn($a, $b) => strnatcmp($a[$column], $b[$column]) * -1);
        }

        return $result;

    }
}