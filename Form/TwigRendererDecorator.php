<?php

/**
 * This file is part of the ElaoFormTheme bundle.
 *
 * Copyright (C) 2016 Elao
 *
 * @author Elao <contact@elao.com>
 */

namespace Elao\Bundle\FormThemeBundle\Form;

use Symfony\Bridge\Twig\Form\TwigRenderer;
use Symfony\Bridge\Twig\Form\TwigRendererInterface;
use Symfony\Component\Form\FormView;

class TwigRendererDecorator implements TwigRendererInterface
{
    /**
     * @var TwigRenderer
     */
    private $twigRenderer;

    /**
     * ThemeTwigRenderer constructor.
     *
     * @param TwigRenderer $twigRenderer
     */
    public function __construct(TwigRenderer $twigRenderer)
    {
        return $this->twigRenderer = $twigRenderer;
    }

    /**
     * {@inheritdoc}
     */
    public function getEngine()
    {
        return $this->twigRenderer->getEngine();
    }

    /**
     * {@inheritdoc}
     */
    public function setTheme(FormView $view, $themes)
    {
        $this->twigRenderer->setTheme($view, $themes);
    }

    /**
     * {@inheritdoc}
     */
    public function renderBlock(FormView $view, $blockName, array $variables = [])
    {
        $this->setThemes($view);

        return $this->twigRenderer->renderBlock($view, $blockName, $variables);
    }

    /**
     * {@inheritdoc}
     */
    public function searchAndRenderBlock(FormView $view, $blockNameSuffix, array $variables = [])
    {
        $this->setThemes($view);

        return $this->twigRenderer->searchAndRenderBlock($view, $blockNameSuffix, $variables);
    }

    /**
     * {@inheritdoc}
     */
    public function renderCsrfToken($tokenId)
    {
        return $this->twigRenderer->renderCsrfToken($tokenId);
    }

    /**
     * {@inheritdoc}
     */
    public function humanize($text)
    {
        return $this->twigRenderer->humanize($text);
    }

    /**
     * {@inheritdoc}
     */
    public function setEnvironment(\Twig_Environment $environment)
    {
        $this->twigRenderer->setEnvironment($environment);
    }

    /**
     * @param FormView $view
     */
    protected function setThemes(FormView $view)
    {
        if (!empty($view->vars['elao_form_themes'])) {
            $this->setTheme($view, $view->vars['elao_form_themes']);
        }
    }
}
