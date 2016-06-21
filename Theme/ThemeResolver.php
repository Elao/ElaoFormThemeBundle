<?php

/**
 * This file is part of the ElaoFormTheme bundle.
 *
 * Copyright (C) 2016 Elao
 *
 * @author Elao <contact@elao.com>
 */

namespace Elao\Bundle\FormThemeBundle\Theme;

use Elao\Bundle\FormThemeBundle\Matcher\MatcherInterface;

class ThemeResolver
{
    /**
     * @var array
     */
    private $zones = [];

    /**
     * @var array
     */
    private $matchers = [];

    /**
     * ThemeResolver constructor.
     *
     * @param array $zones
     */
    public function __construct(array $zones)
    {
        $this->zones = $zones;
    }

    /**
     * @param string           $type
     * @param MatcherInterface $matcher
     */
    public function addMatcher($type, MatcherInterface $matcher)
    {
        $this->matchers[$type] = $matcher;
    }

    /**
     * @param string $type
     *
     * @return MatcherInterface
     * @throws \Exception
     */
    public function getMatcher($type)
    {
        if (!isset($this->matchers[$type])) {
            throw new \Exception(sprintf('Matcher "%s" not found.', $type));
        }

        return $this->matchers[$type];
    }

    /**
     * @param string $type
     *
     * @return array
     */
    public function resolve($type)
    {
        foreach ($this->zones as $name => $zone) {
            foreach ($zone['matchers'] as $matcher) {
                if ($this->getMatcher($matcher['type'])->match($matcher['pattern'], $type)) {
                    return $zone['themes'];
                }
            }
        }

        return [];
    }
}
