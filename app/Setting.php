<?php

namespace App;

use Config;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'key',
        'value',
    ];

    public static function get($key)
    {
        $setting = new Self();
        $entry = $setting->where('key', $key)->first();

        if(!$entry){
            return;
        }

        return $entry->value;
    }

    public function set($key, $value = null)
    {
        $setting = new self();
        $entry = $setting->where('key', $key)->firstOrFail();
        $entry->value = $value;
        $entry->saveOrFail();
        Config::set('key', $value);

        if(Config::get($key) == $value){
            return true;
        }

        return false;
    }
}
