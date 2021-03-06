<?php
// file: view/layouts/language_select_element.php
?>

                <div class="col-xs-5 col-xs-offset-8 col-md-offset-0 col-md-12">
                <form class="form-inline float-xs-right"  id='idiomaform' name='idiomaform' action='core/language/cambiaridioma.php' method='post'>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                        <select id='idioma' name='idioma' class=" form-control icon-menu"
                                onchange='idiomaform.submit()'>
                            <option value='SPANISH' style="background-image:url(core/language/flags/sp.png);"
                                <?php
                                if ($_SESSION["idioma"] == "SPANISH") {
                                    echo "selected";
                                }
                                ?>
                            >
                                Spanish
                            </option>
                            <option value='ENGLISH' style="background-image:url(core/language/flags/en.png);"
                                <?php
                                if ($_SESSION["idioma"] == "ENGLISH") {
                                    echo "selected";
                                }
                                ?>
                            >
                                English
                            </option>
                            <option value='GALEGO' style="background-image:url(core/language/flags/gl.png);"
                                <?php
                                if ($_SESSION["idioma"] == "GALEGO") {
                                    echo "selected";
                                }
                                ?>
                            >
                                Galego
                            </option>
                        </select>
                    </div>
                </form>
                </div>

