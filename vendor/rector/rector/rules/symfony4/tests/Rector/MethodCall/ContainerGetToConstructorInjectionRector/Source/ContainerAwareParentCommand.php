<?php

declare (strict_types=1);
namespace Rector\Symfony4\Tests\Rector\MethodCall\ContainerGetToConstructorInjectionRector\Source;

use Typo3RectorPrefix20210407\Symfony\Component\Console\Command\Command;
use Typo3RectorPrefix20210407\Symfony\Component\DependencyInjection\ContainerInterface;
class ContainerAwareParentCommand extends \Typo3RectorPrefix20210407\Symfony\Component\Console\Command\Command
{
    public function getContainer() : \Typo3RectorPrefix20210407\Symfony\Component\DependencyInjection\ContainerInterface
    {
    }
}
