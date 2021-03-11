<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210311;

use Typo3RectorPrefix20210311\SebastianBergmann\Diff\Differ;
use Typo3RectorPrefix20210311\SebastianBergmann\Diff\Output\UnifiedDiffOutputBuilder;
use Typo3RectorPrefix20210311\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210311\Symplify\MarkdownDiff\Diff\Output\CompleteUnifiedDiffOutputBuilderFactory;
use Typo3RectorPrefix20210311\Symplify\MarkdownDiff\Differ\MarkdownDiffer;
use Typo3RectorPrefix20210311\Symplify\PackageBuilder\Reflection\PrivatesAccessor;
use function Typo3RectorPrefix20210311\Symfony\Component\DependencyInjection\Loader\Configurator\service;
return static function (\Typo3RectorPrefix20210311\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->load('Typo3RectorPrefix20210311\Symplify\\MarkdownDiff\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/Bundle']);
    $services->set(\Typo3RectorPrefix20210311\SebastianBergmann\Diff\Differ::class);
    // markdown
    $services->set('markdownDiffOutputBuilder', \Typo3RectorPrefix20210311\SebastianBergmann\Diff\Output\UnifiedDiffOutputBuilder::class)->factory([\Typo3RectorPrefix20210311\Symfony\Component\DependencyInjection\Loader\Configurator\service(\Typo3RectorPrefix20210311\Symplify\MarkdownDiff\Diff\Output\CompleteUnifiedDiffOutputBuilderFactory::class), 'create']);
    $services->set('markdownDiffer', \Typo3RectorPrefix20210311\SebastianBergmann\Diff\Differ::class)->arg('$outputBuilder', \Typo3RectorPrefix20210311\Symfony\Component\DependencyInjection\Loader\Configurator\service('markdownDiffOutputBuilder'));
    $services->set(\Typo3RectorPrefix20210311\Symplify\MarkdownDiff\Differ\MarkdownDiffer::class)->arg('$markdownDiffer', \Typo3RectorPrefix20210311\Symfony\Component\DependencyInjection\Loader\Configurator\service('markdownDiffer'));
    $services->set(\Typo3RectorPrefix20210311\Symplify\PackageBuilder\Reflection\PrivatesAccessor::class);
};
