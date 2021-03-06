<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\PHPStan\Tests\Rules\AddCodeCoverageIgnoreForRectorDefinition\Fixture;

use PhpParser\Node;
use Rector\Core\Contract\Rector\PhpRectorInterface;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
final class SkipWithCodeCoverageIgnore extends \Rector\Core\Rector\AbstractRector implements \Rector\Core\Contract\Rector\PhpRectorInterface
{
    /**
     * @return array<class-string<\PhpParser\Node>>
     */
    public function getNodeTypes() : array
    {
    }
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node
    {
    }
    /**
     * @codeCoverageIgnore
     */
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
    }
}
