<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\EasyAdmin\Field\TranslationsField;
use App\EasyAdmin\Filter\TranslatableTextFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        
        yield TranslationsField::new('translations')
            ->addTranslatableField(
                TextField::new('title')->setRequired(true)->setHelp('Help message for title')->setColumns(12)
            )
            ->addTranslatableField(
                SlugField::new('slug')->setTargetFieldName('title')->setRequired(true)->setHelp('Help message for slug')->setColumns(12)
            )
            ->addTranslatableField(
                TextEditorField::new('body')->setRequired(true)->setHelp('Help message for body')->setNumOfRows(6)->setColumns(12)
            )
        ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(TranslatableTextFilter::new('title'))
        ;
    }
}
