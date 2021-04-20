<?php

declare (strict_types=1);


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
