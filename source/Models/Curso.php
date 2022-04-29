<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Curso extends DataLayer
{
    public function __construct()
    {
        parent::__construct("pos_cursos", ["nome", "sobre_o_curso"]);
    }
}
