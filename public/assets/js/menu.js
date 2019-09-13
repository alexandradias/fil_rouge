/*____________________________________________________________________________________________________________________*/
/*Je crée une variable avec une condition pour faire apparaitre un second menu au scroll*/



$('.header2').hide();  // d'abord, je masque le deuxième menu de navigation, qui porte la class "header2"
var hauteur = 400; // 400px, c'est le nombre de pixels à partir duquel je déclenche le tout

$(document).ready(function()
{
    $(window).scroll(function ()

    {//Au scroll dans la fenetre je déclenche la fonction

        if ($(this).scrollTop() > hauteur)
        {
            //si je défile de plus de 400px (variable "hauteur") pixels du haut vers le bas ici 400px
            $('.header1').fadeOut(1000); // On masque le 1
            $('.header2').fadeIn(1000); // On affiche le 2

        } else
        {
            $('.header2').fadeOut(1000);
            $('.header1').fadeIn(1000);
        }
    });
});


/*____________________________________________________________________________________________________________________*/
/*Je crée une variable avec une condition pour faire apparaitre un second menu au scroll*/



$('.header4').hide();  // d'abord, je masque le deuxième menu de navigation, qui porte la class "header2"
var hauteur = 400; // 400px, c'est le nombre de pixels à partir duquel je déclenche le tout

$(document).ready(function()
{
    $(window).scroll(function ()

    {//Au scroll dans la fenetre je déclenche la fonction

        if ($(this).scrollTop() > hauteur)
        {
            //si je défile de plus de 400px (variable "hauteur") pixels du haut vers le bas ici 400px
            $('.header3').fadeOut(1000); // On masque le 1
            $('.header4').fadeIn(1000); // On affiche le 2

        } else
        {
            $('.header4').fadeOut(1000);
            $('.header3').fadeIn(1000);
        }
    });
});


/*____________________________________________________________________________________________________________________*/
/*Je crée une variable avec une condition pour faire apparaitre un second menu au scroll*/



$('.header6').hide();  // d'abord, je masque le deuxième menu de navigation, qui porte la class "header2"
var hauteur = 400; // 400px, c'est le nombre de pixels à partir duquel je déclenche le tout

$(document).ready(function()
{
    $(window).scroll(function ()

    {//Au scroll dans la fenetre je déclenche la fonction

        if ($(this).scrollTop() > hauteur)
        {
            //si je défile de plus de 400px (variable "hauteur") pixels du haut vers le bas ici 400px
            $('.header5').fadeOut(1000); // On masque le 1
            $('.header6').fadeIn(1000); // On affiche le 2

        } else
        {
            $('.header6').fadeOut(1000);
            $('.header5').fadeIn(1000);
        }
    });
});



/*____________________________________________________________________________________________________________________*/
/*Je crée une variable avec une condition pour faire apparaitre mon menu sidebar au scroll de la page*/

$('.sidebar').hide();  // d'abord, je masque la sidebar
var hauteur = 800; // 800px, c'est le nombre de pixels à partir duquel je décide de faire apparaitre la sidebar

$(document).ready(function()
{
    $(window).scroll(function ()
    {//Au scroll dans la fenetre je déclenche la fonction

        if ($(this).scrollTop() > hauteur)
        {
            //si je défile de plus de 800px (variable "hauteur") pixels du haut la sidebar apparait
            //je l'a fait apparaitre lentement

            $('.sidebar').fadeIn(1000); // la sidebar apparait

        } else
        {
            $('.sidebar').fadeOut(1000); // la sidebar disparait
        }
    });
});


/*_SIDEBAR PRODUCT____________________________________________________________________________________________________*/
/*Je crée une variable avec une condition pour faire apparaitre mon menu sidebar au niveau des pages product*/

$('.sidebar2').show();
var hauteur = 0;

$(document).ready(function()
    {
        $(window).show(function()
        {
            if($(this).show() > hauteur)
            {
                $('.sidebar2').fadeIn(1000);
            }else
            {
                $('.sidebar2').fadeOut(1000);
            }
        });
    });

/*____________________________________________________________________________________________________________________*/
/*Je crée une variable avec une condition pour faire apparaitre mon footer au scroll*/



