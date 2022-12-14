<?php

namespace App\Models;

use App\Classes\DBConnection;

class CategoryModel
{

    public static function getCategories(): array|null
    {
        $query =
            "
            SELECT
              category.*,
              COUNT(items.category_id) AS amount
            FROM items
              INNER JOIN category
                ON items.category_id = category.category_id
              GROUP BY category.category_id
        ";
        $statement = DBConnection::connect()->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(DBConnection::FETCH_ASSOC);
        if (empty($result)) {
            return null;
        }
        return $result;
    }

}