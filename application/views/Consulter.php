<?php
/**
 * Created by PhpStorm.
 * User: 1494778
 * Date: 2016-03-11
 * Time: 12:03
 */
?>
<script type="text/javascript">

    // Ajax post
    $(document).ready(function () {
        $("#submit").click(function (event) {
            event.preventDefault();
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "index.php/Controller/postConsulter",
                dataType: 'json',
                data: $('#form').serialize(),
                success: function (json) {
                    //var obj = jQuery.parseJSON(json);
                    $('#result').append('<div class="panel-heading">'+
                        '<h4>Il y a '+json.length+ ' articles correspondant au mot-cle:'+$('#mot').val() +'</h4>'+
                    '</div>');
                    console.log(json);
                }
            })
        });
        $("#effacer").click(function(event){
            event.preventDefault();
            $("#mot").val("");
            $("#categorie").val("tous");
            $("#trie").val("prix");
        });
    });
</script>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Rechercher un article en magasin</h4></div>
        <div class="panel-body">
            <form method="post" id="form" action="<?php echo base_url() ?>index.php/Controller/postConsulter" role="form"
                  class="form-horizontal">
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Mot-clé:</label>
                    <div class="col-sm-10">
                        <input id="mot" name="mot" type="text" class="form-control" placeholder="Mot-clé">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Dans la categorie:</label>
                    <div class="col-sm-10">
                        <select id="categorie" name="categorie" class="form-control">
                            <option value = "tous" > Tous</option >
                            <?php foreach ($categories as $category) {
                                echo '<option value = "'.$category->idCategorie.'">'.$category->nomCategorie.'</option >';
                            } ?>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label"> Trier par:</label>
                    <div class="col-sm-10">
                        <select id="trie" name="trie" class="form-control">
                            <option value="prix"> Prix</option>
                            <option value="quantite"> Quantite</option>
                            <option value="codeArticle"> Code Article</option>
                            <option value="idCategorie"> Categorie</option>
                            <option value="description"> Description</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label"> En ordre:</label>
                    <div class="col-sm-10">
                        <label>
                            <input name="order" type="radio" value="asc">
                            Croissant
                        </label>
                        <label>
                            <input name="order" type="radio" value="desc">
                            Decroissant
                        </label>
                    </div>

                </div>
                <button type="button" id="effacer" class="btn btn-primary"> Effacer</button>
                <button type="submit" id="submit" class="btn btn-primary"> Chercher</button>
            </form>
        </div>
    </div>
    <div class="panel panel-default" id="result">

    </div>
</div>
