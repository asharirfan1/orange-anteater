<?php

namespace Teplokvartal;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Question extends Model
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
            'topic' => 10,
            'text' => 10,
            'answer' => 10,
        ],
    ];
}
