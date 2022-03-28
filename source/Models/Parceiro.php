<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Parceiro extends DataLayer
{
    public function __construct()
    {
        parent::__construct("pos_parceiros", ["name", "image", "description"]);
    }

    public function save(): bool
    {

        if (empty($this->name) || !filter_var($this->name, FILTER_DEFAULT)) {
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
