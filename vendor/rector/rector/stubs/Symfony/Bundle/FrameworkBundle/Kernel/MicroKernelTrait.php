<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420\Symfony\Bundle\FrameworkBundle\Kernel;

if (\class_exists('Symfony\\Bundle\\FrameworkBundle\\Kernel\\MicroKernelTrait')) {
    return;
}
trait MicroKernelTrait
{
}
