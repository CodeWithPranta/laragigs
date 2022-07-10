<?php
namespace App\Models;

class Listing {
    public static function all(){
      return [
        [
            'id' => 1,
            'title' => 'Listing One',
            'description' => 'Here paste or grab some dummy text',
        ],
        [
            'id' => 1,
            'title' => 'Listing One',
            'description' => 'Here paste or grab some dummy text',
        ],
    ];
    }
}
