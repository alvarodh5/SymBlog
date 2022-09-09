<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixture extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $categoryList = [
            'Artificial Intelligence',
            'Databases',
            'Netcentric Computing',
        ];

        foreach ($categoryList as $value) {
            $category = new Category();
            $category->setName($value);

            $manager->persist($category);
        }
        $manager->flush();
    }
}