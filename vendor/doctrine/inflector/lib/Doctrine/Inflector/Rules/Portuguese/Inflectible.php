<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Portuguese;

use Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern;
use Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution;
use Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation;
use Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word;
class Inflectible
{
    /**
     * @return Transformation[]
     */
    public static function getSingular() : iterable
    {
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/^(g|)ases$/i'), '\\1ás'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/(japon|escoc|ingl|dinamarqu|fregu|portugu)eses$/i'), '\\1ês'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/(ae|ao|oe)s$/'), 'ao'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/(ãe|ão|õe)s$/'), 'ão'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/^(.*[^s]s)es$/i'), '\\1'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/sses$/i'), 'sse'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/ns$/i'), 'm'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/(r|t|f|v)is$/i'), '\\1il'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/uis$/i'), 'ul'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/ois$/i'), 'ol'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/eis$/i'), 'ei'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/éis$/i'), 'el'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/([^p])ais$/i'), '\\1al'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/(r|z)es$/i'), '\\1'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/^(á|gá)s$/i'), '\\1s'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/([^ê])s$/i'), '\\1'));
    }
    /**
     * @return Transformation[]
     */
    public static function getPlural() : iterable
    {
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/^(alem|c|p)ao$/i'), '\\1aes'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/^(irm|m)ao$/i'), '\\1aos'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/ao$/i'), 'oes'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/^(alem|c|p)ão$/i'), '\\1ães'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/^(irm|m)ão$/i'), '\\1ãos'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/ão$/i'), 'ões'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/^(|g)ás$/i'), '\\1ases'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/^(japon|escoc|ingl|dinamarqu|fregu|portugu)ês$/i'), '\\1eses'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/m$/i'), 'ns'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/([^aeou])il$/i'), '\\1is'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/ul$/i'), 'uis'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/ol$/i'), 'ois'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/el$/i'), 'eis'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/al$/i'), 'ais'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/(z|r)$/i'), '\\1es'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/(s)$/i'), '\\1'));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Transformation(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Pattern('/$/'), 's'));
    }
    /**
     * @return Substitution[]
     */
    public static function getIrregular() : iterable
    {
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('abdomen'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('abdomens')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('alemão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('alemães')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('artesã'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('artesãos')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('álcool'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('álcoois')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('árvore'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('árvores')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('bencão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('bencãos')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('cão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('cães')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('campus'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('campi')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('cadáver'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('cadáveres')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('capelão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('capelães')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('capitão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('capitães')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('chão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('chãos')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('charlatão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('charlatães')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('cidadão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('cidadãos')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('consul'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('consules')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('cristão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('cristãos')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('difícil'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('difíceis')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('email'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('emails')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('escrivão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('escrivães')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('fóssil'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('fósseis')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('gás'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('gases')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('germens'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('germen')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('grão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('grãos')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('hífen'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('hífens')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('irmão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('irmãos')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('liquens'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('liquen')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('mal'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('males')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('mão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('mãos')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('orfão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('orfãos')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('país'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('países')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('pai'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('pais')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('pão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('pães')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('projétil'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('projéteis')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('réptil'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('répteis')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('sacristão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('sacristães')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('sotão'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('sotãos')));
        (yield new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Substitution(new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('tabelião'), new \Typo3RectorPrefix20210408\Doctrine\Inflector\Rules\Word('tabeliães')));
    }
}
