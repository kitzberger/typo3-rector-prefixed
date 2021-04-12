<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */
declare (strict_types=1);
namespace Typo3RectorPrefix20210412\Nette\Utils;

use Typo3RectorPrefix20210412\Nette;
if (\false) {
    /** @deprecated use Nette\HtmlStringable */
    interface IHtmlString extends \Typo3RectorPrefix20210412\Nette\HtmlStringable
    {
    }
} elseif (!\interface_exists(\Typo3RectorPrefix20210412\Nette\Utils\IHtmlString::class)) {
    \class_alias(\Typo3RectorPrefix20210412\Nette\HtmlStringable::class, \Typo3RectorPrefix20210412\Nette\Utils\IHtmlString::class);
}
namespace Typo3RectorPrefix20210412\Nette\Localization;

if (\false) {
    /** @deprecated use Nette\Localization\Translator */
    interface ITranslator extends \Typo3RectorPrefix20210412\Nette\Localization\Translator
    {
    }
} elseif (!\interface_exists(\Typo3RectorPrefix20210412\Nette\Localization\ITranslator::class)) {
    \class_alias(\Typo3RectorPrefix20210412\Nette\Localization\Translator::class, \Typo3RectorPrefix20210412\Nette\Localization\ITranslator::class);
}
