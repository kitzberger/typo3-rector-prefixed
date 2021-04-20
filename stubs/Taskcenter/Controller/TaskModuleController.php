<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Taskcenter\Controller\TaskModuleController::class)) {
    return;
}
final class TaskModuleController
{
    /**
     * @var string
     */
    public $content = '';
    public function printContent() : void
    {
    }
}
