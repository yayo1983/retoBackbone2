<?php

namespace App\GraphQL\Queries;

use App\Models\PostalCode;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CPQuery extends Query
{
    protected $attributes = [
        'name' => 'CP',
    ];

    public function type(): Type
    {
       // return Type::nonNull(Type::listOf(Type::nonNull(GraphQL::type('CP'))));
        return Type::nonNull(GraphQL::type('CP'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['id'])) {
            return PostalCode::where('id' , $args['id'])->get();
        }
    }
}