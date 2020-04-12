<?php
namespace APP\controllers;
use APP\models\Operator;
use APP\core\base\Model;
use APP\models\Project;

class OperatorController extends AppController {

	public $layaout = 'PANEL';
    public $BreadcrumbsControllerLabel = "Кабинет оператора";
    public $BreadcrumbsControllerUrl = "/operator";



    public function indexAction()
    {

        //Информация о компаниях клиента

        $META = [
            'title' => 'Кабинет рекламодателя',
            'description' => 'Кабинет рекламодателя',
            'keywords' => 'Кабинет рекламодателя ',
        ];
        \APP\core\base\View::setMeta($META);


        $BREADCRUMBS['HOME'] = ['Label' => $this->BreadcrumbsControllerLabel, 'Url' => $this->BreadcrumbsControllerUrl];
        $BREADCRUMBS['DATA'][] = ['Label' => "Мои проекты"];
        \APP\core\base\View::setBreadcrumbs($BREADCRUMBS);


        $operator = new Operator(); //Вызываем Моудль







    }


    public function myAction()
    {

        //Информация о компаниях клиента

        $META = [
            'title' => 'Мои проекты',
            'description' => 'Мои проекты',
            'keywords' => 'Мои проекты',
        ];
        \APP\core\base\View::setMeta($META);


        $BREADCRUMBS['HOME'] = ['Label' => $this->BreadcrumbsControllerLabel, 'Url' => $this->BreadcrumbsControllerUrl];
        $BREADCRUMBS['DATA'][] = ['Label' => "Мои проекты"];
        \APP\core\base\View::setBreadcrumbs($BREADCRUMBS);




    }

    public function allAction()
    {

        //Информация о компаниях клиента

        $META = [
            'title' => 'Все проекты',
            'description' => 'Все проекты',
            'keywords' => 'Все проекты',
        ];
        \APP\core\base\View::setMeta($META);


        $BREADCRUMBS['HOME'] = ['Label' => $this->BreadcrumbsControllerLabel, 'Url' => $this->BreadcrumbsControllerUrl];
        $BREADCRUMBS['DATA'][] = ['Label' => "Все проекты"];
        \APP\core\base\View::setBreadcrumbs($BREADCRUMBS);

        $ASSETS[] = ["js" => "/global_assets/js/plugins/tables/datatables/datatables.min.js"];
        $ASSETS[] = ["js" => "/assets/js/datatables_basic.js"];
        \APP\core\base\View::setAssets($ASSETS);


        $operator = new Operator(); //Вызываем Моудль
        $allcompanies = $operator->allcompanies();
        $this->set(compact('allcompanies'));

    }


    public function companyinfoAction(){

        $project = new Project;
        $idc = $_GET['id'];
        $company = $project->getcom($_GET['id']);

        $META = [
            'title' => 'Проект '.$company['company'],
            'description' => 'Проект '.$company['company'],
            'keywords' => 'Проект '.$company['company'],
        ];
        \APP\core\base\View::setMeta($META);


        $BREADCRUMBS['HOME'] = ['Label' => $this->BreadcrumbsControllerLabel, 'Url' => $this->BreadcrumbsControllerUrl];
        $BREADCRUMBS['DATA'][] = ['Label' => "Все проекты", 'Url' => "/operator/all/"];
        $BREADCRUMBS['DATA'][] = ['Label' => "Проект ".$company['company']];
        \APP\core\base\View::setBreadcrumbs($BREADCRUMBS);







        $this->set(compact('company'));



    }






}
?>