<?php

namespace App\Resolver;

use App\Entity\Department;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;
use App\Repository\DepartmentRepository;

class DepartmentsResolver implements ResolverInterface, AliasedInterface
{

    /**
     * @Var DepartmentRepository
     */
    private $departmentRepository;

    /**
     * DepartmentsResolver constructor.
     * @param DepartmentRepository $departmentRepository
     */
    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function resolve()
    {
        return $this->departmentRepository->findAll();
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases(): array
    {
        return [
            'resolve' => 'Departments',
        ];
    }

}
