<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409\Doctrine\Common\Persistence;

use Typo3RectorPrefix20210409\Doctrine\ORM\EntityManagerInterface;
if (\class_exists('Typo3RectorPrefix20210409\\Doctrine\\Common\\Persistence\\ManagerRegistry')) {
    return;
}
final class ManagerRegistry
{
    public function getManager() : \Typo3RectorPrefix20210409\Doctrine\Common\Persistence\ObjectManager
    {
    }
}
