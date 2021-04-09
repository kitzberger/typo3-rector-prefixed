<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409\Symfony\Component\Routing;

use Typo3RectorPrefix20210409\Symfony\Component\Routing\Generator\UrlGeneratorInterface;
if (\interface_exists('Typo3RectorPrefix20210409\\Symfony\\Component\\Routing\\RouterInterface')) {
    return;
}
interface RouterInterface extends \Typo3RectorPrefix20210409\Symfony\Component\Routing\Generator\UrlGeneratorInterface
{
}
