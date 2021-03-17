<?php

declare (strict_types=1);
namespace Rector\Doctrine\Tests\Rector\ClassMethod\ChangeReturnTypeOfClassMethodWithGetIdRector\Source;

use Typo3RectorPrefix20210317\Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Building
{
    private $id;
    public function getId() : \Typo3RectorPrefix20210317\Ramsey\Uuid\UuidInterface
    {
        return $this->id;
    }
}
