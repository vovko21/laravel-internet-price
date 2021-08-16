<?php

namespace App\Constants;

class Constants {
    public static $OrderId = 'order_id';
    public static $Admin = 'admin';
    public static $User = 'user';

    public static $OrderStatus = array(
        'ZERO' => 0,
        'CREATED' => 1,
        'ACCEPTED' => 2,
        'DECLINED' => -1,
    );
}
