<?php

/**
 * This file is part of the ElaoFormTheme bundle.
 *
 * Copyright (C) 2016 Elao
 *
 * @author Elao <contact@elao.com>
 */

namespace Elao\Bundle\FormThemeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * ElaoFormTheme bundle configuration
 *
 * @author Maxime Colin <contact@maximecolin.fr>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     *
     * elao_form_theme
     *     back:
     *         themes: ['@Ui/back.html.twig']
     *         resolvers:
     *             - type: class
     *               class: 'Acme\Ui\Bundle\AdminBundle\*'
     *     front:
     *         themes: ['@Ui/front.html.twig']
     *         resolvers:
     *             - type: request_matcher
     *               path: '^/.*'
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('elao_form_theme');

        $rootNode
            ->prototype('array')
                ->children()
                    ->arrayNode('themes')
                        ->prototype('scalar')->end()
                    ->end()
                    ->arrayNode('matchers')
                        ->prototype('array')
                            ->children()
                                ->scalarNode('type')->end()
                                ->scalarNode('pattern')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
