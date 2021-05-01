<?php
namespace App\Form;use App\Entity\Client ;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Newsletter;
class ClientType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $AtypeOption)
{
$builder->add('newsletters', EntityType::class,[
                'class' => Newsletter::class,
                'multiple' => true,'attr'=>[]])

->add('mail', null,['attr'=>[]])

;}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults([
    'data_class' => Client::class,
]);
}
}