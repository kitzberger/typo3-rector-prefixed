<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210412\Symfony\Component\Routing;

use Typo3RectorPrefix20210412\Symfony\Component\Routing\Generator\UrlGeneratorInterface;
if (\class_exists('Typo3RectorPrefix20210412\\Symfony\\Component\\Routing\\Router')) {
    return;
}
class Router implements \Typo3RectorPrefix20210412\Symfony\Component\Routing\RouterInterface
{
    /**
     * {@inheritdoc}
     */
    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        return $this->getGenerator()->generate($name, $parameters, $referenceType);
    }
    private function getGenerator() : \Typo3RectorPrefix20210412\Symfony\Component\Routing\Generator\UrlGeneratorInterface
    {
    }
}
