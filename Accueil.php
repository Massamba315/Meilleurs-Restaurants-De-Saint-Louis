<?php
session_start();
ob_start();//Pour permettre a header de rediriger une page meme s'il y'a du code html au dessus
include_once("../Model/connexion.php");
include_once("../Model/creationTable.php");
require("../Model/restaurant.php");
  $Restos=recupererTousLesRestos();
?>
<!DOCTYPE html>
<?php if(isset($_COOKIE['lang'])&& !empty($_COOKIE['lank'])): ?>
<html lang=<?= $_COOKIE['lang'] ?>>
<?php else: ?>
<html lang="fr">
<?php endif; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Meilleurs Restaurants de Saint-Louis</title>
<body>
    <?php    
        include("Entete.php");
    ?>
  
    <hr>
    <div id="MessagesPourAnnoceResto">
        <h2> <span>V</span>oici <span>L</span>es <span>M</span>eilleurs <span>R</span>estaurants <span>D</span>e <span>L</span>a <span>R</span>egion</h2>
    </div>
    <?php foreach($Restos as $resto): ?>
        <?php  if($resto->prixMoyen<1000): ?>
    <div class="texteDesBlocs">
            <div class="messageBlocResto">Les Restaurants Dont La Moyenne des prix est comprise entre <span>1</span> et <span>1000</span> fcfa</div>
    </div>
    <?php break; endif; ?>
    <?php endforeach; ?>
    <br>
    <section class="restaurant">
    <?php $d=0;?>
<!----------------Boucle pour afficher tous les restaurants--------------------->
    <?php foreach($Restos as $resto): ?>
        <?php  if($resto->prixMoyen<1000): ?>
        <div class="tousLesRestos">
            <div class="enteteResto">
                <div class="NomResto">
                    <p><?= $resto->nomR ?></p>
                </div>
                <div class="barrePrix">
                <?= $resto->prixMoyen ?>Fcfa
                </div>
            </div>
            <div>
                <?php $photos=recupererLesPhotos($resto->idR); ?>
                <?php if(!empty($photos[0])): ?>
                <img  class="imgResto" src="<?= $photos[0]->nomPhoto ?>" alt="restaurant1">
                <?php endif; ?>
            </div>
            <div class="prix">
                <p>Prix Moyen: <?= $resto->prixMoyen ?> cfa</p>
            </div>
            <div class="LeBasDesPrix">
                <div>
                    <p><?= $resto->typeR ?></p>
                </div>
                <form method="GET">
                    <input type="hidden" name="voirplus" value="<?php echo "".$resto->nomR."" ?>">
                    <input class="VoirPLus" type="submit" value="voir plus">
                </form>
            </div>
           <div class="lesLikes">
                <form method="GET">
                <img class="dislike <?= $resto->idR+1 ?>" src="./Images/dislike5.png" alt="dislike">
                <img class="like <?= $resto->idR ?>" src="./Images/like3.png" alt="like">
                <input type="hidden" name="like" value="<?php echo "".$resto->nomR."" ?>">
                </form>
           </div>
        </div>
        <?php $d=1; endif; ?>
        <?php endforeach; ?>
    </section>
    <<?php if($d==1): ?>
    <div class="SuivantPrecedent">
        <p><button class="prec" ><img src="./Images/inf.png" alt="inf"></button></p>
        <p><button class="suiv" ><img src="./Images/sup.png" alt="inf"></button></p>
    </div> 
    <?php endif; ?>
    <!-------------------------------------------------------->
    <br><br>
    <?php foreach($Restos as $resto): ?>
        <?php  if($resto->prixMoyen>=1000&&$resto->prixMoyen<2000): ?>
    <div class="texteDesBlocs">
            <div class="messageBlocResto">Les Restaurants Dont La Moyenne des prix est comprise entre <span>1000</span> et <span>2000</span> fcfa</div>
    </div>
    <?php break; endif; ?>
    <?php endforeach; ?>
    <br>
    <section class="restaurant">
    <?php $c = 0; ?>
    <?php foreach($Restos as $resto): ?>
        <?php  if($resto->prixMoyen>=1000&&$resto->prixMoyen<2000): ?>
        <div class="tousLesRestos">
            <div class="enteteResto">
                <div class="NomResto">
                    <p><?= $resto->nomR ?></p>
                </div>
                <div class="barrePrix">
                <?= $resto->prixMoyen ?>Fcfa
                </div>
            </div>
            <div>
                <?php $photos=recupererLesPhotos($resto->idR); ?>
                <?php if(!empty($photos[0])): ?>
                <img  class="imgResto" src="<?= $photos[0]->nomPhoto ?>" alt="restaurant1">
                <?php endif; ?>
            </div>
            <div class="prix">
                <p>Prix Moyen: <?= $resto->prixMoyen ?> cfa</p>
            </div>
            <div class="LeBasDesPrix">
                <div>
                    <p><?= $resto->typeR ?></p>
                </div>
                <form method="GET">
                    <input type="hidden" name="voirplus" value="<?php echo "".$resto->nomR."" ?>">
                    <input class="VoirPLus" type="submit" value="voir plus">
                </form>
            </div>
            <div class="lesLikes">
                <img class="dislike" src="./Images/dislike5.png" alt="dislike">
                <img class="like" src="./Images/like3.png" alt="like">
           </div>
        </div>
        <?php $c = 1; endif; ?>
        <?php endforeach; ?>
    </section> 

    <<?php if($c==1): ?>
    <div class="SuivantPrecedent">
        <p><button class="prec" ><img src="./Images/inf.png" alt="inf"></button></p>
        <p><button class="suiv" ><img src="./Images/sup.png" alt="inf"></button></p>
    </div> 
    <?php endif; ?>
