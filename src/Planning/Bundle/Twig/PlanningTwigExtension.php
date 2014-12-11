<?php 
// src/Planning/Bundle/Twig/PlanningTwigExtension.php

namespace Planning\Bundle\Twig;

class PlanningTwigExtension extends \Twig_Extension{

    protected $container;
    protected $request;

    public function __construct($container){
        $this->container = $container;

        if ($this->container->isScopeActive('request')) {
            $this->request = $this->container->get('request');
        }
    }

    public function getFilters(){
        return array(
            new \Twig_SimpleFilter('activeLink', array($this, 'activeLinkFilter')),
        );
    }

    public function activeLinkFilter($path_name){
        $routeName = $this->request->get('_route');
        return $routeName == $path_name ? 'active' : '';
    }

    public function getName(){
        return 'planning_twig_extension';
    }
}