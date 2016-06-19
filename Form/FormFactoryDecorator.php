<?php

/**
 * This file is part of the ElaoFormTheme bundle.
 *
 * Copyright (C) 2016 Elao
 *
 * @author Elao <contact@elao.com>
 */

namespace Elao\Bundle\FormThemeBundle\Form;

use Elao\Bundle\FormThemeBundle\Theme\ThemeResolver;
use Symfony\Component\Form\FormFactoryInterface;

class FormFactoryDecorator implements FormFactoryInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var ThemeResolver
     */
    private $themeResolver;

    /**
     * FormFactoryDecorator constructor.
     *
     * @param FormFactoryInterface   $formFactory
     * @param ThemeResolver          $themeResolver
     */
    public function __construct(FormFactoryInterface $formFactory, ThemeResolver $themeResolver)
    {
        $this->formFactory   = $formFactory;
        $this->themeResolver = $themeResolver;
    }

    /**
     * {@inheritdoc}
     */
    public function create($type = 'Symfony\Component\Form\Extension\Core\Type\FormType', $data = null, array $options = [])
    {
        return $this->formFactory->create($type, $data, $this->resolveTheme($type, $options));
    }

    /**
     * {@inheritdoc}
     */
    public function createNamed($name, $type = 'Symfony\Component\Form\Extension\Core\Type\FormType', $data = null, array $options = [])
    {
        return $this->formFactory->createNamed($name, $type, $data, $this->resolveTheme($type, $options));
    }

    /**
     * {@inheritdoc}
     */
    public function createForProperty($class, $property, $data = null, array $options = [])
    {
        return $this->createForProperty($class, $property, $data = null, $this->resolveTheme($type, $options));
    }

    /**
     * {@inheritdoc}
     */
    public function createBuilder($type = 'Symfony\Component\Form\Extension\Core\Type\FormType', $data = null, array $options = [])
    {
        return $this->createBuilder($type, $data, $this->resolveTheme($type, $options));
    }

    /**
     * {@inheritdoc}
     */
    public function createNamedBuilder($name, $type = 'Symfony\Component\Form\Extension\Core\Type\FormType', $data = null, array $options = [])
    {
        return $this->createNamedBuilder($name, $type, $data, $this->resolveTheme($type, $options));
    }

    /**
     * {@inheritdoc}
     */
    public function createBuilderForProperty($class, $property, $data = null, array $options = [])
    {
        return $this->createBuilderForProperty($class, $property, $data, $this->resolveTheme($class, $options));
    }

    /**
     * @param string $type
     * @param array  $options
     *
     * @return array
     */
    protected function resolveTheme($type, array $options)
    {
        if (!isset($options['form_themes'])) {
            $options['form_themes'] = $this->themeResolver->resolve($type);
        }

        return $options;
    }
}
