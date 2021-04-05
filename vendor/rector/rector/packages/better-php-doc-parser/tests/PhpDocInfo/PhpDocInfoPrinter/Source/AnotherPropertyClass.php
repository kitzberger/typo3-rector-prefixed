<?php

declare (strict_types=1);
namespace Rector\BetterPhpDocParser\Tests\PhpDocInfo\PhpDocInfoPrinter\Source;

use Typo3RectorPrefix20210405\JMS\Serializer\Annotation as Serializer;
use Typo3RectorPrefix20210405\Symfony\Component\Validator\Constraints as Assert;
final class AnotherPropertyClass
{
    /**
     * @Assert\Type(
     *     "bool"
     * )
     * @Assert\Type("bool")
     * @Serializer\Type("boolean")
     * @var bool
     */
    public $anotherProperty;
}
