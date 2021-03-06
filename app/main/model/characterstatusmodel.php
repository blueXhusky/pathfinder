<?php
/**
 * Created by PhpStorm.
 * User: exodus4d
 * Date: 01.04.15
 * Time: 21:12
 */

namespace Model;

use DB\SQL\Schema;

class CharacterStatusModel extends BasicModel {

    protected $table = 'character_status';

    protected $fieldConf = [
        'active' => [
            'type' => Schema::DT_BOOL,
            'nullable' => false,
            'default' => 1,
            'index' => true
        ],
        'name' => [
            'type' => Schema::DT_VARCHAR128,
            'nullable' => false,
            'default' => ''
        ],
        'class' => [
            'type' => Schema::DT_VARCHAR128,
            'nullable' => false,
            'default' => ''
        ]
    ];

    protected static $tableData = [
        [
            'id' => 1,
            'name' => 'corporation',
            'class' => 'pf-user-status-corp'
        ],
        [
            'id' => 2,
            'name' => 'alliance',
            'class' => 'pf-user-status-ally'
        ],
        [
            'id' => 3,
            'name' => 'own',
            'class' => 'pf-user-status-own'
        ]
    ];

    /**
     * overwrites parent
     * @param null $db
     * @param null $table
     * @param null $fields
     * @return bool
     * @throws \Exception
     */
    public static function setup($db=null, $table=null, $fields=null){
        $status = parent::setup($db,$table,$fields);

        // set static default values
        if($status === true){
            $model = self::getNew(self::getClassName(), 0);
            $model->importStaticData(self::$tableData);
        }

        return $status;
    }
} 