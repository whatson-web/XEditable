<?php

namespace WH\XEditableBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/admin/ymleditor")
 * Class YmlEditorController
 * @package WH\XEditableBundle\Controller
 */
class YmlEditorController extends Controller
{


    /**
     * @param $slug
     * @Route("/edit/{slug}", name="ymleditor_edit")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($slug)
    {





    }


}
