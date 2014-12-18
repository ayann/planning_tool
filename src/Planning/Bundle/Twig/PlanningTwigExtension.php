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
            new \Twig_SimpleFilter('date_french', array($this, 'date_frenchFilter')),
            new \Twig_SimpleFilter('datetime_french', array($this, 'datetime_frenchFilter')),
        );
    }

    public function activeLinkFilter($path_name){
        $routeName = $this->request->get('_route');
        return $routeName == $path_name ? 'active' : '';
    }

    public function date_frenchFilter($date){
        $Jour = array(
            "Sun" => "Dimanche",
            "Mon" => "Lundi",
            "Tue" => "Mardi",
            "Wed" => "Mercredi",
            "Thu" => "Jeudi",
            "Fri" => "Vendredi",
            "Sat" => "Samedi"
        );

        $Mois = array(
            "Jan" => "Janvier",
            "Feb" => "Février",
            "Mar" => "Mars",
            "Apr" => "Avril",
            "May" => "Mai",
            "Jun" => "Juin",
            "Jul" => "Juillet",
            "Aug" => "Août",
            "Sep" => "Septembre",
            "Oct" => "Octobre",
            "Nov" => "Novembre",
            "Dec" => "Décembre"
        );

        list($day, $day_num, $month, $year) = explode("/", $date);

        return "$Jour[$day] $day_num $Mois[$month] $year";
    }

    public function datetime_frenchFilter($date){
        list($day, $day_num, $month, $year, $time) = explode("/", $date);
        $d = "$day/$day_num/$month/$year";
        list($hour, $mn) = explode(":", $time);
        return $this->date_frenchFilter($d).' '.$hour."h $mn";
    }

    public function getName(){
        return 'planning_twig_extension';
    }
}