<?php

declare (strict_types=1);
namespace Rector\Doctrine\Tests\Rector\ClassMethod\ChangeReturnTypeOfClassMethodWithGetIdRector\Source;

use Typo3RectorPrefix20210302\Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Building
{
    private $id;
    public function getId() : \Typo3RectorPrefix20210302\Ramsey\Uuid\UuidInterface
    {
        return $this->id;
    }
}
