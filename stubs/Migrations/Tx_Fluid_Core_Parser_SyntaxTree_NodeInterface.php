<?php

namespace Typo3RectorPrefix20210422;

if (\interface_exists(\Typo3RectorPrefix20210422\Tx_Fluid_Core_Parser_SyntaxTree_NodeInterface::class)) {
    return;
}
interface Tx_Fluid_Core_Parser_SyntaxTree_NodeInterface
{
}
\class_alias('Tx_Fluid_Core_Parser_SyntaxTree_NodeInterface', 'Tx_Fluid_Core_Parser_SyntaxTree_NodeInterface', \false);
