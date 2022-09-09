<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class BlogController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ManagerRegistry $managerRegistry, Request $request,  PaginatorInterface $paginator): Response
    {
        $posts =  $managerRegistry->getRepository(Post::class)->findBy(['isDeleted' => 0]);
        // $post_deleted = 'postsDeleted' => $managerRegistry->getRepository(Post::class)->findBy(['isDeleted' => 1]);

        // Paginate the results of the query
        $post = $paginator->paginate(
            // Doctrine Query, not results
            $posts,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            5
        );

        return $this->render('index.html.twig', [
            'posts' => $post,
            'postsDeleted' => $managerRegistry->getRepository(Post::class)->findBy(['isDeleted' => 1])
        ]);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('contact.twig');
    }

    #[Route('/post/{id}', name: 'post')]
    public function post(Post $post): Response
    {
        return $this->render('post.twig', [
            'post' => $post
        ]);
    }

    #[Route('/post_search/', name: 'post_search')]
    public function postSearch(Request $request, ManagerRegistry $managerRegistry): Response
    {
        $search = $request->query->get('search');

        if (!$search) return $this->redirectToRoute('index');

        return $this->render('search.html.twig', [
            'postsDeleted' => '',
            'posts' => $managerRegistry->getRepository(Post::class)->findPostLikeSearch($search),
        ]);
    }
}
