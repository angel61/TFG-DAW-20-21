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
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

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
            NumberField::new('paginas')->hideOnIndex(),
            // TextEditorField::new('descripcion_corta')->hideOnIndex(),
            // TextEditorField::new('descripcion')->hideOnIndex(),
            TextEditorField::new('descripcion_larga','Descripción'),
            DateField::new('fecha_publicacion'),
            TextField::new('idioma'),
            BooleanField::new('destacado'),
            MoneyField::new('precio')->setCurrency('EUR'),
            BooleanField::new('activo'),
            DateField::new('inicio_descuento')->hideOnIndex()->setRequired(false),
            DateField::new('fin_descuento')->hideOnIndex()->setRequired(false),
            NumberField::new('descuento')->hideOnIndex()->setRequired(false),
            BooleanField::new('top_ventas'),
            ImageField::new('url_portada','Portada')->setUploadDir('public\images\libros')->setUploadedFileNamePattern('[year][month][day]-[contenthash].[extension]')->setRequired(false)->hideOnIndex(),
            AssociationField::new('categorias'),
            AssociationField::new('editorial'),
            AssociationField::new('autores'),
        ];
    }
    
    public function configureActions(Actions $actions): Actions
    {
        // return $actions
        //     ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
        //         return $action->setIcon('fa fa-file-alt')->setLabel(false);
        //     });
    }

    public function renderInvoice(AdminContext $context)
    {
        $order = $context->getEntity()->getInstance();

        // add your logic here...
    }
   
}
