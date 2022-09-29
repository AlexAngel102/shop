<?php

namespace App\Controllers;

use App\Models\ItemModel;

class ItemController extends Controller
{
    public static function getItems()
    {
        if(key_exists('id', $_GET) && self::check($_GET['id'])){
            $id = $_GET['id'];
        } else {
            http_response_code(403);
        }
        if(key_exists('order', $_GET) && self::check($_GET['order'])){
            $order = $_GET['order'];
            return ItemModel::getItems($id, $order);
        } else {
            return ItemModel::getItems($id);
        }
    }

}