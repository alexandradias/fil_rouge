<?php


namespace App\Controller\Admin;



use App\Repository\AtelierRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Products;
use App\Form\ProductsType;
use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class HomeAdminController extends AbstractController
{
    /*JE METS EN PLACE LE CRUD*/

   /* //________________________________________________________________________________________________________________
    //ROUTE->HOME COTE ADMINISTRATEUR*/

    /*//je crée ma route qui sera visible depuis la vue administrateur*/
    /*//celles-ci sera accessible avec une interface login*/
    /**
     * @Route("/admin/", name="homeAdmin")
     *
     */

    //je déclare ma fonction homeAdmin

    public function homeAdmin ()
    {

        if ($this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
        {

            /*//Ce return -> render me permets d'acceder à l'index de mon site coté admin*/
            /*//le render renvoit au fichier homeAdmin.html.twig*/
            return $this->render('admin/homeAdmin.html.twig');

        }else {

            return $this->redirectToRoute('fos_user_security_login');
        }
    }





        /*//Ce return -> render me permets d'acceder à l'index de mon site coté admin*/
        /*//le render renvoit au fichier homeAdmin.html.twig*/
     /*   return $this->render('admin/homeAdmin.html.twig');
    }*/



/*______________________________________________________________________________________________________________________
______________________________________________________PRODUCTS__________________________________________________________
______________________________________________________________________________________________________________________*/


    /*//________________________________________________________________________________________________________________
   //ROUTE->LIST PDT PRODUIT COTE ADMINISTRATEUR*/

    /**
     * @Route("/admin/list_products/{action}", name="ListProducts")
     *
     * Je récupère la valeur de la wildcard {id} dans la variable action
     * Je récupère le ProductsRepository car j'ai besoin d'utiliser la méthode find
     * Je récupère l'entityManager car c'est lui qui me permet de gérer les entités (ajout, suppression, modif)
     */
    public function ListProducts(ProductsRepository $productsRepository, $action)
    {
        /* // je récupère le produit dans la BDD qui a l'id qui correspond à la wildcard
         // ps : c'est une entité qui est récupérée*/
        $products = $productsRepository->findAll();


        return $this->render('admin/listProductsAdmin.html.twig',
            [
                /*-> envoi de la view du form au fichier twig*/
                'products' => $products,
                'action' => $action,

            ]);

    }
    /*//je retourne une réponse*/
    /* return $this->render('admin/homeAdmin.html.twig',
         [
                 /* envoie de la view du form au fichier twig*/
    /*       'formProductView' => $formProductView
   ]);*/






    /*//________________________________________________________________________________________________________________
    //ROUTE->INSERT PRODUIT COTE ADMINISTRATEUR*/

    /*-> je crée ma route qui sera visible depuis la vue admin*/
    /*-> celle-ci me permettra d'insérer un nouveau produit*/
    /**
     * @Route("/admin/insert_product", name="InsertProduct")
     */

    /*->je déclare ma méthode formInsertProduct*/
    /*-> Je pourrais l'appeler depuis mon fichier 'twig' grâce à la fonction PATH qui est liée à ma route*/

                                       /* -> les paramètres de la méthode formInsertProduct
                                             sont : request et entityManager

                                          -> l'instance de la class request
                                             est stockée dans la variable $request

                                          -> request est une class $request
                                             contient l'instance (l'objet) de la class request*/
    public function formInsertProduct( Request $request, EntityManagerInterface $entityManager )
    {
        /*dump ('hello');die;*/

        /*-> Je déclare ma variable $product qui contient l'instance de la class products
          -> le new me permet de créer un nouvel objet*/
        $product = new Products();
        /*-> je crée une variable $form qui contient le formulaire qui va me permettre de créer un produit
        via la classe 'createform'
        -> la classe createform contient 2 paramètres=>
        1 ->le nom du 'type' qui contient le schéma du formulaire (builder)
        2 -> contient l'objet qui vient d'être créé donc instancié*/
        $form = $this->createForm(ProductsType::class, $product);

        /*-> je crée une vue*/
        /*-> je crée la vue de mon formulaire que je renvoie plus bas via render*/
        $formProductView = $form->createView();

        /*-> si la méthode de la requête est POST cela veut dire qu'un formulaire a été soumis
        donc la condition est validée (post=valid) => mon formulaire est envoyé mais pas encore récupéré*/
        if ($request->isMethod('POST'))
        {
            /*-> je récupere les données envoyées*/
            /*-> la méthode handleResquest  intercepte la requete  envoyé au serveur*/
            /* -> la méthode handleResquest récupère les infos de la requête*/
            $form->handleRequest($request);

            //pour ajouter une image
            /** @var UploadedFile $imageFile */
            $imageFile = $form['image']->getData();
            $imageFile2 = $form['PhotoPdt']->getData();

            // Condition nécessaire car le champ 'image' n'est pas requis
            // donc le fichier doit être traité que s'il est téléchargé
            if ($imageFile || $imageFile2)
            {
                if($imageFile)
                {
                    /*Je récupère son nom d'origine avec $originalFilename
                     * pathinfo est une fonction qui prend en paramètre le nom d'origine de l'image et son chemin*/
                    $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                    // Nécessaire pour inclure le nom du fichier en tant qu'URL + sécurité + nom unique
                    $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9] remove; Lower()', $originalFilename);
                    /*$newFilename-> est le nom final*/
                    $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                    try{
                        /*il essaye de déplacer le fichier image dans le dossier indiqué
                        par la méthode getParameter qui a en parmètre le nom ->'article_images'*/
                        $imageFile->move(
                            $this->getParameter('article_images'),
                            $newFilename
                        );
                        /* dans le cas d'un disfonctionnement le catch de capturer l'exception*/
                    } catch (FileException $e) {

                    }
                    /*met à jour la propriété image de l'instance de la classe Products */
                    $product->setImage($newFilename);
                }

                if($imageFile2)
                {
                    /*crée le nom de mon autre champ image*/
                    $originalFilename2 = pathinfo($imageFile2->getClientOriginalName(), PATHINFO_FILENAME);
                    // Nécessaire pour inclure le nom du fichier en tant qu'URL + sécurité + nom unique
                    $safeFilename2 = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9] remove; Lower()', $originalFilename2);
                    $newFilename2 = $safeFilename2 . '-' . uniqid() . '.' . $imageFile2->guessExtension();

                    // Déplace le fichier dans le dossier des images d'articles
                    try {
                        $imageFile2->move(
                            $this->getParameter('article_images'),
                            $newFilename2
                        );
                    } catch (FileException $e) {
                        // ... handle exception if something happens during file upload
                    }
                    $product->setPhotoPdt($newFilename2);
                }

            }

            /*-> PERSIST => On enregistre l'entité créée*/
            /*-> FLUSH => envoie les modifications à la BDD, avant cette action de flush rien n'est rempli dans la base*/
            $entityManager->persist($product);
            $entityManager->flush();
        }

        /*-> je retourne une réponse*/
        return $this->render('admin/insertProduct.html.twig',
            [
                /*-> envoi de la view du form au fichier twig*/
                'formProductView' => $formProductView
            ]);

    }


    /*//________________________________________________________________________________________________________________
   //ROUTE->UPDATE PRODUIT COTE ADMINISTRATEUR*/


    /**
     * @Route ("/admin/update_product/{id}", name = "UpdateProduct")
     */

    public function formUpdateProduct(Request $request, EntityManagerInterface $entityManager, $id, ProductsRepository $productsRepository )
    {

        /*-> Je déclare ma variable $product qui contient l'instance de la class products
          -> le new me permet de créer un nouvel objet*/
        $update = $productsRepository->find($id);
        /*-> je crée une variable $form qui contient le formulaire qui va me permettre de créer un produit
        via la classe 'createform'
        -> la classe createform contient 2 paramètres=>
        1 ->le nom du 'type' qui contient le schéma du formulaire (builder)
        2 -> contient l'objet qui vient d'être créé donc instancié*/
        $form = $this->createForm(ProductsType::class, $update);

        /*-> je crée une vue*/
        /*-> je crée la vue de mon formulaire que je renvoie plus bas via render*/
        $formProductView = $form->createView();

        /*-> si la méthode de la requête est POST cela veut dire qu'un formulaire a été soumis
        donc la condition est validée (post=valid) => mon formulaire est envoyé mais pas encore récupéré*/
        if ($request->isMethod('POST'))
        {
            /*-> je récupere les données envoyées*/
            /*-> la méthode handleResquest  intercepte la requete  envoyé au serveur*/
            /* -> la méthode handleResquest récupère les infos de la requête*/
            $form->handleRequest($request);

            /*-> PERSIST => On enregistre l'entité créée*/
            /*-> FLUSH => envoie les modifications à la BDD, avant cette action de flush rien n'est rempli dans la base*/
            $entityManager->persist($update);
            $entityManager->flush();
        }

        /*-> je retourne une réponse*/
        return $this->render('admin/updateProduct.html.twig',
            [
                /*-> envoi de la view du form au fichier twig*/
                'formProductView' => $formProductView
            ]);

    }

    /*//________________________________________________________________________________________________________________
   //ROUTE->UPDATE PRODUIT COTE ADMINISTRATEUR*/


    /*
     * @Route ("/admin/update_product/{id}", name = "UpdateProduct")
     */

    /*public function formUpdateProduct( Request $request, EntityManagerInterface $entityManager, $id, ProductsRepository $productsRepository)
    {*/
        /*$product contient toutes les infos du produit et non pas seulement l'id*/
        /*$product = $productsRepository->find($id);*/

        /*je retourne une réponse*/
       /* return $this->render('admin/updateProduct.html.twig',
            [*/
                /*envoie de la view du form au fichier twig*/
              /*  'product' => $product
            ]);
    }*/



    /*//________________________________________________________________________________________________________________
   //ROUTE->DELETE PRODUIT COTE ADMINISTRATEUR*/

    /**
     * @Route("/admin/delete_product/{id}", name="DeleteProduct")
     *
     * Je récupère la valeur de la wildcard {id} dans la variable id
     * Je récupère le ProductsRepository car j'ai besoin d'utiliser la méthode find
     * Je récupère l'entityManager car c'est lui qui me permet de gérer les entités (ajout, suppression, modif)
     */
    public function formDeleteProduct($id, ProductsRepository $productsRepository, EntityManagerInterface $entityManager)
    {

       /* // je récupère le produit dans la BDD qui a l'id qui correspond à la wildcard
        // ps : c'est une entité qui est récupérée*/
        $product = $productsRepository->find($id);
        /*// j'utilise la méthode remove() de l'entityManager en spécifiant le produit à supprimer*/
        $entityManager->remove($product);
        $entityManager->flush();

        /*$this->addFlash('success', 'Votre produit a bien été supprimer');*/


       return $this -> redirectToRoute('ListProducts',[
        'action' => 'delete'
    ]);

    }
        /*//je retourne une réponse*/
   /* return $this->render('admin/homeAdmin.html.twig',
        [
                /* envoie de la view du form au fichier twig*/
         /*       'formProductView' => $formProductView
        ]);*/



/*______________________________________________________________________________________________________________________
______________________________________________________ATELIERS__________________________________________________________
______________________________________________________________________________________________________________________*/


}