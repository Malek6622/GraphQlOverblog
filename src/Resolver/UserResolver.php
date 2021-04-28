<?php

namespace App\Resolver;

use App\Entity\User;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;
use App\Repository\UserRepository;

class UserResolver implements ResolverInterface, AliasedInterface
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
     $this->userRepository = $userRepository;
    }

    /**
     * @param int $id
     * @return User
     */
    public function resolve(int $id)
    {
        return $this->userRepository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases(): array
    {
        return [
            'resolve' => 'User',
        ];
    }

}