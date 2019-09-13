<?php

namespace App\Form;

use App\Entity\Products;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomPdt')
            ->add('DescriptionPdt')
            ->add('descriptionShortPdt')
            ->add('compositionPdt')
            ->add('PhotoPdt', FileType::class,[
                'label' => 'Votre photo produit',
                'mapped' => false,
                'required'=> false,
                'constraints' => [
                    new File([
                        'maxSize'=> '1024k',
                        'mimeTypes'=> [
                            'application/jpg', 'application/png',
                            'application/x-jpg', 'application/x-png',
                        ],
                        'mimeTypesMessage' => 'Merci d\'importer une image au format .jpg ou .png',
                    ])
                ]
            ])
            /*j'ajoute un champ image en plus de la photo produit dans le cas où le client aimerait 2 images différentes*/
            ->add('image', FileType::class,[
                'label' => 'Votre image',
                'mapped' => false,
                'required'=> false,
                'constraints' => [
                    new File([
                        'maxSize'=> '1024k',
                        'mimeTypes'=> [
                            'application/jpg', 'application/png',
                            'application/x-jpg', 'application/x-png',
                        ],
                        'mimeTypesMessage' => 'Merci d\'importer une image au format .jpg ou .png',
                    ])
                ]
            ])




            /*->add('image', FileType::class, [
                'label' => 'Image (jpg file, png file)',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the jpg/png file
                // everytime you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/jpg', 'application/png',
                            'application/x-jpg', 'application/x-png',
                        ],
                        'mimeTypesMessage' => 'Merci d\'importer une image au un format .jpg ou .png',
                    ])
                ],
            ])*/
            ->add('TarifsHtPdt')
            ->add('TvaPdt')
            ->add('TarifsTtcPdt')
            ->add('enregistrer', SubmitType::class)
                                        /*class dans ce cas est une méthode*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
