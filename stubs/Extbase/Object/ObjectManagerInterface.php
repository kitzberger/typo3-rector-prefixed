<?php



if (\class_exists(\TYPO3\CMS\Extbase\Object\ObjectManagerInterface::class)) {
    return;
}
interface ObjectManagerInterface
{
    /**
     * @param $objectName
     *
     * @return object
     */
    public function get($objectName);
}
