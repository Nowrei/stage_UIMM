<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\SiteFormation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $hasher
    ) {}

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('admin@admin.fr')
            ->setPassword($this->hasher->hashPassword($admin, '12345678'))
            ->setRoles(['ROLE_ADMIN'])
            ->setIsVerified(true);
        $manager->persist($admin);

        $sitesFormation = [
            "3008262" => "Pôle Formation 08 (Campus sup Ard.)",
            "3918430" => "Pôle Formation 08 (Charleville)",
            "2864611" => "Pôle Formation 08 (Donchery)",
            "3072" => "Pôle Formation 10 (Aube)",
            "53071" => "Pôle Formation 51 (Reims, Site 1 Bât.B)",
            "368998" => "Pôle Formation 52 (St Dizier)",
        ];

        foreach($sitesFormation as $k => $v) {
            $site = new SiteFormation();
            $site->setCodeSite($k)->setNom($v);
            $manager->persist($site);
        };

        $manager->flush();
    }
}
