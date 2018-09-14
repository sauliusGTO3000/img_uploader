<?php

namespace App\Controller;

use App\Entity\Image;
use App\Form\ImageType;
use App\Repository\ImageRepository;
use App\Service\FileUploader;
use Knp\Component\Pager\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\Translator;


/**
 * @Route("/image")
 */
class ImageController extends Controller
{
    /**
     * @param ImageRepository $imageRepository
     * @param Request $request
     * @Route("/", name="image_index", methods="GET")
     *
     * @return Response
     */
    public function index(ImageRepository $imageRepository, Request $request): Response
    {
        $images = $imageRepository->findByIdDesc();
        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $images,
            $request->query->getInt('page',1),
            $request->query->getInt('limir',9)
        );
        return $this->render('image/index.html.twig', [
            'images' => $result,
        ]);
    }

    /**
     * @param Request $request
     * @param FileUploader $fileUploader
     * @Route(name="new", methods="POST|GET")
     *
     * @return Response
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $image = new Image();
        $form = $this->createForm(ImageType::class, $image,[
            'action' => $this->generateUrl('new'),
            'method' => 'POST'
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('filename')->getData();
            $fileName = $fileUploader->upload($file);
            $image->setFilename($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();

            return $this->redirectToRoute('image_index');
        }

        return $this->render('image/_form.html.twig', [
            'image' => $image,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Image $image
     * @Route("/{id}", name="image_show", methods="GET")
     *
     * @return Response
     */
    public function show(Image $image): Response
    {
        return $this->render('image/show.html.twig', ['image' => $image]);
    }
}
