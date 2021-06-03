<?php

namespace App\Controller\Admin;

use App\Entity\Editoriales;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EditorialesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Editoriales::class;
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
