<?php



namespace App\Http\Interfaces;
interface NotificationInterface{

    public function getNotification($request);

    public function  storeNotificationSetting($request);

    public function getNotificationSetting($request);

}