<?php 
    if (isset($_POST)){
        $nom = htmlspecialchars($_POST['nom']);
        $mail =  htmlspecialchars($_POST['mail']);
        $message_txt =  htmlspecialchars($_POST['message']);
        
        if (!empty($nom) && !empty($mail) && !empty($message_txt)){
            var_dump($_POST);
            $passage_ligne = "\r\n";
            $boundary = "-----=".md5(rand());
            $dest = "christopher.fourgeaud@gmail.com";
            $sujet = "[Formulaire de contact Loutrotter]";
            $header = "From: \"".$nom."\"<".$mail.">".$passage_ligne;
            $header .= "Reply-to: \"".$nom."\"<".$mail.">".$passage_ligne;
            $header .= "MIME-Version: 1.0".$passage_ligne;
            $header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

                        //=====Création du message.
            $message = $passage_ligne."--".$boundary.$passage_ligne;
            //=====Ajout du message au format texte.
            $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
            $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
            $message.= $passage_ligne.$message_txt.$passage_ligne;
            //==========
            $message.= $passage_ligne."--".$boundary.$passage_ligne;

            mail($dest,$sujet,$message,$header);
        }

    }
?>
<div class="container">
    <div class="row ">
        <div class="col-xs-6 col-xs-offset-3">
            <h1 class="titre page-header text-center">Contactez moi !</h1>
        </div>
        <br>
    </div>
    <div class="row">
        <form action="?p=contact" method="POST">
                
            <div class="col-xs-offset-2 col-xs-3">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input class="form-control" id="nom" name="nom" type="text">
                </div>
                <div class="form-group">
                    <label for="mail">E-mail</label>
                    <input class="form-control" id="mail" name="mail" type="text">
                </div>
            </div>
            <div class="col-xs-5">
                <label for="message">Message</label>
                <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
                
                <input class="btn valider pull-right" type="submit" value="Envoyer">
            </div>      
        </form>
    </div>        
    
</div>