<?php

namespace Teplokvartal;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Order extends Model
{
    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'client_name' => 10,
            'phone1' => 10,
            'phone2' => 10,
            'email' => 10,
            'question' => 10,
        ],
    ];

    protected $guarded = [];
}
