<?php

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/str_functions.php';

if (! function_exists('app')) {
    /**
     * Shortcut for \Yii::$app
     * @return yii\base\Application
     */
    function app()
    {
        return Yii::$app;
    }
}

if (! function_exists('db')) {
    /**
     * Shortcut for \Yii::$app->db
     * @return \yii\db\Connection
     */
    function db()
    {
        return app()->db;
    }
}

if (! function_exists('user')) {
    /**
     * Shortcut for \Yii::$app->user
     * @return yii\web\User
     */
    function user()
    {
        return app()->user;
    }
}

if (! function_exists('params')) {
    /**
     * Shortcut for \Yii::$app->params
     * @return mixed
     */
    function params($paramName = null)
    {
        return $paramName ? app()->params[$paramName] : app()->params;
    }
}