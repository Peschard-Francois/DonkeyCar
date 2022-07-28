<?php
function calculNbDay($departPost,$arrivePost) : int
{
    // On transforme les 2 dates en timestamp
    $datedepartStr = strtotime($departPost);
    $datearrivetStr = strtotime($arrivePost);
    // On récupère la différence de timestamp entre les 2 précédents
    $nbJoursTimestamp = $datearrivetStr - $datedepartStr ;
    // ** Pour convertir le timestamp (exprimé en secondes) en jours **
    // On sait que 1 heure = 60 secondes * 60 minutes et que 1 jour = 24 heures donc :
    $nbJours = $nbJoursTimestamp/86400; // 86 400 = 60*60*24
    return $nbJours;
}
function calculOption(int $prixGet, int $nbjourGet) : int
{
    $total = ($prixGet * $nbjourGet);
    if ($option1Post ?? ""){
        $total += (50 * $nbjourGet);
    }
    if($option2Post?? ""){
        $total += (40 * $nbjourGet);
    }
    if($option3Post?? ""){
        $total += (5 * $nbjourGet);
    }
    if($option4Post?? ""){
        $total += (2 * $nbjourGet);
    }
    return $total;
}
function redirect(string $url) : void
{
    header("Location : $url ");
    exit();
}