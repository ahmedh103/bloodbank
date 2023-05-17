<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\NotificationInterface;
use App\Http\Requests\Notification\StoreNoteficationRequest;
use App\Http\Requests\NotificationSettings\saveNotificationSetting;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    private $notiInterface;

    public function __construct(NotificationInterface $noti)
    {
        $this->notiInterface = $noti;
    }

    public function getNotification(Request $request)
    {
        return $this->notiInterface->getNotification($request);
    }

    public function storeNotification(StoreNoteficationRequest $request)
    {
        return $this->notiInterface->getNotification($request);
    }

  
    public function storeNotificationSetting(saveNotificationSetting $request)
    {
        return $this->notiInterface->storeNotificationSetting($request);
    }

    public function getNotificationSetting(Request $request)
    {
        return $this->notiInterface->getNotificationSetting($request);
    }

}
