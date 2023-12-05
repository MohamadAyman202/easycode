<?php

namespace App\Trait;

trait API
{
    static public function data(object $data = null, int $status, string $msg)
    {
        $array = [
            'data'      => $data,
            'status'    => $status,
            'msg'       => $msg
        ];

        return response($array);
    }
}
