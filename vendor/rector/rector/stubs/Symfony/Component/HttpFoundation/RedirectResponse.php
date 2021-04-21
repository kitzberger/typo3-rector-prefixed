<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210421\Symfony\Component\HttpFoundation;

if (\class_exists('Symfony\\Component\\HttpFoundation\\RedirectResponse')) {
    return;
}
final class RedirectResponse extends \Typo3RectorPrefix20210421\Symfony\Component\HttpFoundation\Response
{
}
