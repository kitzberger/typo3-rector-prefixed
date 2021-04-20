<?php



if (\interface_exists(\TYPO3\CMS\Core\Cache\Frontend\FrontendInterface::class)) {
    return;
}
interface FrontendInterface
{
    public function set($entryIdentifier, $data, array $tags = [], $lifetime = null);
    public function get($entryIdentifier);
}
