<?php

namespace App\Controller\Admin;

use App\Entity\Libros;
use Doctrine\ORM\Mapping\OrderBy;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class LibrosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Libros::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nombre'),
            TextField::new('url_compra')->hideOnIndex(),
            TextField::new('isbn')->hideOnIndex(),
            TextField::new('ean')->hideOnIndex()->setRequired(false),
            NumberField::new('paginas','Páginas')->hideOnIndex(),
            // TextEditorField::new('descripcion_corta')->hideOnIndex(),
            // TextEditorField::new('descripcion')->hideOnIndex(),
            TextEditorField::new('descripcion_larga','Descripción'),
            DateField::new('fecha_publicacion','Fecha de publicación'),
            TextField::new('idioma'),
            BooleanField::new('destacado'),
            MoneyField::new('precio')->setCurrency('EUR'),
            BooleanField::new('activo'),
            // DateField::new('inicio_descuento','Inicio de descuento')->hideOnIndex()->setRequired(false),
            // DateField::new('fin_descuento','Fin de descuento')->hideOnIndex()->setRequired(false),
            // NumberField::new('descuento')->hideOnIndex()->setRequired(false),
            // BooleanField::new('top_ventas'),
            ImageField::new('url_portada','Portada')->setUploadDir('public\images\libros')->setUploadedFileNamePattern('[year][month][day]-[contenthash].[extension]')->setRequired(false)->hideOnIndex(),
            AssociationField::new('categorias','Categorías')/* ->onlyOnForms() */->setRequired(true),
            // CollectionField::new('categorias')->hideOnForm()->setFormType(AssociationField),
            AssociationField::new('editorial')->setRequired(true),
            AssociationField::new('autores')/* ->onlyOnForms() */->setRequired(true),
            // CollectionField::new('autores')->hideOnForm(),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        $vistaPrevia = Action::new('vistaPrevia', 'Vista previa')
            ->linkToUrl(function (Libros $entity) {
                return 'libros/'.$entity->getId();
            });

        return $actions
            ->add(Crud::PAGE_INDEX, $vistaPrevia)
        ;
    }

    public function renderInvoice(AdminContext $context)
    {
        $order = $context->getEntity()->getInstance();

        // add your logic here...
    }
   
}
