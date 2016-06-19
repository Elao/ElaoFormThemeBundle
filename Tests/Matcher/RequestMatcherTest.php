<?php

/**
 * This file is part of the ElaoFormTheme bundle.
 *
 * Copyright (C) 2016 Elao
 *
 * @author Elao <contact@elao.com>
 */

namespace Elao\Bundle\FormThemeBundle\Tests\Matcher;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Elao\Bundle\FormThemeBundle\Matcher\RequestMatcher;

class RequestMatcherTest extends \PHPUnit_Framework_TestCase
{
    public static function provideMatches()
    {
        return [
            ['^/.*', '/', true],
            ['^/.*', '/foobar', true],
            ['^/.*', '/foobar/barfoo', true],
            ['^/.*', 'foobar', false],
            ['^/admin', '/admin', true],
            ['^/admin', '/admin/foobar', true],
            ['^/admin', 'foobar', false],
        ];
    }

    /**
     * @dataProvider provideMatches
     *
     * @param string $pattern
     * @param string $uri
     * @param bool   $expected
     */
    public function testMatch($pattern, $uri, $expected)
    {
        $requestStatck = $this->prophesize(RequestStack::class);
        $requestStatck->getMasterRequest()->shouldBeCalled()->willReturn(Request::create($uri));

        $matcher = new RequestMatcher($requestStatck->reveal());

        $this->assertEquals($expected, $matcher->match($pattern, 'Elao\FoobarBundle\Form\Type\FoobarType'));
    }
}
