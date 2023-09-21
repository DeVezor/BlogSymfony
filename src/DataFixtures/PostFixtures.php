<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Post;
use App\Entity\User;
use App\Entity\Category;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PostFixtures extends Fixture implements DependentFixtureInterface

{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $users = $manager->getRepository(User::class)->findAll();
        $categories = $manager->getRepository(Category::class)->findAll();

        for ($i = 1; $i <= 10; $i++) {
            $post = new Post();

            // Выбор случайного пользователя 
            $randomUser = $faker->randomElement($users);
            $post->setAuthor($randomUser);

            // Выбор случайной категории 
            $randomCategory = $faker->randomElement($categories);
            $post->setCategory($randomCategory);

            $post->setTitle($faker->sentence);
            $post->setContent($faker->paragraph);
            $post->setCreatedAt($faker->dateTimeBetween('-1 year', 'now'));

            $manager->persist($post);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class, CategoryFixtures::class];
    }
}
