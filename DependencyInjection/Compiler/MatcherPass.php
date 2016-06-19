<?php

/**
 * This file is part of the ElaoFormTheme bundle.
 *
 * Copyright (C) 2016 Elao
 *
 * @author Elao <contact@elao.com>
 */

namespace Elao\Bundle\FormThemeBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class MatcherPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $resolver = $container->findDefinition('elao.form_theme.theme_resolver');
        $matchers = $container->findTaggedServiceIds('elao.form_theme.matcher');

        foreach ($matchers as $id => $tags) {
            foreach ($tags as $tag) {
                $resolver->addMethodCall('addMatcher', [$tag['type'], new Reference($id)]);
            }
        }
    }
}
