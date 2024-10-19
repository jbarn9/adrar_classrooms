<?php

namespace App\DataFixtures;

use App\Entity\Courses;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CoursesFixtures extends Fixture
{
    public const COURSES_REFERENCE_TAG = 'courses-';  // Tag pour la référence
    public const COURSES_COUNT = 20;  // Nombre de cours à créer

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $sentence = $faker->sentence(5);
        $sentenceLink = str_replace(' ', '_', $sentence);
        // Créer et persister COURSES_COUNT cours
        for ($i = 0; $i < self::COURSES_COUNT; $i++) {
            $course = new Courses();
            $course->setTitle($faker->word(3));
            $course->setPdf($sentenceLink . 'pdf');
            $course->setDuration($faker->numberBetween(0, 10000));
            $course->setCreatedAt($faker->dateTime());

            $manager->persist($course);

            // Ajouter une référence pour chaque cours
            $this->addReference(self::COURSES_REFERENCE_TAG . $i, $course);  // Ex : 'courses-0', 'courses-1', ..., 'courses-19'
        }

        $manager->flush();  // Persister toutes les entités dans la base de données
    }
}
