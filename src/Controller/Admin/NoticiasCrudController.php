<?php

namespace App\Controller\Admin;

use App\Entity\Noticias;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NoticiasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Noticias::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titulo'),
            TextEditorField::new('descripcion'),
            TextEditorField::new('texto'),
            BooleanField::new('activa'),
            NumberField::new('importancia'),
            DateField::new('fecha','Fecha de publicación'),
            ImageField::new('url_imagen','Portada')->setUploadDir('public\images\noticias')->setUploadedFileNamePattern('[year][month][day]-[contenthash].[extension]')->setRequired(false)->hideOnIndex(),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        $vistaPrevia = Action::new('vistaPrevia', 'Vista previa')
            ->linkToUrl(function (Noticias $entity) {
                return 'noticias/'.$entity->getId();
            });

        return $actions
            ->add(Crud::PAGE_INDEX, $vistaPrevia)
        ;
    }
   
}
