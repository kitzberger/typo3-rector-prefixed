<?php

declare (strict_types=1);
namespace TYPO3\CMS\Extbase\Mvc\Cli;

if (\class_exists(\TYPO3\CMS\Extbase\Mvc\Cli\ConsoleOutput::class)) {
    return;
}
class ConsoleOutput
{
    public function select($question, $choices, $default = null, $multiSelect = \false, $attempts = null) : void
    {
    }
    public function askAndValidate($question, $validator, $attempts = null, $default = null, array $autocomplete = null) : void
    {
    }
}
