<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_form_Controller_Wizard::class)) {
    return;
}
class tx_form_Controller_Wizard
{
}
\class_alias('tx_form_Controller_Wizard', 'tx_form_Controller_Wizard', \false);
