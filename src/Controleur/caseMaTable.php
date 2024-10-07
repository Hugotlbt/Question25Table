<?php

$Vue->setMenu(new \App\Vue\Vue_Menu_MaTable());
switch ($action) {
    case "defaut":
        $data = \App\Modele\Modele_MaTable::MaTable_Select();
        $Vue->addToCorps(new \App\Vue\Vue_AccueilMaTable($data));
        break;
    case "ajouter":
        $Vue->addToCorps(new \App\Vue\Vue_AjouterMaTable());
        break;
    case "enregistrerAjouter":
        $data = \App\Modele\Modele_MaTable::MaTable_Insert($_REQUEST["nom"], $_REQUEST["prenom"], $_REQUEST["motDePasse"]);

        $data = \App\Modele\Modele_MaTable::MaTable_Select();
        $Vue->addToCorps(new \App\Vue\Vue_AccueilMaTable($data));
        break;
    case "supprimer":
        $data = \App\Modele\Modele_MaTable::MaTable_Delete($_REQUEST["id"]);
        $data = \App\Modele\Modele_MaTable::MaTable_Select();
        $Vue->addToCorps(new \App\Vue\Vue_AccueilMaTable($data));
        break;
    case "modifier":
        $data = \App\Modele\Modele_MaTable::MaTable_SelectById($_REQUEST["id"]);
        $Vue->addToCorps(new \App\Vue\Vue_ModifierMaTable($data));
        break;
    case "enregistrerModifier":
        \App\Modele\Modele_MaTable::MaTable_Update($_REQUEST["id"], $_REQUEST["nom"], $_REQUEST["prenom"], $_REQUEST["motDePasse"]);
        $data = \App\Modele\Modele_MaTable::MaTable_Select();
        $Vue->addToCorps(new \App\Vue\Vue_AccueilMaTable($data));

        break;

}