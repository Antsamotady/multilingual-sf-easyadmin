<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $hasher,
        private EntityManagerInterface $em
    ) {
    }
    
    public function load(ObjectManager $manager): void
    {
        $usersData = [
            0 => [
                'email' => 'user@example.com',
                'role' => ['ROLE_USER'],
                'password' => 123654
            ]
        ];

        
        foreach ($usersData as $user) {
            $newUser = new User();
            $newUser->setEmail($user['email']);
            $newUser->setPassword($this->hasher->hashPassword($newUser, $user['password']));
            $newUser->setRoles($user['role']);
            $this->em->persist($newUser);
        }
        
        $manager->flush();
    }
}