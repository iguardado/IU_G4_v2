<!-- CONTIDO DA PAXINA -->
<?php
require_once(__DIR__ . "/../../core/ViewManager.php");

$view = ViewManager::getInstance();
include('core/language/strings/Strings_' . $_SESSION["idioma"] . '.php');

?>


<div class="col-md-12" style="margin-bottom: 30px;width:55%;">
    <h1 class="page-header"><?php echo $strings['create_spend']; ?></h1>
    <form name="form" id="form" method="POST"
          action="index.php?controller=payment&action=tillspend"
          enctype="multipart/form-data">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo $strings['create_spend'] ?>
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-xs-12 col col-md-5">
                        <label for="selectperf"><?php echo $strings['till_quantity'] ?></label>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-euro fa-fw"></i></span>
                            <input type="number" min="-2500000" step="0.01" max="0" autofocus
                                   class="form-control" id="cantidad" name="cantidad"
                                   placeholder= <?php echo $strings['quantity'] ?>
                                   required="true">
                            <div id="error"></div>
                        </div>
                        <!--Campo cantidad-->
                    </div>
                    <div class="col-xs-12 col col-md-5">
                        <label for="selectperf"><?php echo $strings['concept'] ?></label>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input autofocus type="text" class="form-control" id="concepto" name="concepto"
                                   placeholder= <?php echo $strings['concept'] ?>
                                   required="true" maxlength="25">
                            <div id="error"></div>
                        </div>
                        <!--Campo concepto-->
                    </div>

                </div>

            </div>
        </div>
</div>

<div class="row">

    <div class="col-xs-12">
        <div class="pull-left">
            <a class="btn btn-default btn-md" href="index.php?controller=payment&action=show">
                <i class="fa fa-arrow-left"></i>
                <?php echo $strings['back'] ?></i></a>
        </div>

        <div class="pull-right">
            <button class="btn btn-outline btn-warning btn-md" name="reset" type="reset">
                <?php echo $strings['clean'] ?></i></button>

            <button class="btn btn-success btn-md" id="submit" name="submit" type="submit">
                <i class="fa fa-plus"></i>
                <?php echo $strings['ADD'] ?></i></button>
            <?php

            ?>
        </div>
    </div>

</div>
</form>

<!--fin formulario-->
</div>