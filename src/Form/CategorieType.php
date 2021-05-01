<?php
namespace App\Form;use App\Entity\Categorie ;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Article;

use App\Entity\Realisation;
class CategorieType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $AtypeOption)
{
$builder->add('articles', EntityType::class,[
                'class' => Article::class,
                'multiple' => true,'attr'=>[]])
->add('realisations', EntityType::class,[
                'class' => Realisation::class,
                'multiple' => true,'attr'=>[]])

->add('titre', null,['attr'=>[]])

->add('couleur', null,['attr'=>[]])

;}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults([
    'data_class' => Categorie::class,
]);
}
}