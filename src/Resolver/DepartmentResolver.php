<?php

namespace App\Resolver;

use App\Entity\Department;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;
use App\Repository\DepartmentRepository;

class DepartmentResolver implements ResolverInterface, AliasedInterface
{
    /**
     * @Var DepartmentRepository
     */
    private $departmentRepository;

    /**
     * DepartmentResolver constructor.
     * @param DepartmentRepository $departmentRepository
     */
    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    /**
     * @param int $id
     * @return Department
     */
    public function resolve(int $id)
    {
        return $this->departmentRepository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases(): array
    {
        return [
            'resolve' => 'Department',
        ];
    }

}
