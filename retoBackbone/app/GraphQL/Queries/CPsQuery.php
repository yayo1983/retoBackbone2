<?php

namespace App\GraphQL\Queries;

use App\Models\PostalCode;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class CPsQuery extends Query
{
    protected $attributes = [
        'name' => 'cps',
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('CP'));
    }

    public function resolve($root, $args)
    {
        return PostalCode::all();
    }
}