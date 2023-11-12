<?php
    namespace App\Enums;

    enum OrderStatusEnum{
        const COMPLETE        = 'complete';
        const CANCEL        = 'cancel';
        const PENDING       = 'pending';
        const RETURN     = 'return';
    }
?>