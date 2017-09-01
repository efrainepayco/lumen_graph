<?php

namespace App\Http\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class PoductsQuery extends Query
{
    protected $attributes = [
        'name' => 'PoductsQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        //return Type::listOf(Type::string());
        return GraphQL::type('Product');
    }

    public function fields()
    {
        return [
            'id' => [
                'type'        => Type::nonNull(Type::int()),
                'description' => 'Id of user',
            ],
            'users' => [
                'args' => [
                    'id' => [
                        'type'        => Type::int(),
                        'description' => 'id of the user',
                    ],
                    'name' => [
                        'type'        => Type::string(),
                        'description' => 'name of the user',
                    ],
                ],
                'type'        => Type::listOf(GraphQL::type('User')),
                'description' => 'user description',
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        
        return 1;
    }
}
