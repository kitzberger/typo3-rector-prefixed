<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Doctrine\Persistence;

if (\interface_exists('Doctrine\\Persistence\\ObjectManager')) {
    return;
}
interface ObjectManager
{
}
