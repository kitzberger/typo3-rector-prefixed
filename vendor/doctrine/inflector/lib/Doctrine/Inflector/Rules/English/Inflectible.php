<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\English;

use Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern;
use Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution;
use Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation;
use Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word;
class Inflectible
{
    /**
     * @return Transformation[]
     */
    public static function getSingular() : iterable
    {
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(s)tatuses$'), 'Typo3RectorPrefix20210422\\1\\2tatus'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(s)tatus$'), 'Typo3RectorPrefix20210422\\1\\2tatus'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(c)ampus$'), 'Typo3RectorPrefix20210422\\1\\2ampus'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('^(.*)(menu)s$'), 'Typo3RectorPrefix20210422\\1\\2'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(quiz)zes$'), '\\1'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(matr)ices$'), '\\1ix'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(vert|ind)ices$'), '\\1ex'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('^(ox)en'), '\\1'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(alias)(es)*$'), '\\1'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(buffal|her|potat|tomat|volcan)oes$'), '\\1o'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(alumn|bacill|cact|foc|fung|nucle|radi|stimul|syllab|termin|viri?)i$'), '\\1us'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('([ftw]ax)es'), '\\1'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(analys|ax|cris|test|thes)es$'), '\\1is'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(shoe|slave)s$'), '\\1'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(o)es$'), '\\1'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('ouses$'), 'ouse'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('([^a])uses$'), '\\1us'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('([m|l])ice$'), '\\1ouse'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(x|ch|ss|sh)es$'), '\\1'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(m)ovies$'), 'Typo3RectorPrefix20210422\\1\\2ovie'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(s)eries$'), 'Typo3RectorPrefix20210422\\1\\2eries'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('([^aeiouy]|qu)ies$'), '\\1y'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('([lr])ves$'), '\\1f'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(tive)s$'), '\\1'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(hive)s$'), '\\1'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(drive)s$'), '\\1'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(dive)s$'), '\\1'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(olive)s$'), '\\1'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('([^fo])ves$'), '\\1fe'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(^analy)ses$'), '\\1sis'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(analy|diagno|^ba|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$'), 'Typo3RectorPrefix20210422\\1\\2sis'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(tax)a$'), '\\1on'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(c)riteria$'), '\\1riterion'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('([ti])a$'), '\\1um'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(p)eople$'), 'Typo3RectorPrefix20210422\\1\\2erson'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(m)en$'), '\\1an'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(c)hildren$'), 'Typo3RectorPrefix20210422\\1\\2hild'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(f)eet$'), '\\1oot'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(n)ews$'), 'Typo3RectorPrefix20210422\\1\\2ews'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('eaus$'), 'eau'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('s$'), ''));
    }
    /**
     * @return Transformation[]
     */
    public static function getPlural() : iterable
    {
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(s)tatus$'), 'Typo3RectorPrefix20210422\\1\\2tatuses'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(quiz)$'), '\\1zes'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('^(ox)$'), 'Typo3RectorPrefix20210422\\1\\2en'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('([m|l])ouse$'), '\\1ice'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(matr|vert|ind)(ix|ex)$'), '\\1ices'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(x|ch|ss|sh)$'), '\\1es'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('([^aeiouy]|qu)y$'), '\\1ies'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(hive|gulf)$'), '\\1s'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(?:([^f])fe|([lr])f)$'), 'Typo3RectorPrefix20210422\\1\\2ves'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('sis$'), 'ses'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('([ti])um$'), '\\1a'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(tax)on$'), '\\1a'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(c)riterion$'), '\\1riteria'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(p)erson$'), '\\1eople'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(m)an$'), '\\1en'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(c)hild$'), '\\1hildren'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(f)oot$'), '\\1eet'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(buffal|her|potat|tomat|volcan)o$'), 'Typo3RectorPrefix20210422\\1\\2oes'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(alumn|bacill|cact|foc|fung|nucle|radi|stimul|syllab|termin|vir)us$'), '\\1i'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('us$'), 'uses'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(alias)$'), '\\1es'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('(analys|ax|cris|test|thes)is$'), '\\1es'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('s$'), 's'));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('^$'), ''));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Pattern('$'), 's'));
    }
    /**
     * @return Substitution[]
     */
    public static function getIrregular() : iterable
    {
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('atlas'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('atlases')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('axe'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('axes')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('beef'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('beefs')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('brother'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('brothers')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('cafe'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('cafes')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('chateau'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('chateaux')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('niveau'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('niveaux')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('child'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('children')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('canvas'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('canvases')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('cookie'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('cookies')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('corpus'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('corpuses')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('cow'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('cows')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('criterion'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('criteria')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('curriculum'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('curricula')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('demo'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('demos')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('domino'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('dominoes')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('echo'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('echoes')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('foot'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('feet')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('fungus'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('fungi')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('ganglion'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('ganglions')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('gas'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('gases')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('genie'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('genies')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('genus'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('genera')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('goose'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('geese')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('graffito'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('graffiti')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('hippopotamus'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('hippopotami')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('hoof'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('hoofs')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('human'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('humans')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('iris'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('irises')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('larva'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('larvae')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('leaf'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('leaves')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('lens'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('lenses')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('loaf'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('loaves')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('man'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('men')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('medium'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('media')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('memorandum'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('memoranda')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('money'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('monies')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('mongoose'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('mongooses')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('motto'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('mottoes')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('move'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('moves')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('mythos'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('mythoi')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('niche'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('niches')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('nucleus'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('nuclei')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('numen'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('numina')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('occiput'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('occiputs')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('octopus'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('octopuses')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('opus'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('opuses')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('ox'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('oxen')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('passerby'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('passersby')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('penis'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('penises')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('person'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('people')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('plateau'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('plateaux')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('runner-up'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('runners-up')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('safe'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('safes')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('sex'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('sexes')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('soliloquy'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('soliloquies')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('son-in-law'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('sons-in-law')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('syllabus'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('syllabi')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('testis'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('testes')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('thief'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('thieves')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('tooth'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('teeth')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('tornado'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('tornadoes')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('trilby'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('trilbys')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('turf'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('turfs')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('valve'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('valves')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('volcano'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('volcanoes')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('abuse'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('abuses')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('avalanche'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('avalanches')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('cache'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('caches')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('criterion'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('criteria')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('curve'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('curves')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('emphasis'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('emphases')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('foe'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('foes')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('grave'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('graves')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('hoax'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('hoaxes')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('medium'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('media')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('neurosis'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('neuroses')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('save'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('saves')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('wave'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('waves')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('oasis'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('oases')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('valve'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('valves')));
        (yield new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('zombie'), new \Typo3RectorPrefix20210422\Doctrine\Inflector\Rules\Word('zombies')));
    }
}
