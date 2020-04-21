<?php
namespace APP\models;
use RedBeanPHP\R;

class Addp extends \APP\core\base\Model {

    // АТРИБУТЫ КОТОРЫЕ ЗАБИРАЕМ ПРИ ДОБАВЛЕНИИ
    public $ATR = [

        'company' => '',
        'transkr' => '',
        'name' => '',
        'adress' => '',
        'tematika' => '',
        'logo' => '',
        'aboutcompany' => '',
        'nameproduct' => '',
        'minimumprice' => '',
        'type' => '',
        'priceresult' => '',
        'mincall' => '',
        'bonuscall' => '',
        'timecall' => '',
        'email' => '',

    ];
    // Правила валидации
    public $rules = [
        'required' => [
            ['company'],
            ['transkr'],
            ['adress'],
            ['tematika'],
            ['aboutcompany'],
            ['nameproduct'],
            ['type'],
            ['priceresult'],
            ['mincall'],
            ['timecall'],

        ],
        'email' =>[
            ['email'],
        ],

//        'lengthMin' =>[
//            ['signup-password',5],
//            ['signup-password-confirm',5],
//        ],
//        'lengthMax' =>[
//            ['signup-password',30],
//            ['signup-password-confirm',30],
//            ['signup-username',30],
//        ],

    ];




	public function addproject($DATA) {



        //ФОРМИРУЕМ МАССИВ ДАННЫХ ДЛЯ РЕГИСТРАЦИИ
        $uniq = [
            'client_id' => $_SESSION['ulogin']['id'],
            'status' => "2",
            'logo' => "/uploads/user_avatar/baselogo.jpg",
            'datastart' => date("Y-m-d H:i:s"),
            'daylimit' => "5",
            'formresult' => '[{"NAME":"Имя","TYPE":1}]',
        ];

        $DATA = array_merge($uniq, $DATA);

        show($DATA);

        $tbl = R::dispense("company");
        //ФОРМИРУЕМ МАССИВ ДАННЫХ ДЛЯ РЕГИСТРАЦИИ
        foreach($DATA as $name=>$value)
        {
            $tbl->$name = $value;
        }
        return R::store($tbl);

            // По поводу валидации

	}






}
?>