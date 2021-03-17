<?php

declare (strict_types=1);
namespace Rector\BetterPhpDocParser\Tests\PhpDocParser\TagValueNodeReprint\Fixture\AssertType;

use Typo3RectorPrefix20210317\Symfony\Component\Validator\Constraints as Assert;
final class AssertStringQuotedType
{
    /**
     * @Assert\Type("string")
     */
    public $someStringProperty;
}
