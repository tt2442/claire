<?php
namespace App\Form;use App\Entity\Collegue ;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class CollegueType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $AtypeOption)
{
$builder
->add('titre', null,['attr'=>[]])

->add('description', null,['attr'=>[]])

->add('lien', null,['attr'=>[]])

->add('fichier', null,['attr'=>[]])

->add('image', null,['attr'=>[]])

;}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults([
    'data_class' => Collegue::class,
]);
}
}