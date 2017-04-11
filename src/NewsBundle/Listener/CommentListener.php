<?php

namespace NewsBundle\Listener;

use NewsBundle\Provider\CommentProvider;
use Symfony\Component\EventDispatcher\GenericEvent;

class CommentListener
{
    private $commentProvider;

    public function __construct(CommentProvider $commentProvider)
    {
        $this->commentProvider = $commentProvider;
    }

    public function onCommentCreation(GenericEvent $event)
    {
        $this->commentProvider->countUp($event->getSubject());
    }
}
