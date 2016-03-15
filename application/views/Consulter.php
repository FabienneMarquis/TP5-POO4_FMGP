<?php
/**
 * Created by PhpStorm.
 * User: 1494778
 * Date: 2016-03-11
 * Time: 12:03
 */
?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Rechercher un article en magasin</h4></div>
        <div class="panel-body">
            <form method="post" action="<?php echo base_url() ?>index.php/Controller/Consulter" role="form" class="form-horizontal">
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Mot-clé:</label>
                    <div class="col-sm-10">
                        <input name="nom" type="text" class="form-control" placeholder="Mot-clé">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Dans la categorie:</label>
                    <div class="col-sm-10">
                        <select name="categorie" class="form-control">
                            <option value="tous">Tous</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Trier par:</label>
                    <div class="col-sm-10">
                        <select name="trie" class="form-control">
                            <option value="prix">Prix</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">En ordre:</label>
                    <div class="col-sm-10">
                        <label>
                            <input name="radio" type="radio" value="croissant">
                            Croissant
                        </label>
                        <label>
                            <input name="radio" type="radio" value="decroissant">
                            Decroissant
                        </label>
                    </div>

                </div>
                <button type="button" id="effacer" class="btn btn-primary">Effacer</button>
                <button type="submit" id="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>
