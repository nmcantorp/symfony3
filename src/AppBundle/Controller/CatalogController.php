<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CatalogController extends Controller
{
    public function getProductDao()
    {
        return $this->get('app.model_dao.producto_dao');
    }

    /**
     * @Route("/catalogo", name="catalog.list")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        return $this->render('catalog/list.html.twig', [
            'productos' => $this->getProductDao()->findAll(),
            'titulo' => 'Listado de Productos'
        ]);
    }

    /**
     * @Route("create_catalog", name="catalogo.crear")
     */
    public function createAction($id)
    {

    }
    public function saveAction(Request $request)
    {
    }

    /**
     * @Route("delete_catalog", name="catalogo.eliminar")
     */
    public function deleteAction($id)
    {
    }

}
