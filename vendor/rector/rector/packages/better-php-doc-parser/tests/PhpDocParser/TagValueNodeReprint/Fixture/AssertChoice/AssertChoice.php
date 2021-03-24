<?php

declare (strict_types=1);
namespace Rector\BetterPhpDocParser\Tests\PhpDocParser\TagValueNodeReprint\Fixture\AssertChoice;

use Typo3RectorPrefix20210324\Symfony\Component\Validator\Constraints as Assert;
class AssertChoice
{
    public const RATINGS_DISCRIMINATOR_MAP = ['5star' => 'Typo3RectorPrefix20210324\\App\\Entity\\Rating\\FiveStar', '4star' => 'Typo3RectorPrefix20210324\\App\\Entity\\Rating\\FourStar'];
    public const SMALL_ONE = 'small_one';
    /**
     * @Assert\Choice(choices=AssertChoice::RATINGS_DISCRIMINATOR_MAP, groups={AssertChoice::SMALL_ONE})
     */
    private $ratingType;
}
