<?php
/**
 * @package Blox Page Builder
 * @author UniteCMS.net
 * @copyright (C) 2017 Unite CMS, All Rights Reserved. 
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * */
defined('UNLIMITED_ADDONS_INC') or die('Restricted access');


/*
 * This file is part of Twig.
 *
 * (c) 2010-2012 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Represents a template function.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Twig_SimpleFunction
{
    protected $name;
    protected $callable;
    protected $options;
    protected $arguments = array();

    public function __construct($name, $callable, array $options = array())
    {
        $this->name = $name;
        $this->callable = $callable;
        $this->options = array_merge(array(
            'needs_environment' => false,
            'needs_context'     => false,
            'is_safe'           => null,
            'is_safe_callback'  => null,
            'node_class'        => 'Twig_Node_Expression_Function',
        ), $options);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCallable()
    {
        return $this->callable;
    }

    public function getNodeClass()
    {
        return $this->options['node_class'];
    }

    public function setArguments($arguments)
    {
        $this->arguments = $arguments;
    }

    public function getArguments()
    {
        return $this->arguments;
    }

    public function needsEnvironment()
    {
        return $this->options['needs_environment'];
    }

    public function needsContext()
    {
        return $this->options['needs_context'];
    }

    public function getSafe(Twig_Node $functionArgs)
    {
        if (null !== $this->options['is_safe']) {
            return $this->options['is_safe'];
        }

        if (null !== $this->options['is_safe_callback']) {
            return call_user_func($this->options['is_safe_callback'], $functionArgs);
        }

        return array();
    }
}
