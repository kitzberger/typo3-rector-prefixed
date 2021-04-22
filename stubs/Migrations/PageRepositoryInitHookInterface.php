<?php

namespace TYPO3\CMS\Frontend\Page;

if (\interface_exists(\TYPO3\CMS\Frontend\Page\PageRepositoryInitHookInterface::class)) {
    return;
}
interface PageRepositoryInitHookInterface
{
}
