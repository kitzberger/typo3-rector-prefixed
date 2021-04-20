<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class)) {
    return;
}
final class Dispatcher
{
    public function connect($signalClassName, $signalName, $slotClassNameOrObject, $slotMethodName = '', $passSignalInformation = \true) : void
    {
    }
}
