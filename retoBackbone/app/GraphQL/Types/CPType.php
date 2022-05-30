<?php

namespace App\GraphQL\Types;

use App\Models\PostalCode;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CPType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CP',
        'locality' => '',
        'zip_code' => '',
        'model' => PostalCode::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the postal code',
            ],
            'locality' => [
                'locality' => Type::nonNull(Type::string()),
                'description' => 'The name of the locality',
            ],
            /* 'settlements' => [
                'type' => Type::listOf(GraphQL::type('Settlement')),
                'description' => 'List of settlements'
            ] */
            /* 's_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'List of settlements',
            ] */
        ];
    }
}