$('.footer').hide();  // d'abord, je masque le footer, qui porte la class "footer"
var hauteur = 3000; // 400px, c'est le nombre de pixels à partir duquel je déclenche le footer, celui ci apparait en même temps que la sidebar

$(document).ready(function()
{
    $(window).scroll(function ()

    {//Au scroll dans la fenetre je déclenche la fonction

        if ($(this).scrollTop() > hauteur)
        {
            //si je défile de plus de 400px (variable "hauteur") pixels du haut vers le bas ici 400px

            $('.footer').fadeIn(1000); // On affiche le footer

        } else
        {
            $('.footer').fadeOut(1000); // On masque le footer

        }
    });
});


/*____________________________________________________________________________________________________________________*/
/*Je crée une variable avec une condition pour faire apparaitre une flèche pour me ramener en haut du site*/



$('.top').hide();  // d'abord, je masque l'icon arrow, qui porte la class "top"
var hauteur = 400; // 400px, c'est le nombre de pixels à partir duquel je déclenche l'apparition de la flèche

$(document).ready(function()
{
    $(window).scroll(function ()

    {//Au scroll dans la fenetre je déclenche la fonction

        if ($(this).scrollTop() > hauteur)
        {
            //si je défile de plus de 400px (variable "hauteur")nb de px du haut vers le bas

            $('.top').fadeIn(1000); // On affiche l'icon arrow

        } else
        {
            $('.top').fadeOut(1000); // On masque l'icon arrow

        }
    });
});

/*____________________________________________________________________________________________________________________*/
/*J'ajoute à ma arrow une animation au clic pour lui permettre d'atteindre le haut de ma page*/

$('.top').on();

$('.top').click(function()
{/*au clic une animation me permet d'atteindre le top de ma page lentement*/
    /*$(window).scrollTop(0);*/
    $('html, body').animate({scrollTop:0}, 'slow');
});



/*____________________________________________________________________________________________________________________*/
/*Je décline la fonction pour la partie ADMINISTRATEUR*/
/*Je crée une variable avec une condition pour faire apparaitre une flèche pour me ramener en haut du site*/



$('.top_admin').hide();  // d'abord, je masque l'icon arrow, qui porte la class "top"
var hauteur = 400; // 400px, c'est le nombre de pixels à partir duquel je déclenche l'apparition de la flèche

$(document).ready(function()
{
    $(window).scroll(function ()

    {//Au scroll dans la fenetre je déclenche la fonction

        if ($(this).scrollTop() > hauteur)
        {
            //si je défile de plus de 400px (variable "hauteur")nb de px du haut vers le bas

            $('.top_admin').fadeIn(1000); // On affiche l'icon arrow

        } else
        {
            $('.top_admin').fadeOut(1000); // On masque l'icon arrow

        }
    });
});

/*____________________________________________________________________________________________________________________*/
/*J'ajoute à ma arrow une animation au clic pour lui permettre d'atteindre le haut de ma page*/

$('.top_admin').on();

$('.top_admin').click(function()
{/*au clic une animation me permet d'atteindre le top de ma page lentement*/
    /*$(window).scrollTop(0);*/
    $('html, body').animate({scrollTop:0}, 'slow');
});





/*____________________________________________________________________________________________________________________*/
/*Je crée une variable avec une condition pour faire apparaitre un bloc white*/



$('.bloc_white').show();  // d'abord, je masque le deuxième menu de navigation, qui porte la class "header2"
var hauteur = 80; // 400px, c'est le nombre de pixels à partir duquel je déclenche le tout

$(document).ready(function()
{
    $(window).scroll(function ()

    {//Au scroll dans la fenetre je déclenche la fonction

        if ($(this).scrollTop() > hauteur)
        {
            //si je défile de plus de 400px (variable "hauteur") pixels du haut vers le bas ici 400px
            $('.bloc_white').fadeIn (1000); // On affiche le 2

        } else
        {
            $('.bloc_white').fadeOut (1000);
        }
    });
});




/*____________________________________________________________________________________________________________________*/
/*MODAL*/

$(document).ready(function(){

    $('.content_modal').delay(500).fadeOut(3000);

});












