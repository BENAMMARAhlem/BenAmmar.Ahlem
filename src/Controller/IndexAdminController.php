<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexAdminController extends AbstractController
{
    /**
     * @Route("/index/admin", name="index_admin")
     */
    public function index()
    {
        return $this->render('index_admin/index.html.twig', [
            'controller_name' => 'IndexAdminController',
        ]);
    }
}
