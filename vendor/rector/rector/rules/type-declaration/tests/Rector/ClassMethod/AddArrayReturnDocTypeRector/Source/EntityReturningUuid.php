<?php

declare (strict_types=1);
namespace Rector\TypeDeclaration\Tests\Rector\ClassMethod\AddArrayReturnDocTypeRector\Source;

use Typo3RectorPrefix20210330\Ramsey\Uuid\Uuid;
use Typo3RectorPrefix20210330\Ramsey\Uuid\UuidInterface;
final class EntityReturningUuid
{
    public function getId() : \Typo3RectorPrefix20210330\Ramsey\Uuid\UuidInterface
    {
        return \Typo3RectorPrefix20210330\Ramsey\Uuid\Uuid::uuid4();
    }
}
