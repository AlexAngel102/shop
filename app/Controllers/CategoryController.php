<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController
{
    public static function getCategories()
    {
        return CategoryModel::getCategories();
    }

}