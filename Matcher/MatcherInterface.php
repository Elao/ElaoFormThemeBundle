<?php

/**
 * This file is part of the ElaoFormTheme bundle.
 *
 * Copyright (C) 2016 Elao
 *
 * @author Elao <contact@elao.com>
 */

namespace Elao\Bundle\FormThemeBundle\Matcher;

interface MatcherInterface
{
    /**
     * @param string $pattern
     * @param string $type
     *
     * @return bool
     */
    public function match($pattern, $type);
}
