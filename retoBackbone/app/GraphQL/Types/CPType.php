<?php

namespace App\GraphQL\Types;

use App\Models\PostalCode;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CPType extends GraphQLType
{
    protected $attributes = [
        'locality' => '',
        'zip_code' => '',
        'model' => PostalCode::class
    ];

    public function fields()
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
            's_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the settlement',
            ],
           
        ];
    }
}