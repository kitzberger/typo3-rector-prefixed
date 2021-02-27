<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */
declare (strict_types=1);
namespace Typo3RectorPrefix20210227\Nette\Utils;

if (\false) {
    /** @deprecated use Nette\HtmlStringable */
    interface IHtmlString
    {
    }
} elseif (!\interface_exists(\Typo3RectorPrefix20210227\Nette\Utils\IHtmlString::class)) {
    \class_alias(\Typo3RectorPrefix20210227\Nette\HtmlStringable::class, \Typo3RectorPrefix20210227\Nette\Utils\IHtmlString::class);
}
namespace Typo3RectorPrefix20210227\Nette\Localization;

if (\false) {
    /** @deprecated use Nette\Localization\Translator */
    interface ITranslator
    {
    }
} elseif (!\interface_exists(\Typo3RectorPrefix20210227\Nette\Localization\ITranslator::class)) {
    \class_alias(\Typo3RectorPrefix20210227\Nette\Localization\Translator::class, \Typo3RectorPrefix20210227\Nette\Localization\ITranslator::class);
}
