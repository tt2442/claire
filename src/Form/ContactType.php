<?php
namespace App\Form;use App\Entity\Contact ;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Reseausocial;
class ContactType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $AtypeOption)
{
$builder->add('reseau', EntityType::class,[
                'class' => Reseausocial::class,
                'multiple' => true,'attr'=>[]])

->add('mail', null,['attr'=>[]])

->add('tel', null,['attr'=>[]])

;}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults([
    'data_class' => Contact::class,
]);
}
}