<link rel="stylesheet" href="<?php echo plugins_url( 'css/style.css' , __FILE__ ); ?>" type="text/css" media="screen" />

<div class="wrap">

    <h2><?php _e('Cookie Law Settings', 'easy-eu-cookie-law'); ?></h2>

    <div id="msj">
        <h2 id="saved_ok" style="color:green;display:none;">
            <?php _e('Data saved correctly.', 'easy-eu-cookie-law'); ?>
        </h2>
        <h2 id="saved_ko" style="color:red;display:none;">
            <?php _e('Error saving data, try it again.', 'easy-eu-cookie-law'); ?>
        </h2>
    </div>
    
    <table class="form-table">

        <tbody>

            <tr valing="top">
                <th scope="row">
                    <label for="position">
                        <?php _e('Position', 'easy-eu-cookie-law'); ?>
                    </label>
                </th>
                <td>
                    <select name="position" id="position" style="width:350px;">
                        <option value="top" <?php if($eecl_position=="top"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Top', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="bottom" <?php if($eecl_position=="bottom"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Bottom', 'easy-eu-cookie-law'); ?>
                        </option>
                    </select>
                </td>
            </tr>

            <tr valing="top">
                <th scope="row">
                    <label for="color"><?php _e('Alert color', 'easy-eu-cookie-law'); ?></label>
                </th>
                <td>
                    <select name="color" id="color" style="width:350px;">
                        <option value="gris" class="gris font-white" <?php if($eecl_color=="gris"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Grey', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="gris2" class="gris2 font-white" <?php if($eecl_color=="gris2"){ ?>selected="selected"<?php } ?>> 
                            <?php _e('Grey 2', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="azul" class="azul font-white" <?php if($eecl_color=="azul"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Blue', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="azul_rio" class="azul_rio font-white" <?php if($eecl_color=="azul_rio"){ ?>selected="selected"<?php } ?>>
                            <?php _e('River blue', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="azul_noche"  class="azul_noche font-white" <?php if($eecl_color=="azul_noche"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Night blue', 'easy-eu-cookie-law') ?>
                        </option>
                        <option value="verde" class="verde font-white" <?php if($eecl_color=="verde"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Green', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="verde_oscuro" class="verde_oscuro font-white" <?php if($eecl_color=="verde_oscuro"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Dark green', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="verde_turquesa" class="verde_turquesa font-white" <?php if($eecl_color=="verde_turquesa"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Turquoise green', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="verde_esmeralda" class="verde_esmeralda font-white" <?php if($eecl_color=="verde_esmeralda"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Emerald green', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="violeta" class="violeta font-white" <?php if($eecl_color=="violeta"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Pink', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="violeta_oscuro" class="violeta_oscuro font-white" <?php if($eecl_color=="violeta_oscuro"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Dark pink', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="asfalto" class="asfalto font-white" <?php if($eecl_color=="asfalto"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Asphalt', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="amarillo_claro" class="amarillo_claro" <?php if($eecl_color=="amarillo_claro"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Light yellow', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="naranja_claro" class="naranja_claro font-white" <?php if($eecl_color=="naranja_claro"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Light orange', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="naranja_zanahoria" class="naranja_zanahoria font-white" <?php if($eecl_color=="naranja_zanahoria"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Carrot orange', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="naranja_oscuro" class="naranja_oscuro font-white" <?php if($eecl_color=="naranja_oscuro"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Dark orange', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="rojo_claro" class="rojo_claro font-white" <?php if($eecl_color=="rojo_claro"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Light red', 'easy-eu-cookie-law'); ?>
                        </option>
                        <option value="rojo_oscuro" class="rojo_oscuro font-white" <?php if($eecl_color=="rojo_oscuro"){ ?>selected="selected"<?php } ?>>
                            <?php _e('Dark red', 'easy-eu-cookie-law'); ?>
                        </option>
                    </select>
                </td>
            </tr>

            <tr valing="top">
                <th scope="row">
                    <label for="more_info_url"><?php _e('Cookies policy url', 'easy-eu-cookie-law'); ?></label>
                </th>
                <td>
                    <input type="text" class="regular-text" name="more_info_url" id="more_info_url" value="<?= $eecl_url; ?>" />
                </td>
            </tr>

        </tbody>

    </table>

    <p>
        <input type="button" value="<?php _e('Save changes', 'easy-eu-cookie-law'); ?>" class="button button-primary button-hero" id="save-post" name="save">
    </p>
    
</div>