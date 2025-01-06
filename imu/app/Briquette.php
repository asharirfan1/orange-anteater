<?php

namespace Teplokvartal;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Briquette extends Model
{
    protected $guarded = [];

    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'name' => 10,
            'desc' => 10,
            'content' => 10,
        ],
    ];
}
