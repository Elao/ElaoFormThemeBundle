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
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('elao_form_theme');

        /*
         elao_form_theme:
            resolver:
                foobar:
                    type: class
                    rules:
                        Proximum\Vimeet\Ui\Bundle\AdminBundle\*: "@Ui/layout.html.twig"
                        Proximum\Vimeet\Ui\Bundle\EventBundle\*: "@Ui/default.html.twig"
                barfoo:
                    type: zone
                    rules:
                        "^/admin": "@Ui/layout.html.twig"
                        "^/": "@Ui/default.html.twig"
                my_resolver:
                    type: my_resolver
                    rules: ~

         */

        return $treeBuilder;
    }
}
