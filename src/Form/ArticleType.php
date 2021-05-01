<?php
namespace App\Form;use App\Entity\Article ;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Categorie;
class ArticleType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $AtypeOption)
{
$builder->add('categorie', EntityType::class,[
                'class' => Categorie::class,
                'multiple' => true,'attr'=>[]])

->add('nom', null,['attr'=>[]])

->add('description', null,['attr'=>[]])

->add('image', null,['attr'=>[]])

->add('lien', null,['attr'=>[]])

->add('date', null,['attr'=>[]])

;}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults([
    'data_class' => Article::class,
]);
}
}