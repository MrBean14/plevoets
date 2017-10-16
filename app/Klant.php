<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Klant extends Model
{
    protected $table = 'klanten';

    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'klanten.naam' => 1,
            'klanten.voornaam' => 2,
            'klanten.straat' => 3,
            'klanten.postcode' => 4
        ]
    ];
}