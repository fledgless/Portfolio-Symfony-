<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title');
        yield ChoiceField::new('status')
            ->setChoices([
                'En cours' => 'En cours',
                'Terminé' => 'Terminé',
                'Archivé' => 'Archivé',
                'En ligne' => "En ligne",
        ]);
        yield BooleanField::new('personalProject')->onlyWhenCreating();
        yield TextField::new('client');
        yield TextEditorField::new('summary');
        yield UrlField::new('link');
        yield UrlField::new('githubLink');
        yield AssociationField::new('image');
        yield AssociationField::new('tags');
        
    }
}
