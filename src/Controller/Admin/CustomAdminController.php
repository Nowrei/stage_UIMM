<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class CustomAdminController extends AbstractCrudController
{
    //#[Route('/admin/excel', name: 'admin_excel')]
    public static function getEntityFqcn(): string
    {
        return User::class; // Replace YourEntity with the actual entity class
    }
    public function exportAction()
    {
        // Your export logic here
        // Generate the Excel file

        $filename = 'export.xlsx';
        $path = 'c://data//export.xlsx';

        return new BinaryFileResponse($path, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => ResponseHeaderBag::DISPOSITION_ATTACHMENT . '; filename="' . $filename . '"',
        ]);
    }
}
