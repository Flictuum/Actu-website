<?php

namespace NewsBundle\Listener;

use NewsBundle\Model\CommentInterface;
use NewsBundle\NewsEvents;
use PHPUnit\Framework\TestCase;
use NewsBundle\Provider\CommentProvider;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

class CommentListenerTest extends TestCase
{
    private $dispatcher;
    private $comment;
    private $provider;
    private $event;

    public function setUp()
    {
        $this->comment = $this->createMock(CommentInterface::class);
        $this->provider = $this->createMock(CommentProvider::class);
        $this->event = $this->getMockBuilder(GenericEvent::class)->setConstructorArgs([$this->comment])->getMock();
        $this->dispatcher =  new EventDispatcher();
    }

    public function tearDown()
    {
        $this->dispatcher =  null;
        $this->comment = null;
        $this->provider = null;
        $this->event = null;
    }

    public function testOnCommentCreationShouldCallOnceCountUpCommentProvider()
    {
        $this->provider->expects($this->once())
            ->method('countUp');
        $this->event->expects($this->once())
            ->method('getSubject')
            ->will($this->returnValue($this->comment));

        $listener = new CommentListener($this->provider);

        $this->dispatcher->addListener(NewsEvents::PRE_COMMENT_CREATION, [$listener, 'onCommentCreation'], 1);
        $this->dispatcher->dispatch(NewsEvents::PRE_COMMENT_CREATION, $this->event);
    }
}