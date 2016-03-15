<?php
/**
 * Created by PhpStorm.
 * User: 0940135
 * Date: 2016-03-15
 * Time: 12:02
 */ ?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Il y a <?php echo count($items);?> articles correspondant au mot-cle: <?php echo$mot_cle;?></h4>
        </div>
        <table class="table">
            <tr>
                <th>Code Article</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Quantite</th>
                <th>Categorie</th>
            </tr>
            <tr>
                <td><?php echo $items['code']; ?></td>
                <td><?php echo $items['description']; ?></td>
                <td><?php echo $items['prix']; ?></td>
                <td><?php echo $items['quantite']; ?></td>
                <td><?php echo $items['categorie']; ?></td>
            </tr>
        </table>

    </div>
</div>