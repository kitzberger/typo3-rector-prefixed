<?php

declare (strict_types=1);
namespace Rector\Tests\Autodiscovery\Rector\Class_\MoveValueObjectsToValueObjectDirectoryRector\Source\Repository;

class PrimitiveValueObject
{
    /**
     * @var string
     */
    private $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function getName() : string
    {
        return $this->name;
    }
}
