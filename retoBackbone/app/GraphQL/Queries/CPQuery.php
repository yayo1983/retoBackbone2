<?php

namespace App\GraphQL\Queries;

use App\Models\PostalCode;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class CPQuery extends Query
{
    protected $attributes = [
        'name' => 'cp',
    ];

    public function type()
    {
        return GraphQL::type('CP');
    }

    public function args()
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
        return Wine::findOrFail($args['id']);
    }
}