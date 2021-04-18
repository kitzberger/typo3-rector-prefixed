<?php

declare (strict_types=1);
// faking expression language, to be able to downgrade vendor/symfony/dependency-injection/ContainerBuilder.php,
// because it has optional-dependency on expression language
namespace Typo3RectorPrefix20210418\Symfony\Component\ExpressionLanguage;

if (\interface_exists('Typo3RectorPrefix20210418\\Symfony\\Component\\ExpressionLanguage\\ExpressionFunctionProviderInterface')) {
    return;
}
interface ExpressionFunctionProviderInterface
{
}
