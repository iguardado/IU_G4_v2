<?php require_once(__DIR__ . "/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$errors = $view->getVariable("errors"); ?>

<div class="login-form">

    <?php
    if (isset($errors['userNotValid'])) {
        echo "<script>";
        echo "document.getElementById('userNotValid').style.display = 'block';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "document.getElementById('userNotValid').style.display = 'none';";
        echo "</script>";
    }
    ?>

    <h1><img src="media/images/Logo_Moovett.png" class="imgLogo"></h1>
    <form name="login" action="index.php?controller=user&action=login" method="post"
          onsubmit="return validateForm()">

        <!-- Campo del usuario -->
        <div class="form-group ">
            <input type="text" class="form-control" placeholder="Usuario " id="userName"
                   onfocus="selUsr();<?php if (isset($errors['userNotValid'])) {
                       echo "hideUNV();";
                   } ?>" name="userName">
            <i class="fa fa-user" id="usrImg"></i>
        </div>

        <!-- Campo de la contraseña -->
        <div class="form-group log-status">
            <input type="password" class="form-control" placeholder="Contrasinal" id="password"
                   onfocus="selPass();<?php if (isset($errors['userNotValid'])) {
                       echo "hideUNV();";
                   } ?>" name="password">
            <i class="fa fa-lock" id="lock"></i>
        </div>

        <input type="submit" class="log-btn" value="Login" name="login"/>
    </form>

    <div>
        <span class="alert" style="display: none" id="emptyErr">O campo debe estar cuberto.</span>
    </div>

    <div>
        <?php
        if (isset($errors['userNotValid'])) {
            echo " <span style='display:block;font-size: 12px;color: #f00;float: left;margin-top: 15px;' id='userNotValid' >";
            echo $errors['userNotValid'];
            echo "</span>";
        }
        ?>
    </div>

</div>