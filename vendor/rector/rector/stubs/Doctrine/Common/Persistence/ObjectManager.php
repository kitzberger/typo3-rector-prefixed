<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210411\Doctrine\Common\Persistence;

if (\interface_exists('Typo3RectorPrefix20210411\\Doctrine\\Common\\Persistence\\ObjectManager')) {
    return;
}
interface ObjectManager
{
    public function getRepository() : \Typo3RectorPrefix20210411\Doctrine\ORM\EntityRepository;
}
