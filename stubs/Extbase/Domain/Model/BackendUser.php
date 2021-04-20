<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Extbase\Domain\Model\BackendUser::class)) {
    return;
}
final class BackendUser
{
    public function getUid() : int
    {
        return 1;
    }
}
