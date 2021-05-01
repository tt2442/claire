<?php
namespace App\Form;use App\Entity\Realisation ;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Categorie;

use App\Entity\Materiel;
class RealisationType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $AtypeOption)
{
$builder->add('categorie', EntityType::class,[
                'class' => Categorie::class,
                'multiple' => true,'attr'=>[]])
->add('materiels', EntityType::class,[
                'class' => Materiel::class,
                'multiple' => true,'attr'=>[]])

->add('titre', null,['attr'=>[]])

->add('description', null,['attr'=>[]])

->add('multimedia', null,['attr'=>[]])

->add('etat', null,['attr'=>[]])

->add('lien', null,['attr'=>[]])

->add('date', null,['attr'=>[]])

;}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults([
    'data_class' => Realisation::class,
]);
}
}