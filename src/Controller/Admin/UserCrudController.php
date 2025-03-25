<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserCrudController extends AbstractCrudController
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ) {
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('email');
        yield ImageField::new('avatar')
            ->setBasePath('uploads/avatars')
            ->setUploadDir('public/uploads/avatars')
            ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]');
        yield TextField::new('password')->hideOnIndex();
    }

    
    /** 
     * @param EntityManagerInterface $entityManager 
     * @param \App\Entity\Utilisateurs $entityInstance 
     */
    public function persistEntity(EntityManagerInterface $entityManager, mixed $entityInstance): void
    {
        if ($entityInstance instanceof User) {
            if ($entityInstance->getPassword()) {
                $plainPassword = $entityInstance->getPassword();
                $hashedPassword = $this->passwordHasher->hashPassword($entityInstance, $plainPassword);
                $entityInstance->setPassword($hashedPassword);
            }
        }

        parent::persistEntity($entityManager, $entityInstance);
    }

    /** 
     * @param EntityManagerInterface $entityManager 
     * @param \App\Entity\Utilisateurs $entityInstance 
     */
    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $rep = $this->getContext()?->getRequest()->request->all('User')['password'];
    
        if ($rep !="") {
            $plainPassword = $rep;
            $hashedPassword = $this->passwordHasher->hashPassword($entityInstance, $plainPassword);
            $entityInstance->setPassword($hashedPassword);
        } elseif($rep === "") {
            $id = $entityInstance->getId();
            $actualpass=$entityManager->getRepository(User::class)->find($id)->getPassword();
            $entityInstance->setPassword($actualpass);
        }
        
        parent::updateEntity($entityManager, $entityInstance);
    }
    
}
