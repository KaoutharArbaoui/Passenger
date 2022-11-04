                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Recherche des mots clés connexes                                                                             
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=552
    Auteur           : mercier133                                                                                         
    Date édition     : 05 Jan 2010                                                                                        
    Date mise à jour : 07 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - refactoring du code en PHP 7                                                                                        
    - correction du code                                                                                                  
    - modification de la description                                                                                      
*/
/*---------------------------------------------------------------*/ 
 
set_time_limit(0);
//Methode qui cherche et affiche les résultats !
function search($q,$niveau_max=2,$nb_result=20){
        $url = "http://www.google.fr/search?q=".urlencode($q).
"&start=$nb_result";
        $lesmots = array();
        $niveau = 0;
        if($nb_result>0) analyse_page($url);

        arsort ($lesmots);
        $x= 0;
        foreach($lesmots as $m=>$n){
            $x++;
            echo $m .", ";
        }
 
}
function parse_result($result){
    $result = strtolower($result);
    $result = preg_replace("#<([script|style])[^>]>[^<]</([script|style])>#","",
$result);//on supprime les balise de style
    return $result;
}
 
function analyse_page($url){
    global $niveau,$niveau_max;
 
     
    $result = parse_result(file_get_contents($url));
    //echo $result;
    trouve_mots($result);
    $niveau++;
    if($niveau<$niveau_max){    
        trouve_url($result);
    }
}
 
function filtre_mots($mot){
    global $lesmots;
    if(preg_match("# #",trim($mot))){
        $mots = explode(" ",$mot);
        foreach($mots as $mot) filtre_mots($mot);
    }
    else {
        if(preg_match(
"#(\.|/|\'|»|,|;|\(|\)|!|\{|\}|\||\?|\+|www|plus|plan du" .
" site|annuaire|forum|blog|euros |accueil|publicit|cached|reference library|he" 
.
"lp|most-recent questions|pages similaires|index|liens|contact|fermer|imprimer" 
.
"|home|voir tous|lire la suite|http|ftp|avec|tous|notre|tout|site|vous|votre|p" 
.
"our|more|shipping| sont |details|détails| dans )#"," ".$mot." ") || !
preg_match(
"#([a-z])#",$mot)||strlen($mot)<4)    return false;
// on ignore certain mots pas pertinents !
        else {
            if(isset($lesmots[trim(strtolower($mot))])) $lesmots[trim(strtolower

($mot))]++;
            else $lesmots[trim(strtolower($mot))] = 1;
        }
    }
}
function trouve_mots($texte){
    global $lesmots;
    $texte = trim($texte);
    $texte = explode("</head>",$texte);
    $texte = strip_tags($texte[1]);
    $texte = str_replace("([[:space:]|[:blank:]|\n|\r| |    | ]++)"," ",$texte

);
    $texte = preg_split ("/\s+/",$texte); 
    array_walk($texte,"filtre_mots");
 
    print_r($lesmots);
}
?>

