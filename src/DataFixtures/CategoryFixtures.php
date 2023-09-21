<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = ['Все потоки', 'Разработка', 'Администрирование', 'Дизайн', 'Менеджмент', 'Маркетинг', 'Научпоп'];

        foreach ($categories as $categoryName) {
            $category = new Category();
            $category->setName($categoryName);

            $manager->persist($category);
        }

        $manager->flush();
    }
}
