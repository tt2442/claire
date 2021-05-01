<?php
namespace App\Form;use App\Entity\Newsletter ;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Client;
class NewsletterType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $AtypeOption)
{
$builder->add('destinataires', EntityType::class,[
                'class' => Client::class,
                'multiple' => true,'attr'=>[]])

->add('object', null,['attr'=>[]])

->add('description', null,['attr'=>[]])

->add('image', null,['attr'=>[]])

->add('lien', null,['attr'=>[]])

->add('dateprog', null,['attr'=>[]])

;}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults([
    'data_class' => Newsletter::class,
]);
}
}