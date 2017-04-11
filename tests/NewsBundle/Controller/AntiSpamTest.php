<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05/04/17
 * Time: 17:59
 */

namespace NewsBundle\Controller;

use NewsBundle\AntiSpam\AntiSpam;

class AntiSpamTest extends \PHPUnit_Framework_TestCase
{
    private $antispam;

    /** @var  antiSpam equal new object Antispam with 50 for the minLength of spam */
    /** because it's the default value */
    public function __construct()
    {
        $this->antiSpam = new AntiSpam(50);
    }

    public function testIsSpamReturnTrue()
    {
        $text = "Long test n'étant pas qualifié de spam car il fait plus de 50 charactères";

        $result = $this->antiSpam->isSpam($text);

        assertEqual(true, $result);
    }
}
