<?php

// src/Service/FileUploader.php
namespace App\Service;

use App\Controller\CharactersController;
use App\Entity\Characters;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class FileUploader extends AbstractController
{
    public function __construct(
        // private string $targetDirectory,
        private SluggerInterface $slugger,
    ) {
    }

    public function upload(UploadedFile $file): string
    {

        $imagePath = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $newFileName = $this->slugger->slug($imagePath);
        // $newCharacter = $form->getData();
        // $imagePath = $form->get('imagePath')->getData();
            $newFileName = uniqid() . '.' . $file->guessExtension();
            try {
            $file->move(
                $this->getParameter('kernel.project_dir') . '/public/uploads',
                $newFileName
                );
            } catch (FileException $e) {
                return new Response($e->getMessage());
            }
        // $newCharacter->setImagePath('/uploads/' . $newFileName);
        return '/uploads/' . $newFileName;
        // $newImage = '/uploads/' . $newFileName;
    }
    // public function getTargetDirectory(): string
    // {
    //     return $this->targetDirectory;
    // }
}