<?php

declare (strict_types=1);
namespace Rector\BetterPhpDocParser\ValueObject;

use PHPStan\PhpDocParser\Ast\PhpDoc\ParamTagValueNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocTagValueNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\PropertyTagValueNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\ReturnTagValueNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\ThrowsTagValueNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\VarTagValueNode;
final class NodeTypes
{
    /**
     * @var array<class-string<PhpDocTagValueNode>>
     */
    public const TYPE_AWARE_NODES = [\PHPStan\PhpDocParser\Ast\PhpDoc\VarTagValueNode::class, \PHPStan\PhpDocParser\Ast\PhpDoc\ParamTagValueNode::class, \PHPStan\PhpDocParser\Ast\PhpDoc\ReturnTagValueNode::class, \PHPStan\PhpDocParser\Ast\PhpDoc\ThrowsTagValueNode::class, \PHPStan\PhpDocParser\Ast\PhpDoc\PropertyTagValueNode::class];
    /**
     * @var string[]
     */
    public const TYPE_AWARE_DOCTRINE_ANNOTATION_CLASSES = ['Typo3RectorPrefix20210418\\JMS\\Serializer\\Annotation\\Type', 'Doctrine\\ORM\\Mapping\\OneToMany', 'Typo3RectorPrefix20210418\\Symfony\\Component\\Validator\\Constraints\\Choice', 'Typo3RectorPrefix20210418\\Symfony\\Component\\Validator\\Constraints\\Email', 'Typo3RectorPrefix20210418\\Symfony\\Component\\Validator\\Constraints\\Range'];
}
