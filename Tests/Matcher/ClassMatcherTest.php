<?php

/**
 * This file is part of the ElaoFormTheme bundle.
 *
 * Copyright (C) 2016 Elao
 *
 * @author Elao <contact@elao.com>
 */

namespace Elao\Bundle\FormThemeBundle\Tests\Matcher;

use Elao\Bundle\FormThemeBundle\Matcher\ClassMatcher;

class ClassMatcherTest extends \PHPUnit_Framework_TestCase
{
    public static function provideMatches()
    {
        return [
            ['^Acme\FoobarBundle\Form', 'Acme\FoobarBundle\Form\Type\FoobarType', true],
            ['^Acme', 'Acme\FoobarBundle\Form\Type\FoobarType', true],
            ['^Acme\FoobarBundle\Form', 'Acme\BarfooBundle\Form\Type\FoobarType', false],
            ['^Acme\FoobarBundle\Form', 'Elao\FoobarBundle\Form\Type\FoobarType', false],
        ];
    }

    /**
     * @dataProvider provideMatches
     *
     * @param string $pattern
     * @param string $type
     * @param bool   $expected
     */
    public function testMatch($pattern, $type, $expected)
    {
        $matcher = new ClassMatcher();

        $this->assertEquals($expected, $matcher->match($pattern, $type));
    }
}
