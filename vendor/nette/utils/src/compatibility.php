<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */
declare (strict_types=1);
namespace Typo3RectorPrefix20210401\Nette\Utils;

use Typo3RectorPrefix20210401\Nette;
if (\false) {
    /** @deprecated use Nette\HtmlStringable */
    interface IHtmlString extends \Typo3RectorPrefix20210401\Nette\HtmlStringable
    {
    }
} elseif (!\interface_exists(\Typo3RectorPrefix20210401\Nette\Utils\IHtmlString::class)) {
    \class_alias(\Typo3RectorPrefix20210401\Nette\HtmlStringable::class, \Typo3RectorPrefix20210401\Nette\Utils\IHtmlString::class);
}
namespace Typo3RectorPrefix20210401\Nette\Localization;

if (\false) {
    /** @deprecated use Nette\Localization\Translator */
    interface ITranslator extends \Typo3RectorPrefix20210401\Nette\Localization\Translator
    {
    }
} elseif (!\interface_exists(\Typo3RectorPrefix20210401\Nette\Localization\ITranslator::class)) {
    \class_alias(\Typo3RectorPrefix20210401\Nette\Localization\Translator::class, \Typo3RectorPrefix20210401\Nette\Localization\ITranslator::class);
}
