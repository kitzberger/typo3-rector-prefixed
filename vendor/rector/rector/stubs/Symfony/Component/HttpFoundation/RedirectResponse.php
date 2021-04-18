<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210418\Symfony\Component\HttpFoundation;

if (\class_exists('Typo3RectorPrefix20210418\\Symfony\\Component\\HttpFoundation\\RedirectResponse')) {
    return;
}
final class RedirectResponse extends \Typo3RectorPrefix20210418\Symfony\Component\HttpFoundation\Response
{
}
