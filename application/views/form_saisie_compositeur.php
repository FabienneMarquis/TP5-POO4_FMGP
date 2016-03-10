
<?php echo form_open('compositeur/'); ?>
<table>
    <tbody>
        <tr>

            <td>prenom</td>
            <td>
                <input name="prenom"   type="text" value="<?php echo (isset($compositeur) && count($compositeur) > 0)?$compositeur->prenom: set_value('prenom'); ?>" />
            </td>
            <td>
                <?php echo form_error('prenom'); ?>
            </td>

        </tr>
        <tr>
            <td>nom</td>
            <td>
                <input name="nom"  type="text" value="<?php echo (isset($compositeur) && count($compositeur) > 0)?$compositeur->nom: set_value('nom');?>" />
            </td>
           <td>
                <?php echo form_error('nom'); ?>
            </td>

        </tr>
         <tr>
             <td>&nbsp;</td>
            <td>
                <input type="Submit" value="Ajout" />
            </td>

        </tr>
    </tbody>
</table>
<?php echo isset($id)?form_hidden('id', $id):'' ?>
<?php echo form_close(); ?>
<?php echo anchor('compositeur/index','Liste des compositeurs'); ?>