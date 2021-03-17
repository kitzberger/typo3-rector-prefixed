<?php

declare (strict_types=1);
namespace Rector\NetteCodeQuality\ValueObject;

final class NetteFormMethodNameToControlType
{
    /**
     * @var string[]
     */
    public const METHOD_NAME_TO_CONTROL_TYPE = [
        'addText' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Controls\\TextInput',
        'addPassword' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Controls\\TextInput',
        'addEmail' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Controls\\TextInput',
        'addInteger' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Controls\\TextInput',
        'addUpload' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Controls\\UploadControl',
        'addMultiUpload' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Controls\\UploadControl',
        'addTextArea' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Controls\\TextArea',
        'addHidden' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Controls\\HiddenField',
        'addCheckbox' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Controls\\Checkbox',
        'addRadioList' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Controls\\RadioList',
        'addCheckboxList' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Controls\\CheckboxList',
        'addSelect' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Controls\\SelectBox',
        'addMultiSelect' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Controls\\MultiSelectBox',
        'addSubmit' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Controls\\SubmitButton',
        'addButton' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Controls\\Button',
        'addImage' => 'Typo3RectorPrefix20210317\\Nette\\Forms\\Controls\\ImageButton',
        // custom
        'addJSelect' => 'Typo3RectorPrefix20210317\\DependentSelectBox\\JsonDependentSelectBox',
    ];
}
