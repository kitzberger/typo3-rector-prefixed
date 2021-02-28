<?php

declare (strict_types=1);
namespace Rector\Doctrine\Tests\Rector\MethodCall\ChangeGetUuidMethodCallToGetIdRector\Source;

use Typo3RectorPrefix20210228\Doctrine\ORM\Mapping as ORM;
use Typo3RectorPrefix20210228\Ramsey\Uuid\UuidInterface;
/**
 * @ORM\Entity
 */
class Car
{
    private $uuid;
    public function getUuid() : \Typo3RectorPrefix20210228\Ramsey\Uuid\UuidInterface
    {
        return $this->uuid;
    }
}
