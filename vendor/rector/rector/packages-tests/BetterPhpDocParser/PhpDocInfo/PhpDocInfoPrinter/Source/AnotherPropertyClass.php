<?php

declare (strict_types=1);
namespace Rector\Tests\BetterPhpDocParser\PhpDocInfo\PhpDocInfoPrinter\Source;

use Typo3RectorPrefix20210420\JMS\Serializer\Annotation as Serializer;
use Typo3RectorPrefix20210420\Symfony\Component\Validator\Constraints as Assert;
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
