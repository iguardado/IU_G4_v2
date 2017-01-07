<?php

require_once(__DIR__ . "/../core/ViewManager.php");

require_once(__DIR__ . "/../model/SESSION.php");
require_once(__DIR__ . "/../model/SESSION_model.php");
require_once(__DIR__ . "/../model/SCHEDULE.php");
require_once(__DIR__ . "/../model/SCHEDULE_model.php");
require_once(__DIR__ . "/../model/ACTIVITY.php");
require_once(__DIR__ . "/../model/ACTIVITY_model.php");
require_once(__DIR__ . "/../model/SPACE.php");
require_once(__DIR__ . "/../model/SPACE_model.php");
require_once(__DIR__ . "/../model/EMPLOYEE.php");
require_once(__DIR__ . "/../model/EMPLOYEE_model.php");
require_once(__DIR__ . "/../model/EVENT.php");
require_once(__DIR__ . "/../model/EVENT_model.php");


require_once(__DIR__ . "/../controller/BaseController.php");


/**
 * Class SessionsController
 *
 * Controller to login, logout and session data managing
 */
class SessionController extends BaseController
{

    /**
     * Reference to the SessionMapper to interact
     * with the database
     *
     * @var SessionMapper
     */
    private $sessionMapper;
    private $scheduleMapper;
    private $activityMapper;
    private $spaceMapper;
    private $eventMapper;
    private $employeeMapper;

    public function __construct()
    {
        parent::__construct();


        $this->sessionMapper = new SessionMapper();
        $this->scheduleMapper = new ScheduleMapper();
        $this->activityMapper = new ActivityMapper();
        $this->spaceMapper = new SpaceMapper();
        $this->eventMapper = new EventMapper();
        $this->employeeMapper = new EmployeeMapper();

        // Sessions controller operates in a "welcome" layout
        // different to the "default" layout where the internal
        // menu is displayed
        $this->view->setLayout("navbar");
    }

    //comproba se o rango de horas dado pode insertarse na data pasada
    //e nese espacio determinado
    public isValidRange( $date, $hourstart, $hourend, $space){
        $time = strtotime($date);
        $dayoweek = date('N',$time);

        $schedule = $this->scheduleMapper->getDateSchedule($fecha);
        $workday = NULL;

        //escoller a xornada do día correspondente a esa data
        foreach ($schedule->getScheduleWorkdays() as $wd) {
            if ($wd->getDay() == $dawoweek) {
                $workday = $wd;
            }
        }

        // 1. comprobar que rango de horas estea dentro do da xornada
        if  (
                (($hourstart > $workday->getHourStart()) &&
                 ($hourstart < $workday->getHourEnd())) 
                    ||
                (($hourend < $workday->getHourEnd()) &&
                 ($hourend > $workday->getHourStart()))
            )
            {
                return false;
            }

        //obtemos todas as sesións que compartan ese espazo ese día 
        $sessiontocompare = array();
        foreach ($this->sessionMapper->show() as $session) {
            if (($session->getSpace()->getCodspace() == $space->getCodspace())
                && ($session->getDate() == $date)) {
                array_push($sessiontocompare,$session);
            }     
        }



        // 2. Comprobamos que a sesión non se pise con outras
        foreach ($sessiontocompare as $session) {
            if  (
                (($hourstart > $session->getHourStart()) &&
                 ($hourstart < $session->getHourEnd())) 
                    ||
                (($hourend < $session->getHourEnd()) &&
                 ($hourend > $session->getHourStart()))
            )
            {
                return false;
            }

        }

        return true;

    }
        
        
    

    public function add()
    {


        if (isset($_POST["submit"])) {
            //Creamos un obxecto Session baleiro
            $session = new Session();

            //Engadimos o nome ao Session
            $session->setSessionname(htmlentities(addslashes($_POST["sessionname"])));

            try {
                if (!$this->sessionMapper->sessionnameExists($_POST["sessionname"])) {
                    //$session->checkIsValidForCreate();
                    $this->sessionMapper->add($session);
                    //ENVIAR AVISO DE ACCION ENGADIDO!!!!!!!!!!
                    $this->view->setFlash('succ_session_add');

                    //REDIRECCION Á PAXINA QUE TOQUE(Neste caso á lista dos sessions)
                    $this->view->redirect("session", "show");
                } else {
                    $this->view->setFlash("fail_session_exists");
                }
            } catch (ValidationException $ex) {
                $this->view->setFlash("erro_general");
            }
        }

        //Se non se enviou nada
        //$this->view->setLayout("navbar");
        $this->view->render("session", "add");
    }

    public function delete()
    {
        try {
            if (isset($_GET['sessionName'])) {
                $session_id = $this->sessionMapper->getIdByName($_REQUEST["sessionName"]);
                $session = $this->sessionMapper->view($session_id);
                $this->sessionMapper->delete($session);
                $this->view->setFlash('succ_session_delete');
                $this->view->redirect("session", "show");
            }
        } catch (Exception $e) {
           $this->view->setFlash('erro_general');
        }
        $this->view->render("session", "show");
    }

    public function show()
    {
        $sessions = $this->sessionMapper->show();
        $this->view->setVariable("sessionstoshow", $sessions);
        $this->view->render("session", "show");
    }

    public function view()
    {
        $sessionid = $this->sessionMapper->getIdByName($_REQUEST["session"]);
        $session = $this->sessionMapper->view($sessionid);
        $this->view->setVariable("session", $session);
        $this->view->render("session", "view");
    }

    public function edit()
    {
        if (isset($_POST["submit"])) {
            //Creamos un obxecto session baleiro
            $session_id = $this->sessionMapper->getIdByName($_REQUEST["sessionName"]);
            $session = $this->sessionMapper->view($session_id);

            $session->setSessionname($_REQUEST["newname"]);

            if ($this->sessionMapper->sessionnameExists($session->getSessionname())) {
                $this->view->setFlash("fail_session_exists");
                $this->view->redirect("session", "edit", "sessionName=".$_REQUEST["sessionName"]);
            }

            try {
                $this->sessionMapper->edit($session);
                //ENVIAR AVISO DE ACCION EDITADA!!!!!!!!!!
                $this->view->setFlash("succ_session_edit");
                //REDIRECCION Á PAXINA QUE TOQUE(Neste caso á lista dos accions)
                $this->view->redirect("session", "show");
            } catch (ValidationException $ex) {
                $this->view->setFlash("erro_general");
            }
        }
        //Se non se enviou nada
        //$this->view->setLayout("navbar");
        $this->view->render("session", "edit");
    }

    public function search(){
        if(isset($_POST["submit"])){
            $session = new Session();
            if(isset($_POST['sessionname'])){
                $session->setSessionname((htmlentities(addslashes($_POST["sessionname"]))));
            }
            if(isset($_POST["codsession"])){
                $session->setCodsession(htmlentities(addslashes($_POST["codsession"])));
            }
            try {
                
                $this->view->setVariable("sessionstoshow", $this->sessionMapper->search($session));

            } catch (Exception $e) {
                $this->view->setFlash("erro_general");
                $this->view->redirect("session", "show");
            }
            //render dado que non se pode settear a variable antes de un redirect
            $this->view->render("session","show");
        }else{
            $this->view->render("session", "search");
        }

    }
}