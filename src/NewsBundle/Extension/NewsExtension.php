<?php

namespace NewsBundle\Extension;

use Symfony\Component\Translation\TranslatorInterface;

class NewsExtension extends \Twig_Extension
{
    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('postPastDays', [$this, 'postPastDaysFilter']),
            new \Twig_SimpleFilter('nbComments', [$this, 'nbCommentsFilter']),
        ];
    }

    public function postPastDaysFilter(\DateTime $postDate)
    {
        $interval = (int)$postDate->diff(new \DateTime())
                                  ->format('%a');
        return $this->translator->transChoice('news.home.past_time', $interval, array('%time%' => $interval));
    }
}
