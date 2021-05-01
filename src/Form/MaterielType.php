<?php
namespace App\Form;use App\Entity\Materiel ;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Evenement;

use App\Entity\Realisation;
class MaterielType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $AtypeOption)
{
$builder->add('evenements', EntityType::class,[
                'class' => Evenement::class,
                'multiple' => true,'attr'=>[]])
->add('realisations', EntityType::class,[
                'class' => Realisation::class,
                'multiple' => true,'attr'=>[]])

->add('nom', null,['attr'=>[]])

->add('description', null,['attr'=>[]])

->add('reference', null,['attr'=>[]])

->add('prix', null,['attr'=>[]])

->add('fichier', null,['attr'=>[]])

->add('lien', null,['attr'=>[]])

;}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults([
    'data_class' => Materiel::class,
]);
}
}