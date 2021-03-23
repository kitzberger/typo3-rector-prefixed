<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\English;

use Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern;
final class Uninflected
{
    /**
     * @return Pattern[]
     */
    public static function getSingular() : iterable
    {
        yield from self::getDefault();
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('.*ss'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('clothes'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('data'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('fascia'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('fuchsia'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('galleria'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('mafia'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('militia'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('pants'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('petunia'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('sepia'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('trivia'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('utopia'));
    }
    /**
     * @return Pattern[]
     */
    public static function getPlural() : iterable
    {
        yield from self::getDefault();
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('people'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('trivia'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('\\w+ware$'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('media'));
    }
    /**
     * @return Pattern[]
     */
    private static function getDefault() : iterable
    {
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('\\w+media'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('advice'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('aircraft'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('amoyese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('art'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('audio'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('baggage'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('bison'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('borghese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('bream'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('breeches'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('britches'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('buffalo'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('butter'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('cantus'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('carp'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('chassis'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('clippers'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('clothing'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('coal'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('cod'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('coitus'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('compensation'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('congoese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('contretemps'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('coreopsis'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('corps'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('cotton'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('data'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('debris'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('deer'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('diabetes'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('djinn'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('education'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('eland'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('elk'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('emoji'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('equipment'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('evidence'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('faroese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('feedback'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('fish'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('flounder'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('flour'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('foochowese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('food'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('furniture'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('gallows'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('genevese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('genoese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('gilbertese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('gold'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('headquarters'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('herpes'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('hijinks'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('homework'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('hottentotese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('impatience'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('information'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('innings'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('jackanapes'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('jeans'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('jedi'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('kiplingese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('knowledge'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('kongoese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('leather'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('love'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('lucchese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('luggage'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('mackerel'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('Maltese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('management'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('metadata'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('mews'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('money'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('moose'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('mumps'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('music'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('nankingese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('news'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('nexus'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('niasese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('nutrition'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('offspring'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('oil'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('patience'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('pekingese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('piedmontese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('pincers'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('pistoiese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('plankton'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('pliers'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('pokemon'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('police'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('polish'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('portuguese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('proceedings'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('progress'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('rabies'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('rain'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('research'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('rhinoceros'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('rice'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('salmon'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('sand'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('sarawakese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('scissors'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('sea[- ]bass'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('series'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('shavese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('shears'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('sheep'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('siemens'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('silk'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('sms'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('soap'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('social media'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('spam'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('species'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('staff'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('sugar'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('swine'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('talent'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('toothpaste'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('traffic'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('travel'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('trousers'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('trout'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('tuna'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('us'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('vermontese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('vinegar'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('weather'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('wenchowese'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('wheat'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('whiting'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('wildebeest'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('wood'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('wool'));
        (yield new \Typo3RectorPrefix20210323\Doctrine\Inflector\Rules\Pattern('yengeese'));
    }
}
