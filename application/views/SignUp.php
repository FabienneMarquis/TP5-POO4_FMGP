<?php
/**
 * Created by PhpStorm.
 * User: 0940135
 * Date: 2016-03-15
 * Time: 16:23
 */?>
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
                url: "<?php echo base_url(); ?>" + "index.php/Controller/postSignUp",
                dataType: 'json',
                data: {email: courriel, pwd: password}
            })
        });
    });
</script>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Inscription</h4></div>
        <div class="panel-body">
            <form method="post" action="<?php echo base_url() ?>index.php/Controller/postSignUp" role="form" class="form-horizontal">
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Courriel:</label>
                    <div class="col-sm-10">
                        <input name="email" type="email" class="form-control" placeholder="Courriel">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Mot de passe:</label>
                    <div class="col-sm-10">
                        <input name="pwd" type="password" class="form-control" placeholder="******">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Retappez:</label>
                    <div class="col-sm-10">
                        <input name="pwd2" type="password" class="form-control" placeholder="******">
                    </div>
                </div>
                <button type="button" id="effacer" class="btn btn-primary">Effacer</button>
                <button type="submit" id="submit" class="btn btn-primary">Inscription</button>
            </form>
        </div>
    </div>
</div>

