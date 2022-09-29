<?php

namespace App\Controllers;

use App\Models\ItemModel;

class ItemController extends Controller
{
    public static function getItems()
    {
        $order = self::check($_GET['order']);
        $id = self::check($_GET['categoryId']);
        if ($order) {
            ItemModel::getItems($id, $order);
        } else {
            ItemModel::getItems($id);
        }
    }

}