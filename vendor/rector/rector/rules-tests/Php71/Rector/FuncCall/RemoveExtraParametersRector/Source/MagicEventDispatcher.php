<?php

declare (strict_types=1);
namespace Rector\Tests\Php71\Rector\FuncCall\RemoveExtraParametersRector\Source;

use Typo3RectorPrefix20210423\Symfony\Component\EventDispatcher\Event;
use Typo3RectorPrefix20210423\Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
final class MagicEventDispatcher
{
    /**
     * {@inheritdoc}
     *
     * @param string|null $eventName
     */
    public function dispatch($event)
    {
        $eventName = 1 < \func_num_args() ? \func_get_arg(1) : null;
    }
}
