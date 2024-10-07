<?php

namespace App\Vue;

use App\Utilitaire\Vue_Composant;

class Vue_AccueilMaTable extends Vue_Composant
{
    private string $msgErreur;
    private array $listeDonnee;
    public function __construct($listeDonnee, string $msgErreur ="")
    {
        $this->listeDonnee=$listeDonnee;
        $this->msgErreur=$msgErreur;
    }

    function donneTexte(): string
    {
        $str= "
<h1>Vous affichez ma table !</h1>
<div  style='    width: 50%;    display: block;    margin: auto;'> 
    <table> 
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>prenom</th>
            <th>motDePasse</th>

        </tr>
    ";
        if($this->listeDonnee==null)
        {
            $str.="
            <tr><td colspan='3'>table vide</td> </tr>
            ";
        }
        foreach ($this->listeDonnee as $item) {
            $str.="
            <tr><td><a href='./index.php?case=maTable&action=modifier&id=$item[id]'  > $item[id]</a></td><td>$item[nom]</td><td>$item[prenom]</td><td>$item[motDePasse]</td>
            <form><td>
                <input type='hidden' name='case' value ='maTable'>
                <input type='hidden' name='id' value ='$item[id]'>
                <button type='submit' name = 'action' value='supprimer'> Supprimer</button>
            </form>
</td> </tr>
            ";
     }
        $str.="</table>
<form method='post'>
    <input type='hidden' name='case' value ='maTable'>
    <button type='submit' name = 'action' value='ajouter'> Ajouter un enregistrement</button>
</div>
        $this->msgErreur
    ";
        return $str ;
    }
}