<?php

namespace App\DataFixtures;

use App\Entity\Chapters;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ChaptersFixtures extends Fixture implements DependentFixtureInterface
{
    public const CHAPTERS_REFERENCE_TAG = 'chapters-';
    public const CHAPTERS_COUNT = 150;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < self::CHAPTERS_COUNT; $i++) {
            $chapter = new Chapters();
            $chapter->setTitle($faker->sentence(3));  // Titre du chapitre
            $chapter->setSubtitle($faker->sentence(10));  // Sous-titre
            $chapter->setContent($faker->sentence(10));  // Contenu
            $chapter->setPosted($faker->boolean());  // posté

            // Associer aléatoirement un cours à un chapitre
            $courseReference = CoursesFixtures::COURSES_REFERENCE_TAG . rand(0, CoursesFixtures::COURSES_COUNT - 1);

            // DEBUG: Ajouter un dump pour vérifier la référence générée
            dump($courseReference);

            // Vérifier que la référence existe avant de la définir
            $chapter->setCourse($this->getReference($courseReference));

            $manager->persist($chapter);

            // Ajouter une référence pour chaque chapitre créé
            $this->addReference(self::CHAPTERS_REFERENCE_TAG . $i, $chapter);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CoursesFixtures::class,  // Dépendance à CoursesFixtures
        ];
    }
}
