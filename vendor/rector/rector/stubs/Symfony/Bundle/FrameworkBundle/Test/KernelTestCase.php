<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210414\Symfony\Bundle\FrameworkBundle\Test;

use Typo3RectorPrefix20210414\PHPUnit\Framework\TestCase;
use Typo3RectorPrefix20210414\Symfony\Component\DependencyInjection\ContainerInterface;
if (\class_exists('Typo3RectorPrefix20210414\\Symfony\\Bundle\\FrameworkBundle\\Test\\KernelTestCase')) {
    return;
}
class KernelTestCase extends \Typo3RectorPrefix20210414\PHPUnit\Framework\TestCase
{
    /**
     * @var ContainerInterface
     */
    protected static $container;
}
