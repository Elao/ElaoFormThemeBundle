<?php

/**
 * This file is part of the ElaoFormTheme bundle.
 *
 * Copyright (C) 2016 Elao
 *
 * @author Elao <contact@elao.com>
 */

namespace Elao\Bundle\FormThemeBundle\Matcher;

use Symfony\Component\HttpFoundation\RequestStack;

class RequestMatcher implements MatcherInterface
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * RequestMatcher constructor.
     *
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * {@inheritdoc}
     */
    public function match($pattern, $type)
    {
        return 1 === preg_match(sprintf('#%s#i', $pattern), $this->requestStack->getMasterRequest()->getPathInfo());
    }
}
