<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422\Doctrine\ORM;

use Typo3RectorPrefix20210422\Doctrine\Common\Persistence\ObjectManager;
if (\interface_exists('Doctrine\\ORM\\EntityManagerInterface')) {
    return;
}
interface EntityManagerInterface extends \Typo3RectorPrefix20210422\Doctrine\Common\Persistence\ObjectManager
{
}
