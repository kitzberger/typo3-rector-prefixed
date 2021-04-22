<?php

declare (strict_types=1);
namespace TYPO3\CMS\Frontend\Authentication;

if (\class_exists(\TYPO3\CMS\Frontend\Authentication\FrontendUserAuthentication::class)) {
    return;
}
final class FrontendUserAuthentication
{
    /**
     * @return mixed
     */
    public function getKey($type, $key)
    {
        return null;
    }
}
