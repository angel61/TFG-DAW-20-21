<?php

namespace App\Controller\Admin;

use App\Entity\Noticias;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NoticiasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Noticias::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
