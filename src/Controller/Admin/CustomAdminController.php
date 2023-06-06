<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Formations;
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

    public function __construct(
        private EntityManagerInterface $entityManager, 
        private RequestStack $requestStack
    ) {    }
    
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
        $data[] = ['Id',
        'Token',
        'Verified',
        'Email',
        'Roles',
        'Civilite(1=mr,0=mme)',
        'Nom',
        'Prenom',
        'NomJf',
        'DateNaissance',
        'LieuNaissance',
        'DepartementNaissance',
        'PaysNaissance',
        'IdNationalite',
        'Adresse1',
        'Adresse2',
        'Cp',
        'Ville',
        'IdPays',
        'EmailForm',
        'Tel1',
        'Tel2',
        'IdFormationSouhait1',
        'NiveauQualification',
        'Experience(1=oui,0=non)',
        'DernierMetier',
        'DureeExperience',
        'EntrepriseExperience',
        'NiveauRemuneration',
        'Salarie',
        'Statut',
        'StatutSalarie',
        'StatutCommentaire',
        'EntrepriseSalarie',
        'AdresseEntreprise',
        'VilleEntreprise',
        'CpEntreprise',
        'NomTuteur',
        'PrenomTuteur',
        'AdresseMaillTuteur',
        'TelephoneTuteur',
        'DernierDiplome',
        'DateObtention' ];

        foreach ($users as $user) {
            $data[] = [
                $user->getId(),
                $user->getToken(),
                $user->isVerified(),
                $user->getEmail(),
                $user->getRoles()[0],

                $user->getCodeCiviliteApprenant(),
                $user->getNomApprenant(),
                $user->getPrenomApprenant(),
                $user->getNomJf(),
                $user->getDateNaissance(),
                $user->getLieuNaissance(),
                $user->getDepartementNaissance(),
                $user->getPaysNaissance(),
                $user->getIdNationalite(),


                $user->getAdresse1Appr(),
                $user->getAdresse2Appr(),
                $user->getCpAppr(),
                $user->getVilleAppr(),
                $user->getIdPays(),

                $user->getEmailAppr(),
                $user->getTel1Appr(),
                $user->getTel2Appr(),

                $user->getIdFormationSouhait1(),
                $user->getNiveauQualification(),

                $user->isDejaExperience(),
                $user->getDernierMetier(),
                $user->getDureeExperience(),
                $user->getEntrepriseExperience(),
                $user->getNiveauRemuneration(),

                $user->isSalarie(),
                $user->getStatut(),
                $user->getStatutSalarie(),
                $user->getStatutCommentaire(),

                $user->getEntrepriseSalarie(),
                $user->getAdresseEntreprise(),
                $user->getVilleEntreprise(),
                $user->getCpEntreprise(),
                $user->getNomTuteur(),
                $user->getPrenomTuteur(),
                $user->getAdresseMaillTuteur(),
                $user->getTelephoneTuteur(),
                    
                $user->getDernierDiplome(),
                $user->getDateObtention(),
     
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



