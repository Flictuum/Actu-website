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

        $this->assertTrue($result);
    }

    public function testIsSpamGivenLongTextShouldReturnFalse()
    {
        $antispam = new AntiSpam(50);
        $text = 'Grand test qui devrait retourner false car il fait plus de 50 charactères';

        $result = $antispam->isSpam($text);

        $this->assertFalse($result);
    }

    public function testIsSpamGivenEmptyTextShouldReturnTrue()
    {
        $antispam = new AntiSpam(50);
        $text = '';

        $result = $antispam->isSpam($text);

        $this->assertTrue($result);
    }

    public function testIsSpamGivenNullShouldReturnTrue()
    {
        $antispam = new AntiSpam(50);
        $text = null;

        $result = $antispam->isSpam($text);

        $this->assertTrue($result);
    }

    public function testIsSpamGivenNumberShouldReturnTrue()
    {
        $antispam = new AntiSpam(50);

        $result = $antispam->isSpam(5);

        $this->assertTrue($result);
    }
}
