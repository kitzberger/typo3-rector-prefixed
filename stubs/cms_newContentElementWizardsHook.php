<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\cms_newContentElementWizardsHook::class)) {
    return;
}
class cms_newContentElementWizardsHook
{
}
\class_alias('cms_newContentElementWizardsHook', 'cms_newContentElementWizardsHook', \false);
