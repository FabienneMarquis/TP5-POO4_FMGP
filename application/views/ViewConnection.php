<?php
/**
 * Created by PhpStorm.
 * User: 1494778
 * Date: 2016-03-11
 * Time: 09:48
 */ ?>
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
<body>
<div class="main">
    <div id="content">
        <h2 id="form_head">Connexion à la base de données</h2><br/>
        <hr>
        <div id="form_input">
            <?php

            // Ouvrrir le formulaire Form
            echo form_open();

            echo form_label('Votre courriel');//afficher le label Votre nom
            // Champ Nom
            $data_name = array(
                'courriel' => 'courriel',
                'class' => 'input_box',
                'placeholder' => 'SVP entrez votre Courriel',
                'id' => 'courriel'
            );
            echo form_input($data_name);//afficher le champ Nom
            echo "<br>";
            echo "<br>";

            echo form_label('Mot de passe');
            //Champ Password
            $data_name = array(
                'type' => 'password',
                'name' => 'pwd',
                'class' => 'input_box',
                'placeholder' => '',
                'id' => 'pwd'
            );
            echo form_input($data_name);//afficher le champ password
            ?>
        </div>
        <div id="form_button">
            <?php echo form_submit('submit', 'Connection', "class='submit'"); ?>
        </div>
        <?php
        // Fermer Form
        echo form_close(); ?>
</html>


