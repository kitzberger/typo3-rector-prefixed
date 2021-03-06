<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

use Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\Parser;
use Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\ParserInterface;
use Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\Printer\ASTPrinterInterface;
use Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\Traverser\Traverser;
use Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Tokenizer\Tokenizer;
use Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Tokenizer\TokenizerInterface;
use Rector\Core\Configuration\Option;
use Ssch\TYPO3Rector\Reporting\Reporter;
use Ssch\TYPO3Rector\Reporting\ReporterFactory;
use Ssch\TYPO3Rector\TypoScript\Parser\Printer\PrettyPrinter;
use Ssch\TYPO3Rector\TypoScript\TypoScriptProcessor;
use Typo3RectorPrefix20210423\Symfony\Component\Console\Output\BufferedOutput;
use Typo3RectorPrefix20210423\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\service;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $containerConfigurator->import(__DIR__ . '/../utils/**/config/config.php', null, \true);
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::AUTO_IMPORT_NAMES, \true);
    $parameters->set(\Rector\Core\Configuration\Option::PHPSTAN_FOR_RECTOR_PATH, __DIR__ . '/../utils/phpstan/config/extension.neon');
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire();
    $services->load('Ssch\\TYPO3Rector\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/Rector', __DIR__ . '/../src/Set', __DIR__ . '/../src/ValueObject', __DIR__ . '/../src/TypoScript/Conditions', __DIR__ . '/../src/TypoScript/Visitors', __DIR__ . '/../src/Yaml/Form/Transformer', __DIR__ . '/../src/FlexForms/Transformer', __DIR__ . '/../src/Reporting', __DIR__ . '/../src/Resources/Icons/IconsProcessor.php']);
    $services->set(\Ssch\TYPO3Rector\Reporting\ReporterFactory::class);
    $services->set(\Ssch\TYPO3Rector\Reporting\Reporter::class)->factory([\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Ssch\TYPO3Rector\Reporting\ReporterFactory::class), 'createReporter']);
    $services->set(\Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\Traverser\Traverser::class);
    $services->set(\Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Tokenizer\Tokenizer::class);
    $services->alias(\Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Tokenizer\TokenizerInterface::class, \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Tokenizer\Tokenizer::class);
    $services->set(\Ssch\TYPO3Rector\TypoScript\Parser\Printer\PrettyPrinter::class);
    $services->alias(\Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\Printer\ASTPrinterInterface::class, \Ssch\TYPO3Rector\TypoScript\Parser\Printer\PrettyPrinter::class);
    $services->set(\Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\Parser::class);
    $services->alias(\Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\ParserInterface::class, \Typo3RectorPrefix20210423\Helmich\TypoScriptParser\Parser\Parser::class);
    $services->set(\Typo3RectorPrefix20210423\Symfony\Component\Console\Output\BufferedOutput::class);
    $services->alias(\Typo3RectorPrefix20210423\Symfony\Component\Console\Output\OutputInterface::class, \Typo3RectorPrefix20210423\Symfony\Component\Console\Output\BufferedOutput::class);
    $services->set(\Ssch\TYPO3Rector\TypoScript\TypoScriptProcessor::class)->call('configure', [[\Ssch\TYPO3Rector\TypoScript\TypoScriptProcessor::ALLOWED_FILE_EXTENSIONS => ['typoscript', 'ts', 'txt', 'pagets', 'tsconfig', 'typoscriptconstants']]]);
};
