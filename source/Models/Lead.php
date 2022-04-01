<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Lead extends DataLayer
{
    public function __construct()
    {
        parent::__construct("pos_leads", ["name", "email", "content"]);
    }
}
