<?php
namespace App\Form;use App\Entity\Catalogue ;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class CatalogueType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $AtypeOption)
{
$builder
->add('nom', null,['attr'=>[]])

->add('datestart', null,['attr'=>[]])

->add('dateend', null,['attr'=>[]])

->add('image', null,['attr'=>[]])

->add('lien', null,['attr'=>[]])

->add('fichier', null,['attr'=>[]])

;}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults([
    'data_class' => Catalogue::class,
]);
}
}