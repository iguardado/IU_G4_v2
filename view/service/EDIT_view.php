<!-- CONTIDO DA PAXINA -->

<?php
require_once(__DIR__ . "/../../controller/CONTROLLER_controller.php");

include('core/language/strings/Strings_' . $_SESSION["idioma"] . '.php');

$service_id = $_REQUEST["service_id"];
?>


<div class="col-md-6" style="margin-top: 20px">
    <h1 class="page-header"><?php echo $strings['service_modify'].': '.$_GET['service_id']?></h1>
    <form method="POST" name="editform" id="editform"
          action="index.php?controller=service&action=edit&service_id=<?php echo $service_id; ?>"
          enctype="multipart/form-data">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php include('core/language/strings/Strings_' . $_SESSION["idioma"] . '.php'); ?>
                <?php echo $strings['management_info'] ?>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-xs-12 col-md-6 text-info float-left" style="margin-left: 10px">
                        <div class="row">
                            <?php echo $strings['no_white_spaces'] ?>
                        </div>
                        <!--  <div class="row">
                            <?php echo $strings['max_length'] ?>: 25
                        </div>-->

                    </div>

                    <div class="col-xs-12 col-md-5">

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-cog fa-fw"></i></span>
                            <input class="form-control" type="text" name="fecha" maxlength="25"
                                   placeholder=<?php echo $strings['date']; ?>>
                        </div>
                        <!--Campo date-->
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-cog fa-fw"></i></span>
                            <input class="form-control" type="text" name="coste" maxlength="25"
                                   placeholder=<?php echo $strings['cost']; ?>>
                        </div>
                        <!--Campo cost-->
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-cog fa-fw"></i></span>
                            <input class="form-control" type="text" name="descripcion" maxlength="9"
                                   placeholder=<?php echo $strings['description']; ?>>
                        </div>
                        <!--Campo description-->
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input class="form-control" type="text" name="dni" maxlength="25"
                                   placeholder=<?php echo $strings['dni']; ?>>
                        </div>
                        <!--Campo dni-->
                    </div>
                </div>

                <?php
                $am = new ServiceMapper();
                //Recuperamos o id do usuario a editar
                $service_id = $_REQUEST["service_id"];

                ?>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-12">
                <div class="pull-left">
                    <a class="btn btn-default btn-md" href="index.php?controller=service&action=show">
                        <i class="fa fa-arrow-left"></i>
                        <?php echo $strings['back'] ?></i></a>
                </div>

                <div class="pull-right">
                    <button class="btn btn-outline btn-warning btn-md" name="reset" type="reset">
                        <?php echo $strings['clean'] ?></i></button>

                    <button class="btn btn-success btn-md" id="submit" name="submit" type="submit">
                        <i class="fa fa-edit"></i>
                        <?php echo $strings['EDIT'] ?></i></button>
                    <?php

                    ?>
                </div>
            </div>

        </div>
    </form>
    <!--fin formulario-->
</div>

<script>
    //Non deixar que o campo input teña espazos
    $("input").on("keydown", function (e) {
        return e.which !== 32;
    });
</script>