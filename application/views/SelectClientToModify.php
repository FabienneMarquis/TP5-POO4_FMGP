<script type="text/javascript">

    // Ajax post
    $(document).ready(function () {
        $("#submit").click(function (event) {
            event.preventDefault();
            window.location.replace("<?php echo base_url(); ?>" + "index.php/Controller/getModifyClient/"+$("#code").val());
        });
        $("#effacer").click(function(event){
           event.preventDefault();
            $(".form-control").val("");
        });
    });
</script>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Saisissez votre code client pour modifiez vos coordonnées</h4></div>
        <div class="panel-body">
            <form method="post" action="<?php echo base_url() ?>index.php/Controller/getModifyClient" role="form" class="form-horizontal">
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Code Client:</label>
                    <div class="col-sm-10">
                        <input name="nom" type="text" id="code" class="form-control" placeholder="Code Client">
                    </div>
                </div>
                <button type="button" id="effacer" class="btn btn-primary">Effacer</button>
                <button type="submit" id="submit" class="btn btn-primary">Chercher</button>
            </form>
        </div>
    </div>

</div>