<?php

/**
 * This file is part of the ElaoFormTheme bundle.
 *
 * Copyright (C) 2016 Elao
 *
 * @author Elao <contact@elao.com>
 */

namespace Elao\Bundle\FormThemeBundle;

use Elao\Bundle\FormThemeBundle\DependencyInjection\Compiler\MatcherPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Elao From Theme Bundle
 */
class ElaoFormThemeBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new MatcherPass());
    }
}
