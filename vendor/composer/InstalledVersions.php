<?php

namespace Typo3RectorPrefix20210408\Composer;

use Typo3RectorPrefix20210408\Composer\Autoload\ClassLoader;
use Typo3RectorPrefix20210408\Composer\Semver\VersionParser;
class InstalledVersions
{
    private static $installed = array('root' => array('pretty_version' => 'dev-master', 'version' => 'dev-master', 'aliases' => array(), 'reference' => '72375573aa87ea7745e8a8f456d9c963708e1f1b', 'name' => 'ssch/typo3-rector'), 'versions' => array('composer/semver' => array('pretty_version' => '3.2.4', 'version' => '3.2.4.0', 'aliases' => array(), 'reference' => 'a02fdf930a3c1c3ed3a49b5f63859c0c20e10464'), 'composer/xdebug-handler' => array('pretty_version' => '1.4.6', 'version' => '1.4.6.0', 'aliases' => array(), 'reference' => 'f27e06cd9675801df441b3656569b328e04aa37c'), 'doctrine/annotations' => array('pretty_version' => '1.12.1', 'version' => '1.12.1.0', 'aliases' => array(), 'reference' => 'b17c5014ef81d212ac539f07a1001832df1b6d3b'), 'doctrine/inflector' => array('pretty_version' => '2.0.3', 'version' => '2.0.3.0', 'aliases' => array(), 'reference' => '9cf661f4eb38f7c881cac67c75ea9b00bf97b210'), 'doctrine/lexer' => array('pretty_version' => '1.2.1', 'version' => '1.2.1.0', 'aliases' => array(), 'reference' => 'e864bbf5904cb8f5bb334f99209b48018522f042'), 'helmich/typo3-typoscript-parser' => array('pretty_version' => 'dev-master', 'version' => 'dev-master', 'aliases' => array(0 => '9999999-dev'), 'reference' => '33196e338ff92673c92bb2fbc3b41b94f2cae801'), 'jean85/pretty-package-versions' => array('pretty_version' => '2.0.3', 'version' => '2.0.3.0', 'aliases' => array(), 'reference' => 'b2c4ec2033a0196317a467cb197c7c843b794ddf'), 'nette/finder' => array('pretty_version' => 'v2.5.2', 'version' => '2.5.2.0', 'aliases' => array(), 'reference' => '4ad2c298eb8c687dd0e74ae84206a4186eeaed50'), 'nette/neon' => array('pretty_version' => 'v3.2.2', 'version' => '3.2.2.0', 'aliases' => array(), 'reference' => 'e4ca6f4669121ca6876b1d048c612480e39a28d5'), 'nette/robot-loader' => array('pretty_version' => 'v3.4.0', 'version' => '3.4.0.0', 'aliases' => array(), 'reference' => '3973cf3970d1de7b30888fd10b92dac9e0c2fd82'), 'nette/utils' => array('pretty_version' => 'v3.2.2', 'version' => '3.2.2.0', 'aliases' => array(), 'reference' => '967cfc4f9a1acd5f1058d76715a424c53343c20c'), 'nikic/php-parser' => array('pretty_version' => 'v4.10.4', 'version' => '4.10.4.0', 'aliases' => array(), 'reference' => 'c6d052fc58cb876152f89f532b95a8d7907e7f0e'), 'phpstan/phpdoc-parser' => array('pretty_version' => '0.4.14', 'version' => '0.4.14.0', 'aliases' => array(), 'reference' => 'cf4fc7d2aeca6910fba061901ffd7d107ccfdbcc'), 'phpstan/phpstan' => array('pretty_version' => '0.12.81', 'version' => '0.12.81.0', 'aliases' => array(), 'reference' => '0dd5b0ebeff568f7000022ea5f04aa86ad3124b8'), 'phpstan/phpstan-phpunit' => array('pretty_version' => '0.12.18', 'version' => '0.12.18.0', 'aliases' => array(), 'reference' => 'ab44aec7cfb5cb267b8bc30a8caea86dd50d1f72'), 'psr/cache' => array('pretty_version' => '1.0.1', 'version' => '1.0.1.0', 'aliases' => array(), 'reference' => 'd11b50ad223250cf17b86e38383413f5a6764bf8'), 'psr/cache-implementation' => array('provided' => array(0 => '1.0|2.0')), 'psr/container' => array('pretty_version' => '1.1.1', 'version' => '1.1.1.0', 'aliases' => array(), 'reference' => '8622567409010282b7aeebe4bb841fe98b58dcaf'), 'psr/container-implementation' => array('provided' => array(0 => '1.0')), 'psr/event-dispatcher' => array('pretty_version' => '1.0.0', 'version' => '1.0.0.0', 'aliases' => array(), 'reference' => 'dbefd12671e8a14ec7f180cab83036ed26714bb0'), 'psr/event-dispatcher-implementation' => array('provided' => array(0 => '1.0')), 'psr/log' => array('pretty_version' => '1.1.3', 'version' => '1.1.3.0', 'aliases' => array(), 'reference' => '0f73288fd15629204f9d42b7055f72dacbe811fc'), 'psr/log-implementation' => array('provided' => array(0 => '1.0')), 'psr/simple-cache' => array('pretty_version' => '1.0.1', 'version' => '1.0.1.0', 'aliases' => array(), 'reference' => '408d5eafb83c57f6365a3ca330ff23aa4a5fa39b'), 'psr/simple-cache-implementation' => array('provided' => array(0 => '1.0')), 'rector/rector' => array('pretty_version' => '0.9.33', 'version' => '0.9.33.0', 'aliases' => array(), 'reference' => '5ecfec4ae83f6187f09584579cacee08658dc3a9'), 'rector/rector-prefixed' => array('replaced' => array(0 => '0.9.33')), 'sebastian/diff' => array('pretty_version' => '4.0.4', 'version' => '4.0.4.0', 'aliases' => array(), 'reference' => '3461e3fccc7cfdfc2720be910d3bd73c69be590d'), 'ssch/typo3-rector' => array('pretty_version' => 'dev-master', 'version' => 'dev-master', 'aliases' => array(), 'reference' => '72375573aa87ea7745e8a8f456d9c963708e1f1b'), 'symfony/cache' => array('pretty_version' => 'v5.2.6', 'version' => '5.2.6.0', 'aliases' => array(), 'reference' => '093d69bb10c959553c8beb828b8d4ea250a247dd'), 'symfony/cache-contracts' => array('pretty_version' => 'v2.2.0', 'version' => '2.2.0.0', 'aliases' => array(), 'reference' => '8034ca0b61d4dd967f3698aaa1da2507b631d0cb'), 'symfony/cache-implementation' => array('provided' => array(0 => '1.0|2.0')), 'symfony/config' => array('pretty_version' => 'v5.2.4', 'version' => '5.2.4.0', 'aliases' => array(), 'reference' => '212d54675bf203ff8aef7d8cee8eecfb72f4a263'), 'symfony/console' => array('pretty_version' => 'v5.2.6', 'version' => '5.2.6.0', 'aliases' => array(), 'reference' => '35f039df40a3b335ebf310f244cb242b3a83ac8d'), 'symfony/dependency-injection' => array('pretty_version' => 'v5.2.6', 'version' => '5.2.6.0', 'aliases' => array(), 'reference' => '1e66194bed2a69fa395d26bf1067e5e34483afac'), 'symfony/deprecation-contracts' => array('pretty_version' => 'v2.2.0', 'version' => '2.2.0.0', 'aliases' => array(), 'reference' => '5fa56b4074d1ae755beb55617ddafe6f5d78f665'), 'symfony/error-handler' => array('pretty_version' => 'v5.2.6', 'version' => '5.2.6.0', 'aliases' => array(), 'reference' => 'bdb7fb4188da7f4211e4b88350ba0dfdad002b03'), 'symfony/event-dispatcher' => array('pretty_version' => 'v5.2.4', 'version' => '5.2.4.0', 'aliases' => array(), 'reference' => 'd08d6ec121a425897951900ab692b612a61d6240'), 'symfony/event-dispatcher-contracts' => array('pretty_version' => 'v2.2.0', 'version' => '2.2.0.0', 'aliases' => array(), 'reference' => '0ba7d54483095a198fa51781bc608d17e84dffa2'), 'symfony/event-dispatcher-implementation' => array('provided' => array(0 => '2.0')), 'symfony/expression-language' => array('pretty_version' => 'v5.2.4', 'version' => '5.2.4.0', 'aliases' => array(), 'reference' => '3fc560e62bc5121751b792b11505db03a12cf83c'), 'symfony/filesystem' => array('pretty_version' => 'v5.2.6', 'version' => '5.2.6.0', 'aliases' => array(), 'reference' => '8c86a82f51658188119e62cff0a050a12d09836f'), 'symfony/finder' => array('pretty_version' => 'v5.2.4', 'version' => '5.2.4.0', 'aliases' => array(), 'reference' => '0d639a0943822626290d169965804f79400e6a04'), 'symfony/http-client-contracts' => array('pretty_version' => 'v2.3.1', 'version' => '2.3.1.0', 'aliases' => array(), 'reference' => '41db680a15018f9c1d4b23516059633ce280ca33'), 'symfony/http-foundation' => array('pretty_version' => 'v5.2.4', 'version' => '5.2.4.0', 'aliases' => array(), 'reference' => '54499baea7f7418bce7b5ec92770fd0799e8e9bf'), 'symfony/http-kernel' => array('pretty_version' => 'v5.2.6', 'version' => '5.2.6.0', 'aliases' => array(), 'reference' => 'f34de4c61ca46df73857f7f36b9a3805bdd7e3b2'), 'symfony/polyfill-ctype' => array('pretty_version' => 'v1.22.1', 'version' => '1.22.1.0', 'aliases' => array(), 'reference' => 'c6c942b1ac76c82448322025e084cadc56048b4e'), 'symfony/polyfill-intl-grapheme' => array('pretty_version' => 'v1.22.1', 'version' => '1.22.1.0', 'aliases' => array(), 'reference' => '5601e09b69f26c1828b13b6bb87cb07cddba3170'), 'symfony/polyfill-intl-normalizer' => array('pretty_version' => 'v1.22.1', 'version' => '1.22.1.0', 'aliases' => array(), 'reference' => '43a0283138253ed1d48d352ab6d0bdb3f809f248'), 'symfony/polyfill-mbstring' => array('pretty_version' => 'v1.22.1', 'version' => '1.22.1.0', 'aliases' => array(), 'reference' => '5232de97ee3b75b0360528dae24e73db49566ab1'), 'symfony/polyfill-php73' => array('pretty_version' => 'v1.22.1', 'version' => '1.22.1.0', 'aliases' => array(), 'reference' => 'a678b42e92f86eca04b7fa4c0f6f19d097fb69e2'), 'symfony/polyfill-php80' => array('pretty_version' => 'v1.22.1', 'version' => '1.22.1.0', 'aliases' => array(), 'reference' => 'dc3063ba22c2a1fd2f45ed856374d79114998f91'), 'symfony/process' => array('pretty_version' => 'v5.2.4', 'version' => '5.2.4.0', 'aliases' => array(), 'reference' => '313a38f09c77fbcdc1d223e57d368cea76a2fd2f'), 'symfony/service-contracts' => array('pretty_version' => 'v2.2.0', 'version' => '2.2.0.0', 'aliases' => array(), 'reference' => 'd15da7ba4957ffb8f1747218be9e1a121fd298a1'), 'symfony/service-implementation' => array('provided' => array(0 => '1.0|2.0')), 'symfony/string' => array('pretty_version' => 'v5.2.6', 'version' => '5.2.6.0', 'aliases' => array(), 'reference' => 'ad0bd91bce2054103f5eaa18ebeba8d3bc2a0572'), 'symfony/var-dumper' => array('pretty_version' => 'v5.2.6', 'version' => '5.2.6.0', 'aliases' => array(), 'reference' => '89412a68ea2e675b4e44f260a5666729f77f668e'), 'symfony/var-exporter' => array('pretty_version' => 'v5.2.4', 'version' => '5.2.4.0', 'aliases' => array(), 'reference' => '5aed4875ab514c8cb9b6ff4772baa25fa4c10307'), 'symfony/yaml' => array('pretty_version' => 'v5.2.5', 'version' => '5.2.5.0', 'aliases' => array(), 'reference' => '298a08ddda623485208506fcee08817807a251dd'), 'symplify/astral' => array('pretty_version' => 'v9.2.15', 'version' => '9.2.15.0', 'aliases' => array(), 'reference' => '78710ba152511371cf89b83e23395dbd60490449'), 'symplify/autowire-array-parameter' => array('pretty_version' => 'v9.2.15', 'version' => '9.2.15.0', 'aliases' => array(), 'reference' => 'c088ca8ce7aa4d96c0844f709e03093f170b1301'), 'symplify/composer-json-manipulator' => array('pretty_version' => 'v9.2.15', 'version' => '9.2.15.0', 'aliases' => array(), 'reference' => '70c95c637215c0e9579fd62ef6d00de745ef4576'), 'symplify/console-color-diff' => array('pretty_version' => 'v9.2.15', 'version' => '9.2.15.0', 'aliases' => array(), 'reference' => 'ab62a74b0cf16b702e7782f577cf6c21faa2372e'), 'symplify/console-package-builder' => array('pretty_version' => 'v9.2.15', 'version' => '9.2.15.0', 'aliases' => array(), 'reference' => 'a0f304934ed8c385d752221a76ce895ab2c2223c'), 'symplify/easy-testing' => array('pretty_version' => 'v9.2.15', 'version' => '9.2.15.0', 'aliases' => array(), 'reference' => '403de7d4ebae79f13d897349e8de4c09d6e3a875'), 'symplify/markdown-diff' => array('pretty_version' => 'v9.2.15', 'version' => '9.2.15.0', 'aliases' => array(), 'reference' => 'bb08fdc4521347cd576dd5a90bf4fcb17895f3a9'), 'symplify/package-builder' => array('pretty_version' => 'v9.2.15', 'version' => '9.2.15.0', 'aliases' => array(), 'reference' => '142cfa26d1030596af4126b7f6387cb6945f6ab0'), 'symplify/php-config-printer' => array('pretty_version' => 'v9.2.15', 'version' => '9.2.15.0', 'aliases' => array(), 'reference' => 'cb40cea39886d233ced6af185c910b4121b5005d'), 'symplify/rule-doc-generator' => array('pretty_version' => 'v9.2.15', 'version' => '9.2.15.0', 'aliases' => array(), 'reference' => '1acc3d18e453024a86ce9ea1c5c4b3ccb80efc4b'), 'symplify/rule-doc-generator-contracts' => array('pretty_version' => 'v9.2.15', 'version' => '9.2.15.0', 'aliases' => array(), 'reference' => 'b02f4b86397534e1afcf5d6466b15fb54b89f11c'), 'symplify/set-config-resolver' => array('pretty_version' => 'v9.2.15', 'version' => '9.2.15.0', 'aliases' => array(), 'reference' => 'f2d80dcd8590757073f542270068b2ca2e128ca4'), 'symplify/simple-php-doc-parser' => array('pretty_version' => 'v9.2.11', 'version' => '9.2.11.0', 'aliases' => array(), 'reference' => '69ae28060e87ec710cc581590e7882e349db6002'), 'symplify/skipper' => array('pretty_version' => 'v9.2.15', 'version' => '9.2.15.0', 'aliases' => array(), 'reference' => '51ed7beec77be733ecaff4501327ca0858970814'), 'symplify/smart-file-system' => array('pretty_version' => 'v9.2.15', 'version' => '9.2.15.0', 'aliases' => array(), 'reference' => 'd7a222bf576248700aa376fed6727ff665493c02'), 'symplify/symfony-php-config' => array('pretty_version' => 'v9.2.15', 'version' => '9.2.15.0', 'aliases' => array(), 'reference' => '0e8fd804828b7fcd1f8395d6fbb2ff57424daf48'), 'symplify/symplify-kernel' => array('pretty_version' => 'v9.2.15', 'version' => '9.2.15.0', 'aliases' => array(), 'reference' => '6a62772318b3f5db9342440269e069065e363a5c'), 'webmozart/assert' => array('pretty_version' => '1.10.0', 'version' => '1.10.0.0', 'aliases' => array(), 'reference' => '6964c76c7804814a842473e0c8fd15bab0f18e25')));
    private static $canGetVendors;
    private static $installedByVendor = array();
    public static function getInstalledPackages()
    {
        $packages = array();
        foreach (self::getInstalled() as $installed) {
            $packages[] = \array_keys($installed['versions']);
        }
        if (1 === \count($packages)) {
            return $packages[0];
        }
        return \array_keys(\array_flip(\call_user_func_array('array_merge', $packages)));
    }
    public static function isInstalled($packageName)
    {
        foreach (self::getInstalled() as $installed) {
            if (isset($installed['versions'][$packageName])) {
                return \true;
            }
        }
        return \false;
    }
    public static function satisfies(\Typo3RectorPrefix20210408\Composer\Semver\VersionParser $parser, $packageName, $constraint)
    {
        $constraint = $parser->parseConstraints($constraint);
        $provided = $parser->parseConstraints(self::getVersionRanges($packageName));
        return $provided->matches($constraint);
    }
    public static function getVersionRanges($packageName)
    {
        foreach (self::getInstalled() as $installed) {
            if (!isset($installed['versions'][$packageName])) {
                continue;
            }
            $ranges = array();
            if (isset($installed['versions'][$packageName]['pretty_version'])) {
                $ranges[] = $installed['versions'][$packageName]['pretty_version'];
            }
            if (\array_key_exists('aliases', $installed['versions'][$packageName])) {
                $ranges = \array_merge($ranges, $installed['versions'][$packageName]['aliases']);
            }
            if (\array_key_exists('replaced', $installed['versions'][$packageName])) {
                $ranges = \array_merge($ranges, $installed['versions'][$packageName]['replaced']);
            }
            if (\array_key_exists('provided', $installed['versions'][$packageName])) {
                $ranges = \array_merge($ranges, $installed['versions'][$packageName]['provided']);
            }
            return \implode(' || ', $ranges);
        }
        throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
    }
    public static function getVersion($packageName)
    {
        foreach (self::getInstalled() as $installed) {
            if (!isset($installed['versions'][$packageName])) {
                continue;
            }
            if (!isset($installed['versions'][$packageName]['version'])) {
                return null;
            }
            return $installed['versions'][$packageName]['version'];
        }
        throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
    }
    public static function getPrettyVersion($packageName)
    {
        foreach (self::getInstalled() as $installed) {
            if (!isset($installed['versions'][$packageName])) {
                continue;
            }
            if (!isset($installed['versions'][$packageName]['pretty_version'])) {
                return null;
            }
            return $installed['versions'][$packageName]['pretty_version'];
        }
        throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
    }
    public static function getReference($packageName)
    {
        foreach (self::getInstalled() as $installed) {
            if (!isset($installed['versions'][$packageName])) {
                continue;
            }
            if (!isset($installed['versions'][$packageName]['reference'])) {
                return null;
            }
            return $installed['versions'][$packageName]['reference'];
        }
        throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
    }
    public static function getRootPackage()
    {
        $installed = self::getInstalled();
        return $installed[0]['root'];
    }
    public static function getRawData()
    {
        return self::$installed;
    }
    public static function reload($data)
    {
        self::$installed = $data;
        self::$installedByVendor = array();
    }
    private static function getInstalled()
    {
        if (null === self::$canGetVendors) {
            self::$canGetVendors = \method_exists('Typo3RectorPrefix20210408\\Composer\\Autoload\\ClassLoader', 'getRegisteredLoaders');
        }
        $installed = array();
        if (self::$canGetVendors) {
            foreach (\Typo3RectorPrefix20210408\Composer\Autoload\ClassLoader::getRegisteredLoaders() as $vendorDir => $loader) {
                if (isset(self::$installedByVendor[$vendorDir])) {
                    $installed[] = self::$installedByVendor[$vendorDir];
                } elseif (\is_file($vendorDir . '/composer/installed.php')) {
                    $installed[] = self::$installedByVendor[$vendorDir] = (require $vendorDir . '/composer/installed.php');
                }
            }
        }
        $installed[] = self::$installed;
        return $installed;
    }
}
