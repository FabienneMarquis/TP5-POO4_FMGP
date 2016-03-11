<?php
/**
 * Created by PhpStorm.
 * User: 1494778
 * Date: 2016-03-11
 * Time: 15:13
 */
?>
<div>
    <h4>Saisissez votre code client pour modifier vos coordonnées</h4>
    <?php echo form_open('/'); ?>
    <table>
        <tbody>
        <tr>
            <td>Code client</td>
            <td>
                <input name="code"  type="text" value="" />
            </td>
            <td>
                <?php echo form_error('nom'); ?>
            </td>

        </tr>
        <tr>
            <td><input type="Submit" value="Effacer" /></td>
            <td>
                <input type="Submit" value="Ajout" />
            </td>

        </tr>
        </tbody>
    </table>
    <?php echo isset($id)?form_hidden('id', $id):'' ?>
    <?php echo form_close(); ?>
