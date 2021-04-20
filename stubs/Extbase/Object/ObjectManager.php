<?php



if (\class_exists(\TYPO3\CMS\Extbase\Object\ObjectManager::class)) {
    return;
}
class ObjectManager implements \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
{
    /**
     * @param $objectName
     *
     * @return object
     */
    public function get($objectName)
    {
        return new $objectName(\func_get_args());
    }
}
