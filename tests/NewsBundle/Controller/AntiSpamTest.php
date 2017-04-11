<?php

namespace NewsBundle\Controller;

use NewsBundle\AntiSpam\AntiSpam;
use PHPUnit\Framework\TestCase;

class AntiSpamTest extends TestCase
{
    public function testIsSpamGivenShortTextShouldReturnTrue()
    {
        $antispam = new AntiSpam(50);
        $text = 'Short test';

        $result = $antispam->isSpam($text);

        $this->assertEquals(true, $result);
    }

    public function testIsSpamGivenLongTextShouldReturnFalse()
    {
        $antispam = new AntiSpam(50);
        $text = 'Grand test qui devrait retourner false car il fait plus de 50 charactères';

        $result = $antispam->isSpam($text);

        $this->assertEquals(false, $result);
    }

    public function testIsSpamGivenEmptyTextShouldReturnTrue()
    {
        $antispam = new AntiSpam(50);
        $text = '';

        $result = $antispam->isSpam($text);

        $this->assertEquals(true, $result);
    }

    public function testIsSpamGivenNullShouldReturnTrue()
    {
        $antispam = new AntiSpam(50);
        $text = null;

        $result = $antispam->isSpam($text);

        $this->assertEquals(true, $result);
    }
}
