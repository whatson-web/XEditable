<?php
namespace WH\XEditableBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class XEditableExtension extends \Twig_Extension
{

    private $container;

    public function __construct(Container $container) {

        $this->container = $container;

    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('XeditablGetLib', array($this, 'getLib')),
            new \Twig_SimpleFunction('XEditableSimple', array($this, 'geParamsSimple')),
            new \Twig_SimpleFunction('XEditableEntity', array($this, 'geParamsEntity'))
        );
    }

    /**
     *
     * @param $slug
     * @return array|string
     */
    public function getLib()
    {

        if(!$this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) return '';


        $css    = '<link rel="stylesheet" href="/bundles/whxeditable/bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css" type="text/css" />';
        $js     = '<script type="text/javascript" src="/bundles/whxeditable/bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js"></script>';
        $script = '<script type="text/javascript">$(document).ready(function() { $(\'.x-editable\').editable();}); </script>';

        return $css.$js.$script;



    }


    public function geParamsSimple($params) {

        if(!$this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) return '';


        $p['class']         = 'x-editable';
        $p['data-type']     = 'text';
        $p['data-url']      = 'test';

        $tab = array();

        foreach($p as $k => $v) $tab[] = $k.'='.$v;

        return implode(' ', $tab);



    }

    public function geParamsEntity($params) {


        if(!$this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) return '';

        $p['class']         = 'x-editable';
        $p['data-type']     = 'text';
        $p['data-url']      = $this->container->get('router')->generate($params['route'], array('id' => $params['id'], 'field' => $params['field']));
        $p['data-name']     = $params['field'];
        $p['data-pk']       = $params['id'];
        $p['data-title']    = $params['field'];

        $tab = array();

        foreach($p as $k => $v) $tab[] = $k.'='.$v;

        return implode(' ', $tab);

    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'textAdmin';
    }

}
