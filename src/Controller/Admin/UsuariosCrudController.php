<?php

namespace App\Controller\Admin;

use App\Entity\Usuarios;
use App\Field\UserRoleField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
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
            TextField::new('username','Nombre de usuario'),
            BooleanField::new('activo'),
            ChoiceField::new('true_roles','Roles')->setChoices(['Admin'=>'ROLE_ADMIN','Usuario'=>'ROLE_USER'])->allowMultipleChoices(),
            TextField::new('password','Nueva contraseña')->onlyOnForms()->setFormType(PasswordType::class)->setRequired(false),
        ];
    }
   
}
