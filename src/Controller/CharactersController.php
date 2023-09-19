<?php

namespace App\Controller;

use App\Form\CharacterFormType;
use App\Repository\CharactersRepository;
use App\Entity\Characters;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request; 

class CharactersController extends AbstractController
{
    private $em;
    private $characterRepository;
    public function __construct(CharactersRepository $characterRepository, EntityManagerInterface $em) 
    {
        $this->characterRepository = $characterRepository;
        $this->em = $em;
    }

    #[Route('/', methods: ['GET'], name: 'characters')]
    public function index(): Response
    {
        $characters = $this->characterRepository->findAll();

        return $this->render('characters/index.html.twig', [
            'characters' => $characters
        ]);
    }

    #[Route('/create', name: 'create_characters')]
    public function create(Request $request): Response
    {
        $character = new Characters();
        $form = $this->createForm(CharacterFormType::class, $character);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newCharacter = $form->getData();
            
            $imagePath = $form->get('imagePath')->getData();
            if ($imagePath) {
                $newFileName = uniqid() . '-' . $imagePath->guessExtension();

                try {
                    $imagePath->move(
                        $this->getParameter('kernel.project_dir') . '/public/uploads',
                        $newFileName
                    );
                } catch (FileException $e) {
                    return new Response($e->getMessage());
                }

                $newCharacter->setImagePath('/uploads/' . $newFileName);
            }

            $this->em->persist($newCharacter);
            $this->em->flush();

            return $this->redirectToRoute('characters');
        }
            return $this->render('characters/create.html.twig', [
                'form' => $form->createView()
            ]);
    }

    #[Route('/edit/{id}', name: 'edit_character')]
    public function edit($id, Request $request): Response
    {
        $character = $this->characterRepository->find($id);
        $form = $this->createForm(CharacterFormType::class, $character);
        
        $form->handleRequest($request);
        $imagePath = $form->get('imagePath')->getData();

        if ($form->isSubmitted() && $form->isValid()) {
            if ($imagePath) {
                if ($character->getImagePath() !== null) {
                    if (file_exists($this->getParameter('kernel.project_dir') . '/public' . $character->getImagePath())) {
                        $this->GetParameter('kernel.project_dir') . $character->getImagePath();

                        $newFileName = uniqid() . '.' . $imagePath->guessExtension();

                        try {
                            $imagePath->move(
                                $this->getParameter('kernel.project_dir') . '/public/uploads',
                                $newFileName
                            );
                        } catch (FileException $e) {
                            return new Response($e->getMessage());
                        }

                        $character->setImagePath('/uploads/' . $newFileName);
                        $this->em->flush();

                        return $this->redirectToRoute('characters');
                    }
                }
            } else{
                $character->setName($form->get('name')->getData());
                $character->setAge($form->get('age')->getData());
                $character->setDescription($form->get('description')->getData());
                $character->setGender($form->get('gender')->getData());
                $character->setGroupSort($form->get('groupSort')->getData());

                $this->em->flush();
                return $this->redirectToRoute('characters');
            }
        }
        return $this->render('characters/edit.html.twig', [
            'character' => $character,
            'form' => $form->createView()
        ]);
    }

    #[Route('/{id}', methods: ['GET'], name: 'character')]
    public function show($id): Response
    {

        $character = $this->characterRepository->find($id);


        return $this->render('characters/show.html.twig', [
            'character' => $character
        ]);
    }
}