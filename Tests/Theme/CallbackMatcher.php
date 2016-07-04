<?php

/**
 * This file is part of the ElaoFormTheme bundle.
 *
 * Copyright (C) 2016 Elao
 *
 * @author Elao <contact@elao.com>
 */

namespace Elao\Bundle\FormThemeBundle\Tests\Theme;

use Elao\Bundle\FormThemeBundle\Matcher\MatcherInterface;

class CallbackMatcher implements MatcherInterface
{
    /**
     * @var callable
     */
    private $callback;

    /**
     * CallbackMatcher constructor.
     *
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * {@inheritdoc}
     */
    public function match($pattern, $type)
    {
        $callback = $this->callback;

        return $callback($pattern, $type);
    }
}
