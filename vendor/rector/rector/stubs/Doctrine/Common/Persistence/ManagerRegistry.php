<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420\Doctrine\Common\Persistence;

use Typo3RectorPrefix20210420\Doctrine\ORM\EntityManagerInterface;
if (\class_exists('Doctrine\\Common\\Persistence\\ManagerRegistry')) {
    return;
}
final class ManagerRegistry
{
    public function getManager() : \Typo3RectorPrefix20210420\Doctrine\Common\Persistence\ObjectManager
    {
    }
}
