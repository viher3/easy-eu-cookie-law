<link rel="stylesheet" href="<?php echo plugins_url( 'css/style.css' , __FILE__ ); ?>" type="text/css" media="screen" />

<div class="wrap">

    <form method="post">
    
        <h2><?php echo $lang['admin_title']; ?></h2>

        <div id="msj">
            <?php if(isset($_GET['saved'])){ ?>   
                <?php if($_GET['saved'] == "ok"){ ?>
                    <h2 style="color:green;"><?php echo $lang['save_ok']; ?></h2>
                <?php }else if($_GET['saved'] == "err"){ ?>
                    <h2 style="color:red;"><?php echo $lang['save_err']; ?></h2>
                <?php } ?>
            <?php } ?>
        </div>
        
        <table class="form-table">

            <tbody>

                <tr valing="top">
                    <th scope="row">
                        <label for="lang"><?php echo $lang['language']; ?></label>
                    </th>
                    <td>
                        <select name="lang" id="lang" style="width:350px;">
                            <option value="en" <?php if(lang=="en"){ ?>selected="selected"<?php } ?>><?php echo $lang['english']; ?></option>
                            <option value="es" <?php if(lang=="es"){ ?>selected="selected"<?php } ?>><?php echo $lang['spanish']; ?></option>
                        </select>
                    </td>
                </tr>

                <tr valing="top">
                    <th scope="row">
                        <label for="color"><?php echo $lang['alert_color']; ?></label>
                    </th>
                    <td>
                        <select name="color" id="color" style="width:350px;">
                            <option value="gris" class="gris font-white" <?php if(color=="gris"){ ?>selected="selected"<?php } ?>><?php echo $lang['grey']; ?></option>
                            <option value="gris2" class="gris2 font-white" <?php if(color=="gris2"){ ?>selected="selected"<?php } ?>><?php echo $lang['grey2']; ?></option>
                            <option value="azul" class="azul font-white" <?php if(color=="azul"){ ?>selected="selected"<?php } ?>><?php echo $lang['blue']; ?></option>
                            <option value="azul_rio" class="azul_rio font-white" <?php if(color=="azul_rio"){ ?>selected="selected"<?php } ?>><?php echo $lang['river_blue']; ?></option>
                            <option value="azul_noche"  class="azul_noche font-white" <?php if(color=="azul_noche"){ ?>selected="selected"<?php } ?>><?php echo $lang['night_blue']; ?></option>
                            <option value="verde" class="verde font-white" <?php if(color=="verde"){ ?>selected="selected"<?php } ?>><?php echo $lang['green']; ?></option>
                            <option value="verde_oscuro" class="verde_oscuro font-white" <?php if(color=="verde_oscuro"){ ?>selected="selected"<?php } ?>><?php echo $lang['dark_green']; ?></option>
                            <option value="verde_turquesa" class="verde_turquesa font-white" <?php if(color=="verde_turquesa"){ ?>selected="selected"<?php } ?>><?php echo $lang['turquoise_green']; ?></option>
                            <option value="verde_esmeralda" class="verde_esmeralda font-white" <?php if(color=="verde_esmeralda"){ ?>selected="selected"<?php } ?>><?php echo $lang['emerald_green']; ?></option>
                            <option value="violeta" class="violeta font-white" <?php if(color=="violeta"){ ?>selected="selected"<?php } ?>><?php echo $lang['pink']; ?></option>
                            <option value="violeta_oscuro" class="violeta_oscuro font-white" <?php if(color=="violeta_oscuro"){ ?>selected="selected"<?php } ?>><?php echo $lang['dark_pink']; ?></option>
                            <option value="asfalto" class="asfalto font-white" <?php if(color=="asfalto"){ ?>selected="selected"<?php } ?>><?php echo $lang['asphalt']; ?></option>
                            <option value="amarillo_claro" class="amarillo_claro" <?php if(color=="amarillo_claro"){ ?>selected="selected"<?php } ?>><?php echo $lang['light_yellow']; ?></option>
                            <option value="naranja_claro" class="naranja_claro font-white" <?php if(color=="naranja_claro"){ ?>selected="selected"<?php } ?>><?php echo $lang['light_orange']; ?></option>
                            <option value="naranja_zanahoria" class="naranja_zanahoria font-white" <?php if(color=="naranja_zanahoria"){ ?>selected="selected"<?php } ?>><?php echo $lang['carrot_orange']; ?></option>
                            <option value="naranja_oscuro" class="naranja_oscuro font-white" <?php if(color=="naranja_oscuro"){ ?>selected="selected"<?php } ?>><?php echo $lang['dark_orange']; ?></option>
                            <option value="rojo_claro" class="rojo_claro font-white" <?php if(color=="rojo_claro"){ ?>selected="selected"<?php } ?>><?php echo $lang['light_red']; ?></option>
                            <option value="rojo_oscuro" class="rojo_oscuro font-white" <?php if(color=="rojo_oscuro"){ ?>selected="selected"<?php } ?>><?php echo $lang['dark_red']; ?></option>
                        </select>
                    </td>
                </tr>

                <tr valing="top">
                    <th scope="row">
                        <label for="more_info_url"><?php echo $lang['pol_url']; ?></label>
                    </th>
                    <td>
                        <input type="text" class="regular-text" name="more_info_url" id="more_info_url" value="<?php echo more_info_url; ?>" />
                    </td>
                </tr>


            </tbody>

        </table>

        <p>
            <input type="submit" value="<?php echo $lang['save_changes']; ?>" class="button button-primary button-hero" id="save-post" name="save">
        </p>

    </form>
    
</div>

