<?php
// src/Controller/BlogController.php
namespace App\Controller;

use App\Entity\Posts;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function list()
    {
        $posts = $this->getDoctrine()
            ->getRepository(Posts::class)
            ->findAll();

        return $this->render('blog/list.html.twig', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = $this->getDoctrine()
            ->getRepository(Posts::class)
            ->find($id);

        if (!$post) {
            // cause the 404 page not found to be displayed
            throw $this->createNotFoundException();
        }

        return $this->render('blog/show.html.twig', ['post' => $post]);
    }
}