<?php
namespace App\Form;use App\Entity\Evenement ;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Materiel;
class EvenementType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $AtypeOption)
{
$builder->add('materiels', EntityType::class,[
                'class' => Materiel::class,
                'multiple' => true,'attr'=>[]])

->add('titre', null,['attr'=>[]])

->add('date', null,['attr'=>[]])

->add('description', null,['attr'=>[]])

->add('multimedia', null,['attr'=>[]])

->add('lien', null,['attr'=>[]])

->add('type', null,['attr'=>[]])

;}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults([
    'data_class' => Evenement::class,
]);
}
}