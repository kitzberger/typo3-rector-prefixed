<?php

namespace Ssch\TYPO3Rector\FlexForms\Transformer;

use DOMDocument;
use Rector\Core\Contract\Rector\RectorInterface;
interface FlexFormTransformer extends \Rector\Core\Contract\Rector\RectorInterface
{
    public function transform(\DOMDocument $domDocument) : void;
}