<!--------------------------------------------------------------------->
<br><br>
<?php foreach($Restos as $resto): ?>
        <?php  if($resto->prixMoyen>=2000&&$resto->prixMoyen<3000): ?>
    <div class="texteDesBlocs">
            <div class="messageBlocResto">Les Restaurants Dont La Moyenne des prix est comprise entre <span>2000</span> et <span>3000</span> fcfa</div>
    </div>
    <?php break; endif; ?>
    <?php endforeach; ?>
    <br>
    <section class="restaurant">
    <?php $b=0; ?>
    <?php foreach($Restos as $resto): ?>
        <?php  if($resto->prixMoyen>=2000&&$resto->prixMoyen<3000): ?>
        <div class="tousLesRestos">
            <div class="enteteResto">
                <div class="NomResto">
                    <p><?= $resto->nomR ?></p>
                </div>
                <div class="barrePrix">
                <?= $resto->prixMoyen ?>Fcfa
                </div>
            </div>
            <div>
                <?php $photos=recupererLesPhotos($resto->idR); ?>
                <?php if(!empty($photos[0])): ?>
                <img  class="imgResto" src="<?= $photos[0]->nomPhoto ?>" alt="restaurant1">
                <?php endif; ?>
            </div>
            <div class="prix">
                <p>Prix Moyen: <?= $resto->prixMoyen ?> cfa</p>
            </div>
            <div class="LeBasDesPrix">
                <div>
                    <p><?= $resto->typeR ?></p>
                </div>
                <form method="GET">
                    <input type="hidden" name="voirplus" value="<?php echo "".$resto->nomR."" ?>">
                    <input class="VoirPLus" type="submit" value="voir plus">
                </form>
            </div>
            <div class="lesLikes">
                <img class="dislike" src="./Images/dislike5.png" alt="dislike">
                <img class="like" src="./Images/like3.png" alt="like">
           </div>
        </div>
        <?php $b = 1; endif; ?>
        <?php endforeach; ?>
    </section> 

    <?php if($b==1): ?>
    <div class="SuivantPrecedent">
        <p><button class="prec" ><img src="./Images/inf.png" alt="inf"></button></p>
        <p><button class="suiv" ><img src="./Images/sup.png" alt="inf"></button></p>
    </div> 
    <?php endif; ?>
<!--------------------------------------------------------------------->
<br><br>
<?php foreach($Restos as $resto): ?>
        <?php  if($resto->prixMoyen>=3000): ?>
    <div class="texteDesBlocs">
            <div class="messageBlocResto">Les Restaurants Dont La Moyenne des  prix  est  superieur a <span>3000</span> fcfa</div>
    </div>
    <?php break; endif; ?>
    <?php endforeach; ?>
    <br>
    <section class="restaurant">
    <?php  $a=0; ?>
    <?php foreach($Restos as $resto): ?>
        <?php  if($resto->prixMoyen>=3000): ?>
        <div class="tousLesRestos">
            <div class="enteteResto">
                <div class="NomResto">
                    <p><?= $resto->nomR ?></p>
                </div>
                <div class="barrePrix">
                <?= $resto->prixMoyen ?>Fcfa
                </div>
            </div>
            <div>
                <?php $photos=recupererLesPhotos($resto->idR); ?>
                <?php if(!empty($photos[0])): ?>
                <img  class="imgResto" src="<?= $photos[0]->nomPhoto ?>" alt="restaurant1">
                <?php endif; ?>
            </div>
            <div class="prix">
                <p>Prix Moyen: <?= $resto->prixMoyen ?> cfa</p>
            </div>
            <div class="LeBasDesPrix">
                <div>
                    <p><?= $resto->typeR ?></p>
                </div>
                <form method="GET">
                    <input type="hidden" name="voirplus" value="<?php echo "".$resto->nomR."" ?>">
                    <input class="VoirPLus" type="submit" value="voir plus">
                </form>
            </div>
            <div class="lesLikes">
                <img class="dislike" src="./Images/dislike5.png" alt="dislike">
                <img class="like" src="./Images/like3.png" alt="like">
           </div>
        </div>
        <?php $a=1; endif; ?>
        <?php endforeach; ?>
    </section> 
    <?php if($a==1): ?>
    <div class="SuivantPrecedent">
        <p><button class="prec" ><img src="./Images/inf.png" alt="inf"></button></p>
        <p><button class="suiv" ><img src="./Images/sup.png" alt="inf"></button></p>
    </div> 
    <?php endif; ?>
<!-------------------------------------------------------------------->
    <br><br><hr><br><br>
     <section class="expert" id="expert">
        <!--<div class="titre">
            <h1 class="titre-text"><span>Nos Experts</span></h1>
            <p>meuné foune</p>

        </div> -->
        <div class="contenu">
            <div class="box">
                <div class="imbox">
                    <img class="imgResto" src="./Images/r19.gif" alt="restaurant19">
                </div>
                <div class="text">
                    <h3>Pape Modou</h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img class="imgResto" src="./Images/r17.jpg" alt="restaurant17">
                </div>
                <div class="text">
                    <h3>SST THIAM</h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img class="imgResto" src="./Images/r18.jpg" alt="restaurant18">
                </div>
                <div class="text">
                    <h3>Pape Modou</h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img class="imgResto" src="./Images/r20.png" alt="restaurant16">
                </div>
                <div class="text">
                    <h3>Pape Modou</h3>
                </div>
            </div>
        </div>
     </section>
            <?php
        include("PiedDePage.php");
        ?>
    <script src="Accueil.js"></script>
    
</body>
</html>
