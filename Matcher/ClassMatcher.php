<?php

/**
 * This file is part of the ElaoFormTheme bundle.
 *
 * Copyright (C) 2016 Elao
 *
 * @author Elao <contact@elao.com>
 */

namespace Elao\Bundle\FormThemeBundle\Matcher;

class ClassMatcher implements MatcherInterface
{
    /**
     * {@inheritdoc}
     */
    public function match($pattern, $type)
    {
        return 1 === preg_match(sprintf('#%s#i', str_replace('\\', '\\\\', $pattern)), $type);
    }
}
