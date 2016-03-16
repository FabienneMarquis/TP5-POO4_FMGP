<?php if (!defined('BASEPATH')) exit('no direct script access allowed');
/**
 * Created by PhpStorm.
 * User: 1494778
 * Date: 2016-03-11
 * Time: 09:56
 */ ?>
<!--<link rel="stylesheet" type="text/css" href="--><?php //echo base_url(); ?><!--css/style.css">-->
<script type="text/javascript">

    // Ajax post
    $(document).ready(function () {
        $("#submit").click(function (event) {
            event.preventDefault();
            var courriel = $("input#email").val();
            var password = $("input#pwd").val();
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "index.php/Controller/postAddClient",
                dataType: 'json',
                data: {email: courriel, pwd: password}
            })
        });
        $("#effacer").click(function(event){
            event.preventDefault();
            $(".form-control").val("");
        });
    });
</script>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Vos coordonnées</h4></div>
        <div class="panel-body">
            <form method="post" action="<?php echo base_url() ?>index.php/Controller/postAddClient" role="form" class="form-horizontal">
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Nom:</label>
                    <div class="col-sm-10">
                        <input name="nom" type="text" class="form-control" placeholder="Nom">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Prenom:</label>
                    <div class="col-sm-10">
                        <input name="prenom" type="text" class="form-control" placeholder="Prenom">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Age:</label>
                    <div class="col-sm-10">
                        <input name="age" type="number" class="form-control" placeholder="Age">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Adresse:</label>
                    <div class="col-sm-10">
                        <input name="adresse" type="text" class="form-control" placeholder="Adresse">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Ville:</label>
                    <div class="col-sm-10">
                        <input name="ville" type="text" class="form-control" placeholder="Ville">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Couriel:</label>
                    <div class="col-sm-10">
                        <input name="couriel" type="text" class="form-control" placeholder="Couriel">
                    </div>
                </div>
                <button type="button" id="effacer" class="btn btn-primary">Effacer</button>
                <button type="submit" id="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>

</div>




