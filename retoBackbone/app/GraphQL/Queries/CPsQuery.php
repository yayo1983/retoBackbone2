<?php

namespace App\GraphQL\Queries;

use App\Models\PostalCode;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;


class CPsQuery extends Query
{
    protected $attributes = [
        'name' => 'CPs',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('CP'));
    }

    public function resolve($root, $args)
    {
        return PostalCode::all();
    }
}