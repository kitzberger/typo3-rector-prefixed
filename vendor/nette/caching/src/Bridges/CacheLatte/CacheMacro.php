<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */
declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Nette\Bridges\CacheLatte;

use Typo3RectorPrefix20210423\Latte;
use Typo3RectorPrefix20210423\Nette;
use Typo3RectorPrefix20210423\Nette\Caching\Cache;
/**
 * Macro {cache} ... {/cache}
 */
final class CacheMacro implements \Typo3RectorPrefix20210423\Latte\IMacro
{
    use Nette\SmartObject;
    /** @var bool */
    private $used;
    /**
     * Initializes before template parsing.
     * @return void
     */
    public function initialize()
    {
        $this->used = \false;
    }
    /**
     * Finishes template parsing.
     * @return array(prolog, epilog)
     */
    public function finalize()
    {
        if ($this->used) {
            return ['Nette\\Bridges\\CacheLatte\\CacheMacro::initRuntime($this);'];
        }
    }
    /**
     * New node is found.
     * @return bool
     */
    public function nodeOpened(\Typo3RectorPrefix20210423\Latte\MacroNode $node)
    {
        if ($node->modifiers) {
            throw new \Typo3RectorPrefix20210423\Latte\CompileException('Modifiers are not allowed in ' . $node->getNotation());
        }
        $this->used = \true;
        $node->empty = \false;
        $node->openingCode = \Typo3RectorPrefix20210423\Latte\PhpWriter::using($node)->write('<?php if (Nette\\Bridges\\CacheLatte\\CacheMacro::createCache($this->global->cacheStorage, %var, $this->global->cacheStack, %node.array?)) /* line %var */ try { ?>', \Typo3RectorPrefix20210423\Nette\Utils\Random::generate(), $node->startLine);
    }
    /**
     * Node is closed.
     * @return void
     */
    public function nodeClosed(\Typo3RectorPrefix20210423\Latte\MacroNode $node)
    {
        $node->closingCode = \Typo3RectorPrefix20210423\Latte\PhpWriter::using($node)->write('<?php
				Nette\\Bridges\\CacheLatte\\CacheMacro::endCache($this->global->cacheStack, %node.array?) /* line %var */;
				} catch (\\Throwable $ʟ_e) {
					Nette\\Bridges\\CacheLatte\\CacheMacro::rollback($this->global->cacheStack); throw $ʟ_e;
				} ?>', $node->startLine);
    }
    /********************* run-time helpers ****************d*g**/
    public static function initRuntime(\Typo3RectorPrefix20210423\Latte\Runtime\Template $template) : void
    {
        if (!empty($template->global->cacheStack)) {
            $file = (new \ReflectionClass($template))->getFileName();
            if (@\is_file($file)) {
                // @ - may trigger error
                \end($template->global->cacheStack)->dependencies[\Typo3RectorPrefix20210423\Nette\Caching\Cache::FILES][] = $file;
            }
        }
    }
    /**
     * Starts the output cache. Returns Nette\Caching\OutputHelper object if buffering was started.
     * @return Nette\Caching\OutputHelper|\stdClass
     */
    public static function createCache(\Typo3RectorPrefix20210423\Nette\Caching\Storage $cacheStorage, string $key, ?array &$parents, array $args = null)
    {
        if ($args) {
            if (\array_key_exists('if', $args) && !$args['if']) {
                return $parents[] = new \stdClass();
            }
            $key = \array_merge([$key], \array_intersect_key($args, \range(0, \count($args))));
        }
        if ($parents) {
            \end($parents)->dependencies[\Typo3RectorPrefix20210423\Nette\Caching\Cache::ITEMS][] = $key;
        }
        $cache = new \Typo3RectorPrefix20210423\Nette\Caching\Cache($cacheStorage, 'Nette.Templating.Cache');
        if ($helper = $cache->start($key)) {
            $parents[] = $helper;
        }
        return $helper;
    }
    /**
     * Ends the output cache.
     * @param  Nette\Caching\OutputHelper[]  $parents
     */
    public static function endCache(array &$parents, array $args = null) : void
    {
        $helper = \array_pop($parents);
        if (!$helper instanceof \Typo3RectorPrefix20210423\Nette\Caching\OutputHelper) {
            return;
        }
        if (isset($args['dependencies'])) {
            $args += $args['dependencies']();
        }
        if (isset($args['expire'])) {
            $args['expiration'] = $args['expire'];
            // back compatibility
        }
        $helper->dependencies[\Typo3RectorPrefix20210423\Nette\Caching\Cache::TAGS] = $args['tags'] ?? null;
        $helper->dependencies[\Typo3RectorPrefix20210423\Nette\Caching\Cache::EXPIRATION] = $args['expiration'] ?? '+ 7 days';
        $helper->end();
    }
    /**
     * @param  Nette\Caching\OutputHelper[]  $parents
     */
    public static function rollback(array &$parents) : void
    {
        $helper = \array_pop($parents);
        if ($helper instanceof \Typo3RectorPrefix20210423\Nette\Caching\OutputHelper) {
            $helper->rollback();
        }
    }
}
