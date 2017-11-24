<?php

namespace lisnyak\mvc\models;

use lisnyak\mvc\core\Model;

/**
 * This is the model class for table "ports".
 * 
 *  @property integer $id
 *  @property string $first_name
 *  @property string $second_name
 *  @property string $login
 *  @property string $password
 */
class User extends Model {
    
    public function Pages() {
        return $this->hasMany('\lisnyak\mvc\models\Page', 'users_id', "id");
    }

}
