<?php
namespace App\Form;use App\Entity\Reseausocial ;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Contact;
class ReseausocialType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $AtypeOption)
{
$builder->add('contact', EntityType::class,[
                'class' => Contact::class,
                'attr'=>[]])

->add('nom', null,['attr'=>[]])

->add('lien', null,['attr'=>[]])

->add('pseudo', null,['attr'=>[]])

;}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults([
    'data_class' => Reseausocial::class,
]);
}
}