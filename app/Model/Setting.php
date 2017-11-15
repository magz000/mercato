<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public static function pull($key, $expect) {
        $set = Setting::where('key', '=', $key)->get()->first()->value;
        switch ($expect) {
            case 'array':
                return (array) explode(',', $set);
                break;

            default:
                # code...
                break;
        }
    }
}
