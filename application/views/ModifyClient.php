<script type="text/javascript">

    // Ajax post
    $(document).ready(function () {
        $("#submit").click(function (event) {
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
<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading"><h4>Modifiez vos coordonnées <?php echo $id;?></h4></div>
        <div class="panel-body">
            <form method="post" action="<?php echo base_url() ?>index.php/Controller/submit" role="form" class="form-horizontal">
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
                <button type="submit" id="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>

</div>
