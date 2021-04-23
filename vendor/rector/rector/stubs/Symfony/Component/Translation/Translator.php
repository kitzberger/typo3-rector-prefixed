<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Symfony\Component\Translation;

if (\class_exists('Symfony\\Component\\Translation\\Translator')) {
    return;
}
class Translator implements \Typo3RectorPrefix20210423\Symfony\Component\Translation\TranslatorInterface
{
}
