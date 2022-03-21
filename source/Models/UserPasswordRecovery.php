<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class UserPasswordRecovery extends DataLayer
{
    public function __construct()
    {
        parent::__construct("pos_userspasswordsrecoveries", ["ip", "id_user"], "id", FALSE);
    }
}
