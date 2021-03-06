<?php

declare (strict_types=1);
namespace Rector\RectorInstaller\Tests;

use Typo3RectorPrefix20210423\Composer\Installer\InstallationManager;
use Typo3RectorPrefix20210423\Composer\IO\IOInterface;
use Typo3RectorPrefix20210423\Composer\Package\PackageInterface;
use Typo3RectorPrefix20210423\Composer\Repository\InstalledRepositoryInterface;
use Typo3RectorPrefix20210423\PHPUnit\Framework\TestCase;
use Typo3RectorPrefix20210423\Prophecy\Argument;
use Typo3RectorPrefix20210423\Prophecy\PhpUnit\ProphecyTrait;
use Typo3RectorPrefix20210423\Prophecy\Prophecy\ObjectProphecy;
use Rector\RectorInstaller\Filesystem;
use Rector\RectorInstaller\PluginInstaller;
/**
 * @covers PluginInstaller
 */
final class PluginInstallerTest extends \Typo3RectorPrefix20210423\PHPUnit\Framework\TestCase
{
    use ProphecyTrait;
    /**
     * @var string
     */
    private const FILE_HASH = 'hash';
    /**
     * @var PluginInstaller
     */
    private $pluginInstaller;
    /**
     * @var InstalledRepositoryInterface|ObjectProphecy
     */
    private $localRepository;
    /**
     * @var IOInterface|ObjectProphecy
     */
    private $io;
    /**
     * @var InstallationManager|ObjectProphecy
     */
    private $installationManager;
    /**
     * @var ObjectProphecy|Filesystem
     */
    private $filesystem;
    /**
     * @var string
     */
    private $configurationFile;
    /**
     * @var \Composer\Util\Filesystem|ObjectProphecy
     */
    private $composerFilesystem;
    protected function setUp() : void
    {
        $this->configurationFile = __FILE__;
        $this->composerFilesystem = $this->prophesize(\Typo3RectorPrefix20210423\Composer\Util\Filesystem::class);
        $this->filesystem = $this->prophesize(\Rector\RectorInstaller\Filesystem::class);
        $this->filesystem->isFile($this->configurationFile)->shouldBeCalledOnce()->willReturn(\true);
        $this->filesystem->hashFile($this->configurationFile)->willReturn(self::FILE_HASH);
        $this->localRepository = $this->prophesize(\Typo3RectorPrefix20210423\Composer\Repository\InstalledRepositoryInterface::class);
        $this->io = $this->prophesize(\Typo3RectorPrefix20210423\Composer\IO\IOInterface::class);
        $this->installationManager = $this->prophesize(\Typo3RectorPrefix20210423\Composer\Installer\InstallationManager::class);
        $this->pluginInstaller = new \Rector\RectorInstaller\PluginInstaller($this->filesystem->reveal(), $this->localRepository->reveal(), $this->io->reveal(), $this->installationManager->reveal(), $this->composerFilesystem->reveal(), $this->configurationFile);
    }
    public function testNoRectorPackagesInstalled() : void
    {
        $this->localRepository->getPackages()->willReturn([]);
        $this->filesystem->writeFile($this->configurationFile, \Typo3RectorPrefix20210423\Prophecy\Argument::any())->shouldNotBeCalled();
        $this->filesystem->hashEquals(self::FILE_HASH, \Typo3RectorPrefix20210423\Prophecy\Argument::any())->willReturn(\true);
        $this->pluginInstaller->install();
    }
    public function testPackagesInstalled() : void
    {
        $rectorExtensionPackage = $this->prophesize(\Typo3RectorPrefix20210423\Composer\Package\PackageInterface::class);
        $rectorExtensionPackage->getType()->willReturn(\Rector\RectorInstaller\PluginInstaller::RECTOR_EXTENSION_TYPE);
        $rectorExtensionPackage->getName()->willReturn('rector/doctrine');
        $rectorExtensionPackage->getFullPrettyVersion()->willReturn('rector/doctrine');
        $rectorExtensionPackage->getExtra()->willReturn([\Rector\RectorInstaller\PluginInstaller::RECTOR_EXTRA_KEY => ['includes' => ['config/config.php']]]);
        $nonRectorExtensionPackage = $this->prophesize(\Typo3RectorPrefix20210423\Composer\Package\PackageInterface::class);
        $nonRectorExtensionPackageWithExtra = $this->prophesize(\Typo3RectorPrefix20210423\Composer\Package\PackageInterface::class);
        $nonRectorExtensionPackageWithExtra->getType()->willReturn(null);
        $nonRectorExtensionPackageWithExtra->getName()->willReturn('rector/foo');
        $nonRectorExtensionPackageWithExtra->getFullPrettyVersion()->willReturn('rector/foo');
        $nonRectorExtensionPackageWithExtra->getExtra()->willReturn([\Rector\RectorInstaller\PluginInstaller::RECTOR_EXTRA_KEY => ['includes' => ['config/config.php']]]);
        $packages = [$rectorExtensionPackage, $nonRectorExtensionPackage, $nonRectorExtensionPackageWithExtra];
        $this->io->write('<info>ssch/rector-extension-installer:</info> Extensions installed')->shouldBeCalledOnce();
        $this->io->write(\sprintf('> <info>%s:</info> installed', 'rector/doctrine'))->shouldBeCalledOnce();
        $this->io->write(\sprintf('> <info>%s:</info> installed', 'rector/foo'))->shouldBeCalledOnce();
        $this->installationManager->getInstallPath($rectorExtensionPackage)->shouldBeCalledOnce();
        $this->installationManager->getInstallPath($nonRectorExtensionPackageWithExtra)->shouldBeCalledOnce();
        $this->filesystem->hashEquals(self::FILE_HASH, \Typo3RectorPrefix20210423\Prophecy\Argument::any())->willReturn(\false);
        $this->filesystem->writeFile($this->configurationFile, \Typo3RectorPrefix20210423\Prophecy\Argument::any())->shouldBeCalledOnce();
        $this->localRepository->getPackages()->willReturn($packages);
        $this->pluginInstaller->install();
    }
}
