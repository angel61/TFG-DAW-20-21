<?php

namespace App\Controller\Admin;

use App\Entity\Usuarios;
use App\Field\UserRoleField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UsuariosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Usuarios::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('username'),
            BooleanField::new('activo'),
            ArrayField::new('roles'),
            TextField::new('password')->hideOnIndex()->setFormType(PasswordType::class),
        ];
    }
   
}
