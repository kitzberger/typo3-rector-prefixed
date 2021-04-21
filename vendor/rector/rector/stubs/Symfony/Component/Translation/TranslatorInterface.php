<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210421\Symfony\Component\Translation;

if (\interface_exists('Symfony\\Component\\Translation\\TranslatorInterface')) {
    return;
}
interface TranslatorInterface
{
}
