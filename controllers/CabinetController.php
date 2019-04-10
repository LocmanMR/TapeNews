<?php

class CabinetController
{

    public static function actionIndex(): bool
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);
        require_once(ROOT . '/views/cabinet/index.php');

        return true;
    }

}
