<!--SCRIPT DE DATATABLE-->
<?php
require_once(__DIR__ . "/../../controller/USER_controller.php");

require_once(__DIR__ . "/../../controller/PERMISSION_controller.php");
require_once(__DIR__ . "/../../model/PERMISSION_model.php");
include('core/language/strings/Strings_' . $_SESSION["idioma"] . '.php');

$view = ViewManager::getInstance();

switch ($_SESSION['idioma']) {
    case 'SPANISH':
        include 'js/showscriptES.js';
        break;
    case 'GALEGO':
        include 'js/showscriptGL.js';
        break;
    case 'ENGLISH':
        include 'js/showscriptEN.js';
        break;
    default:
        include 'js/showscriptGL.js';
        break;
}
    $uc = new UserController();
    $um = new PermissionMapper();
    //Recollemos os usuarios
    $all_permissions = $view->getVariable('permistoshow');
    $permissions = $uc->getCurrentUserPerms();

    $add = false;
    $delete = false;
    $edit = false;
    $v = false;
    //Comprobamos os permisos que ten o usuario actual
    foreach ($permissions as $perm){

        if($perm->getController()->getControllername() == strtoupper($_GET["controller"])){
            $action = $perm->getAction()->getActionname();
            if($action == "ADD"){
                $add = true;
            }
            elseif($action == "DELETE"){
                $delete = true;
            }
            elseif($action== "VIEW"){
                $v = true;
            }
        }
    }

                                
?>

<!--ESTRUTURA DA TABLA EN SI-->

<!--O id debe ser este para que funcione o script-->
<div class="col-xs-12 col-md-8 " style="margin-top: 20px">

<h1 class="page-header"><?php echo $strings['management_permissions'] ?></h1>

<div class="row">

        <!--BOTÓN BUSCAR-->
        <div class="col-xs-4 col-md-2">
            <a href="index.php?controller=permission&action=search">
            <button type="button" class="btn btn-primary">
            <i class="fa fa-fw fa-search"></i>
            <?php echo $strings['find']; ?></button>
            </a>
        </div>


        <!--BOTÓN ENGADIR-->
        <?php if ($add) {
            echo '  <div class="col-xs-4 col-md-2">
                        <a href="index.php?controller=permission&action=add">
                            <button type="button" class="btn btn-primary">
                            <i class="fa fa-fw fa-plus"></i>
                                '. $strings['ADD'].'
                            </button>
                        </a>
                    </div>';
        } ?>  
</div>

<!--PANEL TABOA DE LISTADO-->
<div class="row" style="margin-top: 20px">
<div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $strings['list_of'].' '.$strings['PERMISSION']; ?>

                        </div>
                        <div class="panel-body">

    <table id="dataTable" class="table-responsive   table-hover" style="width:80%; margin-right: 10%; margin-left: 10%">
        <thead>
        <tr class="row" >
            <!--CADA UN DE ESTES É UN CABECERO DA TABOA (TIPO "NOMBRE")-->
            <th class="text-center"><?php echo $strings['PERMISSION']?></th>
            <?php
            if(!$edit && !$delete && !$v){ ?>
                <th class="text-center"><?php echo $strings['no_actions_to_do']?></th>
                <?php
            }else{
                ?>
                <th class="text-center"><?php echo $strings['ACTION']?></th>
            <?php } ?>
        </tr>
        </thead>

        <tbody>
        <!--CADA UN DE ESTES É UNHA FILA-->

        <?php
        //Para cada Permiso, imprimimos o seu nome e as accións que se poden realizar nel (view,edit e delete)
        foreach ($all_permissions as $p) {
            echo "<tr class='row text-center' ><td> ";

            echo $p->getController()->getControllername()." -> ".$p->getAction()->getActionname()."</td><td class='text-center'>";
            //Botón que direcciona a vista do usuario
            if($v){
                echo "<a href='index.php?controller=PERMISSION&action=VIEW&perm_id=" .
                    $p->getCodpermission() . "'><button class='btn btn-primary btn-xs' style='margin:2px'>";
                echo "<i class='fa fa-eye fa-fw'></i></button></a>";
            }

            //Botón que direcciona á vista de eliminar
            if($delete){
                echo '<button type="button" class="btn btn-danger btn-xs';
                echo '" data-toggle="modal" data-target="#confirmar'.$p->getCodpermission().'">';
                echo '<i class="fa fa-trash-o fa-fw"></i></button>';
            }

            //MODAL DE CONFIRMACIÓN DE BORRADO PARA CADA PERMISO
            include(__DIR__.'/DELETE_view.php');
            echo "</td></tr>";
        }
        ?>

        </tbody>
    </table>
    </div>
    </div>
</div>


