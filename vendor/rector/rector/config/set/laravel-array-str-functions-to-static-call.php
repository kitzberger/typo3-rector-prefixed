<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210317;

use Rector\Transform\Rector\FuncCall\FuncCallToStaticCallRector;
use Rector\Transform\ValueObject\FuncCallToStaticCall;
use Typo3RectorPrefix20210317\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
// @see https://medium.freecodecamp.org/moving-away-from-magic-or-why-i-dont-want-to-use-laravel-anymore-2ce098c979bd
// @see https://laravel.com/docs/5.7/facades#facades-vs-dependency-injection
return static function (\Typo3RectorPrefix20210317\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Transform\Rector\FuncCall\FuncCallToStaticCallRector::class)->call('configure', [[\Rector\Transform\Rector\FuncCall\FuncCallToStaticCallRector::FUNC_CALLS_TO_STATIC_CALLS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_add', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'add'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_collapse', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'collapse'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_divide', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'divide'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_dot', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'dot'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_except', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'except'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_first', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'first'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_flatten', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'flatten'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_forget', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'forget'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_get', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'get'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_has', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'has'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_last', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'last'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_only', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'only'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_pluck', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'pluck'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_prepend', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'prepend'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_pull', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'pull'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_random', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'random'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_sort', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'sort'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_sort_recursive', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'sortRecursive'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_where', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'where'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_wrap', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'wrap'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('array_set', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Arr', 'set'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('camel_case', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'camel'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('ends_with', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'endsWith'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('kebab_case', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'kebab'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('snake_case', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'snake'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('starts_with', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'startsWith'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('str_after', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'after'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('str_before', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'before'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('str_contains', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'contains'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('str_finish', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'finish'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('str_is', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'is'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('str_limit', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'limit'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('str_plural', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'plural'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('str_random', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'random'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('str_replace_array', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'replaceArray'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('str_replace_first', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'replaceFirst'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('str_replace_last', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'replaceLast'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('str_singular', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'singular'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('str_slug', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'slug'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('str_start', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'start'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('studly_case', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'studly'), new \Rector\Transform\ValueObject\FuncCallToStaticCall('title_case', 'Typo3RectorPrefix20210317\\Illuminate\\Support\\Str', 'title')])]]);
};
