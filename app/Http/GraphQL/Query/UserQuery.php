<?php

namespace App\Http\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Models\User;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'Find an user.'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function fields()
    {
        return [
            'id' => [
                'name'        => Type::nonNull(Type::string()),
                'description' => 'name of user',
            ],
            'posts' => [
                'args' => [
                    'id' => [
                        'type'        => Type::string(),
                        'description' => 'id of the post',
                    ],
                ],
                'type'        => Type::listOf(GraphQL::type('Post')),
                'description' => 'post description',
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return User::find($args['id']);
    }
}
