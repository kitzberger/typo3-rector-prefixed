<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210415\Doctrine\ORM;

use Typo3RectorPrefix20210415\Doctrine\Common\Persistence\ObjectManager;
if (\interface_exists('Typo3RectorPrefix20210415\\Doctrine\\ORM\\EntityManagerInterface')) {
    return;
}
interface EntityManagerInterface extends \Typo3RectorPrefix20210415\Doctrine\Common\Persistence\ObjectManager
{
}
