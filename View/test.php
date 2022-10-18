<?php 
class Carte

{
    public $face;
    public $couleur;
    public $numero;
    public $description;
    public $parametreCarte;


    function __construct($face, $couleur, $numero, $description,$parametreCarte)
    {
        $this->face =$face;
        $this->couleur = $couleur;
        $this->numero = $numero;
        $this->description = $description;
        $this->$parametreCarte = $parametreCarte;


    }




    


}

/*function trieListe($listeCarte)
{
    $nouvelleListe = array();
    srand((float)microtime()*1000000); // srand() initialise le générateur de nombres aléatoires avec seed, ou avec une valeur aléatoire si seed est 0. microtime() retourne le timestamp Unix, avec les microsecondes. Cette fonction est uniquement disponible sur les systèmes qui supportent la fonction gettimeofday(). 
    shuffle($listeCarte);// Mélange les éléments du tableau array.
     $nb=count($listeCarte); 
     for($i=0;$i<$nb;$i++)
     { 
     //les valeurs à afficher
     $valeur1=$listeCarte[$i]; 
     $nouvelleListe[$i] = $valeur1;
     }
     return $nouvelleListe;
    
}*/
function verifAssemblage($listeCarte,$numeroAssemblage)
    {   
        $contenue = false;
        $i=0;
        $longueurListe = intval(count($listeCarte));
        for($i; $i < $longueurListe; $i++)
        {
            if($listeCarte[$i]->numero == $numeroAssemblage)
            {
                return("l'assemblage existe");
                //$contenue= true;
            }
        }
        

        if($contenue == false)
        {
            return("l'assemblage n'est pas possible");
        }
    }
function assemblage($carte1, $carte2)
{
    if ($carte1->couleur == "bleu" && $carte2->couleur =="rouge"|| $carte1->couleur == "rouge" && $carte2->couleur =="bleu")
        {
            $numeroAssemblage = $carte1->numero +$carte2->numero;
            return ($numeroAssemblage);
        }

    else if($carte1->couleur =="gris" && $carte2->couleur =="rouge")
        {
            if(isset($carte2->parametreCarte["modificateur"]))
            {
                $numeroAssemblage= $carte1->numero +$carte2->parametreCarte["modificateur"];
            }

            else
            {
                echo("La combinaison de ces 2 cartes n'est pas possible");
            }
        }

    else if($carte1->couleur =="rouge" && $carte2->couleur =="gris")
        {
            if(isset($carte2->parametreCarte["modificateur"]))
            {
                $numeroAssemblage= $carte1->numero +$carte2->parametreCarte["modificateur"];
            }

            else
            {
                echo("La combinaison de ces 2 cartes n'est pas possible");
            }
        }

        else
        {
            echo("La combinaison de ces 2 cartes n'est pas possible");
        }
}

 function pioche($ListeMelange,$cartesEnMain)
{

    $i=count($cartesEnMain);
    $cartesEnMain[$i] = $ListeMelange[0];
    array_shift($ListeMelange);//array_shift() supprime le premier élément ou la première valeur d’un tableau.
    $resultat = array($cartesEnMain,$ListeMelange);
    return($resultat);

    

}


function defausse($cartesEnMain)
{
    
}
function recherche($numero)
{

}
$carte10 = new Carte("","",1,"",array("returnedCard"=>[11,21,42,35,69]));
$carte1 =new Carte("","gris",25,"",array("defausse"=>[16,46,69],"modificateur"=>6));
$carte2 = new Carte("","gris",48,"",array("defausse"=>[25,42],"penalite"=>""));
$carte3 = new Carte("","jaune",21,"","");
$carte4 = new Carte("","rouge",35,"","");
$carte5= new Carte("","vert",69,"","");
$carte6 = new Carte("","bleu",16,"","");
$carte7= new Carte("","bleu",11,"","");
$carte8 = new Carte("","gris",46,"",array("defausse"=>[11,35],"returnedCard"=>[16]));
$carte9 = new Carte ("","rouge",42,"","");
$listeCarte= array("Carte1"=>$carte1,"Carte2"=>$carte2,"Carte3"=>$carte3,"Carte4"=>$carte4,"Carte5"=>$carte5,"Carte6"=>$carte6,"Carte7"=>$carte7,"Carte8"=>$carte8,"Carte9"=>$carte9);
$listeCarte2= array($carte1,$carte2,$carte3,$carte4,$carte5,$carte6,$carte7,$carte8,$carte9);
//$ListeMelange = trieListe($listeCarte2);
$ListeMelange2 = $ListeMelange;
var_dump($ListeMelange2);?> <br> <?php
$cartesEnMain = array();
var_dump($cartesEnMain);?> <br> <?php
$listedeListe=pioche($ListeMelange2,$cartesEnMain);
$cartesEnMain= $listedeListe[0];
$ListeMelange2 = $listedeListe[1];
var_dump($ListeMelange2);?> <br> <?php
var_dump($cartesEnMain);?> <br> <?php
$listedeListe=pioche($ListeMelange2,$cartesEnMain);
$cartesEnMain= $listedeListe[0];
$ListeMelange2 = $listedeListe[1];
var_dump($ListeMelange2);?> <br> <?php
var_dump($cartesEnMain);?> <br> <?php




?>