<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Symfony\Component\Routing;

use Typo3RectorPrefix20210423\Symfony\Component\Routing\Generator\UrlGeneratorInterface;
if (\interface_exists('Symfony\\Component\\Routing\\RouterInterface')) {
    return;
}
interface RouterInterface extends \Typo3RectorPrefix20210423\Symfony\Component\Routing\Generator\UrlGeneratorInterface
{
}
