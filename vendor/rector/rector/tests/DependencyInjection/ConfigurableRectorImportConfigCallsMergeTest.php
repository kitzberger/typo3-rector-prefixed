<?php

declare (strict_types=1);
namespace Rector\Core\Tests\DependencyInjection;

use Iterator;
use Rector\Core\Bootstrap\RectorConfigsResolver;
use Rector\Core\HttpKernel\RectorKernel;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Typo3RectorPrefix20210223\Symplify\PackageBuilder\Reflection\PrivatesAccessor;
use Typo3RectorPrefix20210223\Symplify\SmartFileSystem\SmartFileInfo;
final class ConfigurableRectorImportConfigCallsMergeTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @var RenameClassRector
     */
    private $renameClassRector;
    /**
     * @var PrivatesAccessor
     */
    private $privatesAccessor;
    protected function setUp() : void
    {
        $this->privatesAccessor = new \Typo3RectorPrefix20210223\Symplify\PackageBuilder\Reflection\PrivatesAccessor();
    }
    /**
     * @dataProvider provideData()
     * @param array<string, string> $expectedConfiguration
     */
    public function testMainConfigValues(string $config, array $expectedConfiguration) : void
    {
        $rectorConfigsResolver = new \Rector\Core\Bootstrap\RectorConfigsResolver();
        $configFileInfos = $rectorConfigsResolver->resolveFromConfigFileInfo(new \Typo3RectorPrefix20210223\Symplify\SmartFileSystem\SmartFileInfo($config));
        $this->bootKernelWithConfigs(\Rector\Core\HttpKernel\RectorKernel::class, $configFileInfos);
        $this->renameClassRector = $this->getService(\Rector\Renaming\Rector\Name\RenameClassRector::class);
        $oldToNewClasses = $this->privatesAccessor->getPrivateProperty($this->renameClassRector, 'oldToNewClasses');
        $this->assertSame($expectedConfiguration, $oldToNewClasses);
    }
    public function provideData() : \Iterator
    {
        (yield [__DIR__ . '/config/main_config_with_only_imports.php', ['old_2' => 'new_2', 'old_1' => 'new_1']]);
        (yield [__DIR__ . '/config/main_config_with_override_value.php', ['old_2' => 'new_2', 'old_1' => 'new_1', 'old_4' => 'new_4']]);
        (yield [__DIR__ . '/config/main_config_with_own_value.php', ['old_2' => 'new_2', 'old_1' => 'new_1', 'old_4' => 'new_4', 'old_3' => 'new_3']]);
        (yield [__DIR__ . '/config/one_set.php', ['PHPUnit_Framework_MockObject_Stub' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Stub', 'PHPUnit_Framework_MockObject_Stub_Return' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Stub\\ReturnStub', 'PHPUnit_Framework_MockObject_Matcher_Parameters' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Matcher\\Parameters', 'PHPUnit_Framework_MockObject_Matcher_Invocation' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Matcher\\Invocation', 'PHPUnit_Framework_MockObject_MockObject' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\MockObject', 'PHPUnit_Framework_MockObject_Invocation_Object' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Invocation\\ObjectInvocation']]);
        (yield [__DIR__ . '/config/one_set_with_own_rename.php', ['PHPUnit_Framework_MockObject_Stub' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Stub', 'PHPUnit_Framework_MockObject_Stub_Return' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Stub\\ReturnStub', 'PHPUnit_Framework_MockObject_Matcher_Parameters' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Matcher\\Parameters', 'PHPUnit_Framework_MockObject_Matcher_Invocation' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Matcher\\Invocation', 'PHPUnit_Framework_MockObject_MockObject' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\MockObject', 'PHPUnit_Framework_MockObject_Invocation_Object' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Invocation\\ObjectInvocation', 'Old' => 'New']]);
        (yield [__DIR__ . '/config/two_sets.php', ['Twig_SimpleFilter' => 'Twig_Filter', 'Twig_SimpleFunction' => 'Twig_Function', 'Twig_SimpleTest' => 'Twig_Test', 'PHPUnit_Framework_MockObject_Stub' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Stub', 'PHPUnit_Framework_MockObject_Stub_Return' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Stub\\ReturnStub', 'PHPUnit_Framework_MockObject_Matcher_Parameters' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Matcher\\Parameters', 'PHPUnit_Framework_MockObject_Matcher_Invocation' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Matcher\\Invocation', 'PHPUnit_Framework_MockObject_MockObject' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\MockObject', 'PHPUnit_Framework_MockObject_Invocation_Object' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Invocation\\ObjectInvocation']]);
        (yield [__DIR__ . '/config/two_sets_with_own_rename.php', ['Twig_SimpleFilter' => 'Twig_Filter', 'Twig_SimpleFunction' => 'Twig_Function', 'Twig_SimpleTest' => 'Twig_Test', 'PHPUnit_Framework_MockObject_Stub' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Stub', 'PHPUnit_Framework_MockObject_Stub_Return' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Stub\\ReturnStub', 'PHPUnit_Framework_MockObject_Matcher_Parameters' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Matcher\\Parameters', 'PHPUnit_Framework_MockObject_Matcher_Invocation' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Matcher\\Invocation', 'PHPUnit_Framework_MockObject_MockObject' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\MockObject', 'PHPUnit_Framework_MockObject_Invocation_Object' => 'Typo3RectorPrefix20210223\\PHPUnit\\Framework\\MockObject\\Invocation\\ObjectInvocation', 'Old' => 'New']]);
    }
}
