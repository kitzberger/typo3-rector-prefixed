<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210415\Doctrine\Persistence;

use Typo3RectorPrefix20210415\Doctrine\ORM\EntityManagerInterface;
if (\class_exists('Typo3RectorPrefix20210415\\Doctrine\\Persistence\\ManagerRegistry')) {
    return;
}
final class ManagerRegistry
{
    public function getManager() : \Typo3RectorPrefix20210415\Doctrine\Persistence\ObjectManager
    {
    }
}
