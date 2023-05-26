<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class CustomAdminController extends AbstractCrudController
{

    private $entityManager;
    private $requestStack;

    public function __construct(EntityManagerInterface $entityManager, RequestStack $requestStack)
    {
        $this->entityManager = $entityManager;
        $this->requestStack = $requestStack;
    }
    
    
      //@Route("/admin/excel", name="admin_excel")
     

     #[Route('/admin/excel', name: 'admin_excel')]

    public static function getEntityFqcn(): string
    {
        return User::class; // Replace YourEntity with the actual entity class
    }


    public function exportToExcel()
    {

        

  // cette solution permet exporter tous les utilisateurs dans la base de donnees vers un fichier excel

        $userRepository = $this->entityManager->getRepository(User::class);
        $users = $userRepository->findAll();

        // Crea el array de datos para exportar
        $data = [];
        $data[] = ['ID', 'Nom', 'Prenom','EmailRegistre', 'IdYpareo', 'addresse', 'CP', 'Date Naissance', 'DernierDiplome','EmailForm', 'Role' ];

        foreach ($users as $user) {
            $data[] = [
                $user->getId(),
                $user->getNomApprenant(),
                $user->getPrenomApprenant(),
                $user->getEmail(),
                $user->getToken(),
                $user->getAdresse1Appr(),
                $user->getCpAppr(),
                $user->getDateNaissance(),
                $user->getDernierDiplome(),
                $user->getEmailAppr(),
                $user->getRoles()[0],
     
                //$user->getCreatedAt()->format('Y-m-d H:i:s'),
            ];
        }




        // Crea una instancia de la hoja de cálculo y establece los datos
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray($data);

        // Crea el escritor de Excel y guarda el archivo en una ubicación temporal
        $writer = new Xlsx($spreadsheet);
        $path = tempnam(sys_get_temp_dir(), 'export_') . '.xlsx';
        $writer->save($path);

        // Descarga el archivo Excel generado
        $filename = 'export.xlsx';
        return new BinaryFileResponse($path, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => ResponseHeaderBag::DISPOSITION_ATTACHMENT . '; filename="' . $filename . '"',
        ]);
    }
}



