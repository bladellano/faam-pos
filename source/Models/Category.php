<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Category extends DataLayer
{
    public function __construct()
    {
        parent::__construct("articles_categories", ["category"]);
    }
}
