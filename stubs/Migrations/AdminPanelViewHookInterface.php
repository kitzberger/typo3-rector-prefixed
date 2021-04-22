<?php

namespace TYPO3\CMS\Frontend\View;

if (\interface_exists(\TYPO3\CMS\Frontend\View\AdminPanelViewHookInterface::class)) {
    return;
}
interface AdminPanelViewHookInterface
{
}
