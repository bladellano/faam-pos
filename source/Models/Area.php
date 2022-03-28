<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Area extends DataLayer
{
    public function __construct()
    {
        parent::__construct("pos_areas", ["nome", "descricao"]);
    }

    public function save(): bool
    {

        if (empty($this->nome) || !filter_var($this->nome, FILTER_DEFAULT)) {
            $this->fail = new \Exception("Informe o nome");
            return false;
        }

        $result = $this->find("slug = :s", "s={$this->slug}")->count();

        if ($result && !$this->id) {
            $this->fail = new \Exception("Registro já existente ou com mesmo nome na base");
            return false;
        }

        if (!parent::save()) {
            return false;
        }

        return true;
    }
}
