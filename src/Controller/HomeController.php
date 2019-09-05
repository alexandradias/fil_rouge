<?php


namespace App\Controller;



use App\Form\UserType;
use App\Repository\AtelierRepository;
use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{


    //_____________________________________________________________________________________________________________________
    //ROUTE->HOME

    //je crée ma route qui me permettra d'accéder
    // à la première vue de mon site 'home' = 'index'
    /**
     * @Route("/", name="home")
     */

    //je déclare ma fonction home

    public function home ()
    {
        //Ce return -> render
        // me permet d'accéder à l'index de mon site
        //le render renvoie au fichier home.html.twig
       return $this->render('user/home.html.twig');

    }


    //_____________________________________________________________________________________________________________________
    //ROUTE->liste produits

    //je crée ma route qui me permettra d'accéder à la vue des produits en fonction de la catégorie sélectionnée
    /**
     * @Route("/products/{categorie}", name="products")
     */

    //je déclare ma fonction products

  public function products($categorie, ProductsRepository $productsRepository)
    {
        $products = $productsRepository->findAll($categorie);

        //Ce return -> render me permets d'acceder à la page de mes produits
        //le render renvoit au fichier list_products.html.twig
        return $this->render('user/list_products.html.twig',
            [
                'products' => $products,
                'categorie' => $categorie
            ]);


    }


    //_____________________________________________________________________________________________________________________
    //ROUTE->liste produits par categories

    //je crée ma route qui me permettra d'accéder à la vue des produits en fonction de la catégorie sélectionnée
    /**
     * @Route("/products_by_categorie", name="productsByCategorie")
     */

    //je déclare ma fonction getProductsByCategorie*/

   public function getProductsByCategorie(Request $request, ProductsRepository $productsRepository)
    {
        $categorie = $request->query->get('categorie');
        $products = $productsRepository->getProductsByCategorie($categorie);

        return $this->render('user/list_products.html.twig',
            [
                'products' => $products,
                'categorie' => $categorie
            ]);
    }


    //_____________________________________________________________________________________________________________________
    //ROUTE->liste produits par categories

    //je crée ma route qui me permettra d'accéder à la vue des produits en fonction de la catégorie sélectionnée
    /**
     * @Route("/ateliers_by_categorie", name="ateliersByCategorie")
     */

    //je déclare ma fonction getProductsByCategorie*/

    public function getAteliersByCategorie(Request $request, AtelierRepository $atelierRepository)
    {
        $ateliers = $atelierRepository->getAteliersByCategorie();
        /*DD($ateliers);*/
        return $this->render('user/ateliers.html.twig',
            [
                'ateliers' => $ateliers,
            ]);
    }

    //_____________________________________________________________________________________________________________________
    //ROUTE->Produit (détails)

    //je crée ma route qui me permettra d'accéder à la vue du produit sélectionné
    /**
     * @Route("/product/{id}", name="product")
     */

    //je déclare ma fonction product

    public function product($id, ProductsRepository $productsRepository)
    {
        $product = $productsRepository->find($id);

        //Ce return -> render me permets d'acceder à la page de mes produits
        //le render renvoit au fichier list_products.html.twig
        return $this->render('user/product.html.twig',
            [
                'product' => $product
            ]);

    }


    //_____________________________________________________________________________________________________________________
    //ROUTE->Produit (valid)

    //je crée ma route qui me permettra d'accéder à la vue du produit sélectionné + valid afin de poursuivre la commande
    /**
     * @Route("/product_valid/{id}", name="productValid")
     */

    //je déclare ma fonction product valid

    public function productValid($id, ProductsRepository $productsRepository)
    {
        $product = $productsRepository->find($id);

        //Ce return -> render me permets d'acceder à la page de mes produits
        //le render renvoit au fichier list_products.html.twig
        return $this->render('user/product_valid.html.twig',
            [
                'product' => $product
            ]);

    }


    //_____________________________________________________________________________________________________________________
    //ROUTE->Produit (valid commande)

    //je crée ma route qui me permettra d'accéder à la vue du produit sélectionné + valid afin de poursuivre la commande
    /**
     * @Route("/product_valid_commande/{id}", name="productValidCommande")
     */

    //je déclare ma fonction product valid commande

    public function productValidCommande($id, ProductsRepository $productsRepository)
    {
        $product = $productsRepository->find($id);

        //Ce return -> render me permets d'acceder à la page de mes produits
        //le render renvoit au fichier list_products.html.twig
        return $this->render('user/product_valid_commande.html.twig',
            [
                'product' => $product
            ]);

    }
    //_____________________________________________________________________________________________________________________
    //ROUTE->ATELIERS

    //je crée ma route qui me permettra d'accéder à la première vue de mon site 'home' = 'index'
    /**
     * @Route("/ateliers/{id}", name="ateliers")
     */

    //je déclare ma fonction home

    public function ateliers ($id,AtelierRepository $atelierRepository)
    {
        $atelier = $atelierRepository->find($id);
        //Ce return -> render me permets d'acceder à l'index de mon site
        //le render renvoit au fichier ateliers.html.twig
        return $this->render('user/ateliers.html.twig',
            [
                'atelier' => $atelier
            ]);

    }

    /*//_____________________________________________________________________________________________________________________
       //ROUTE->INSERT UN UTILISATEUR COTE USER*/

    /*-> je crée ma route qui sera visible depuis la vue USER*/
    /*-> celle-ci me permettra d'insérer un nouveau produit*/
    /**
     * @Route("/insert_user", name="InsertUser")
     */

    /*->je déclare ma méthode formInsertUser*/
    /*-> Je pourrai l'appeler depuis mon fichier 'twig' grâce à la fonction PATH qui est liée à ma route*/

    /* -> les paramètres de la méthode formInsertProduct sont : request et entityManager
     -> l'instance de la classe request est stockée dans la variable $request
     -> request est une classe $request contient l'instance (l'objet) de la classe request*/
    public function formInsertUser( Request $request, EntityManager $entityManager )
    {

        /*-> Je déclare ma variable $user qui contient l'instance de la classe users
          -> le new me permet de créer un nouvel objet*/
        $user = new Users();
        /*-> je crée une variable $form qui contient le formulaire qui va me permettre de créer un utilisateur
        via la classe 'createform'
        -> la classe createform contient 2 paramètres=>
        1 ->le nom du 'type' qui contient le schéma du formulaire (builder)
        2 -> contient l'objet qui vient d'être créé donc instancié*/
         $form = $this->createForm(UserType::class, $user);

        /*-> je crée une vue*/
        /*-> je crée la vue de mon formulaire que je renvoie plus bas via render*/
        $formContactView = $form->createView();

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
            $entityManager->persist($user);
            $entityManager->flush();
        }

        /*-> je retourne une réponse*/
        return $this->render('user/contact.html.twig',
            [
                /*-> envoi de la view du form au fichier twig*/
                'formContactView' => $formContactView
            ]);

    }

//____________________________________________________ROUTE DU FOOTER_________________________________________________//

    //__________________________________________________________________________________________________________________
    //ROUTE->CGV

    //je crée ma route qui me permettra d'accéder à la page des CGV
    /**
     * @Route("/cgv", name="cgv")
     */

    //je déclare ma fonction cgv

    public function cgv ()
    {
        //Ce return -> render me permets d'acceder à ma page des CGV
        //le render renvoit au fichier cgv.html.twig
        return $this->render('user/cgv.html.twig');

    }


    //__________________________________________________________________________________________________________________
    //ROUTE->INSTAGRAM

    //je crée ma route qui me permettra d'accéder à la page des CGV
    /**
     * @Route("/instagram", name="instagram")
     */

    //je déclare ma fonction instagram

    public function instagram ()
    {
        //Ce return -> render me permets d'acceder à ma page des CGV
        //le render renvoit au fichier cgv.html.twig
        return $this->render('user/home.html.twig');

    }






}