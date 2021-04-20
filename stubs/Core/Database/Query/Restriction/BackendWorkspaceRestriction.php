<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Database\Query\Restriction\BackendWorkspaceRestriction::class)) {
    return;
}
final class BackendWorkspaceRestriction
{
}
