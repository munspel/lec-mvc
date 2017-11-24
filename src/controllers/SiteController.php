<?php

namespace lisnyak\mvc\controllers;

use lisnyak\mvc\core\components\BaseContriller;
use lisnyak\mvc\models\User;
use lisnyak\mvc\core\Core;
use Illuminate\Database\Capsule;

class SiteController extends BaseContriller {

    public function actionIndex() {
        

        $users = User::query()->where("id",  ">", 3 )->with("Pages")->get()->toArray();
        echo "<pre>";
        print_r($users);
        echo "</pre>";
//        $this->getView()->render("viewname", ["data" => "actionIndex : hello", "list" => [9, 2, 23]]);
    }

    public function actionTest() {
        echo "actionTest : hello";
    }

    public function actionEdit($id, $param) {
        echo "actionTest : hello id = $id, $param";
    }

}
