<?php

declare (strict_types=1);
namespace Rector\Tests\ChangesReporting\ValueObject\Source;

use Rector\Core\Contract\Rector\RectorInterface;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**
 * @changelog https://github.com/rectorphp/rector/blob/master/docs/rector_rules_overview.md
 */
final class RectorWithChangelog implements \Rector\Core\Contract\Rector\RectorInterface
{
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Foo', []);
    }
}
