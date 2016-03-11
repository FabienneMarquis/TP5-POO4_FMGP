<?php if ( ! defined('BASEPATH')) exit('no direct script access allowed');
/**
 * Created by PhpStorm.
 * User: 1494778
 * Date: 2016-03-11
 * Time: 09:56
 */?>
<html>
<!--<link rel="stylesheet" type="text/css" href="--><?php //echo base_url(); ?><!--css/style.css">-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">

    // Ajax post
    $(document).ready(function () {
        $(".submit").click(function (event) {
            event.preventDefault();
            var courriel = $("input#email").val();
            var password = $("input#pwd").val();
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "index.php/Controller/submit",
                dataType: 'json',
                data: {email: courriel, pwd: password}
            })
        });
    });
</script>


<h4>Vos coordonnées</h4>

    <body>
    <div class="main">
        <div id="content">
            <h2 id="form_head">Connexion à la base de données</h2><br/>
            <hr>
            <div id="form_input">
                <?php

                // Ouvrrir le formulaire Form
                echo form_open();

                echo form_label('nom');//afficher le label Votre nom
                // Champ Nom
                $data_name = array(
                    'name' => 'name',
                    'class' => 'input_box',
                    'id' => 'nom'
                );
                echo form_input($data_name);//afficher le champ Nom
                echo "<br>";

                echo form_label('Prenom');//afficher le label Votre nom
                // Champ Nom
                $data_name = array(
                    'prenom' => 'prenom',
                    'class' => 'input_box',
                    'id' => 'prenom'
                );
                echo form_input($data_name);//afficher le champ Nom
                echo "<br>";

                echo form_label('Age');//afficher le label Votre nom
                // Champ Nom
                $data_name = array(
                    'age' => 'age',
                    'class' => 'input_box',
                    'id' => 'age'
                );
                echo form_input($data_name);//afficher le champ Nom
                echo "<br>";

                echo form_label('Adresse');//afficher le label Votre nom
                // Champ Nom
                $data_name = array(
                    'adresse' => 'adresse',
                    'class' => 'input_box',
                    'id' => 'adresse'
                );
                echo form_input($data_name);//afficher le champ Nom
                echo "<br>";

                echo form_label('Ville');//afficher le label Votre nom
                // Champ Nom
                $data_name = array(
                    'ville' => 'ville',
                    'class' => 'input_box',
                    'id' => 'ville'
                );
                echo form_input($data_name);//afficher le champ Nom
                echo "<br>";

                echo form_label('Votre courriel');//afficher le label Votre nom
                // Champ Nom
                $data_name = array(
                    'courriel' => 'courriel',
                    'class' => 'input_box',
                    'id' => 'courriel'
                );
                echo form_input($data_name);//afficher le champ Nom
                echo "<br>";
                echo "<br>";
                ?>
            </div>
            <div id="form_button">
                <?php echo form_submit('submit', 'Connection', "class='submit'"); ?>
            </div>
            <div id="form_button">
                <?php echo form_submit('submit', 'Connection', "class='submit'"); ?>
            </div>
            <?php
            // Fermer Form
            echo form_close(); ?>
    </html>




