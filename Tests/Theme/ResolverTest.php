<?php

/**
 * This file is part of the ElaoFormTheme bundle.
 *
 * Copyright (C) 2016 Elao
 *
 * @author Elao <contact@elao.com>
 */

namespace Elao\Bundle\FormThemeBundle\Tests\Theme;

use Elao\Bundle\FormThemeBundle\Theme\Resolver;

class ResolverTest extends \PHPUnit_Framework_TestCase
{
    public function testCallbackMatcher()
    {
        $this->assertTrue((new CallbackMatcher(function () { return true; }))->match('', ''));
        $this->assertFalse((new CallbackMatcher(function () { return false; }))->match('', ''));
    }

    /**
     * @depends testCallbackMatcher
     */
    public function testResolve()
    {
        $zones = [
            'foobar' => [
                'themes'   => ['foobar.html.twig'],
                'matchers' => [
                    ['type' => 'callback_matcher', 'pattern' => 'Acme\Bundle\Form\FoobarType'],
                ]
            ],
            'barfoo' => [
                'themes'   => ['barfoo.html.twig'],
                'matchers' => [
                    ['type' => 'callback_matcher', 'pattern' => 'Acme\Bundle\Form\BarfooType'],
                ]
            ],
        ];

        $resolver = new Resolver($zones);
        $resolver->addMatcher('callback_matcher', new CallbackMatcher(function ($pattern, $type) {
            return $pattern === $type;
        }));

        $this->assertEquals(['foobar.html.twig'], $resolver->resolve('Acme\Bundle\Form\FoobarType'));
        $this->assertEquals(['barfoo.html.twig'], $resolver->resolve('Acme\Bundle\Form\BarfooType'));
        $this->assertEquals([], $resolver->resolve('Acme\Bundle\Form\AcmeType'));
    }
}