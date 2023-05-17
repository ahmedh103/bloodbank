<?php namespace App\Http\Repositories;

use App\Http\Interfaces\CityInterface;
use App\Http\Interfaces\NotificationInterface;
use App\Http\Traits\apiResponseTrait;
use App\Http\Traits\JsonValidationTrait;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Termwind\Components\Dd;

class NotificationRepository implements NotificationInterface {
    private $notiModel;
    use apiResponseTrait,JsonValidationTrait;

    public function __construct(Notification $notifi) {

        $this->notiModel=$notifi;


    }
    public function getNotification($request) {
        $currentuser=Auth::user();
        $notification  =  $currentuser->notifications()->paginate();
        // $notifications=$this->notiModel::where(function($query) use($request, $currentuser) {

        //         $query->whereHas('clients', function($query) use($currentuser) {
        //                 $query->where('client_id', $currentuser->id);
        //             }

        //         );

        //     }

        // )->paginate();
        return $this->apiResponse(1, 'success', $notification);
    }
    public function storeNotificationSetting($request) {
        $attachBloodType=$request->user()->bloodtypes()->sync($request->blood_type_id);
        $attachGoveronrate=$request->user()->governorates()->sync($request->governorate_id);
        return $this->apiResponse(1, 'Success', [ 
          'Blood_Types'=> $attachBloodType,
          'Governorates'=>$attachGoveronrate
      
      ]);
    }

    public function getNotificationSetting($request)
    {
      $getBloodType = $request->user()->bloodtypes()->latest()->paginate(20);
      $getGoveronrate = $request->user()->governorates()->latest()->paginate(20);
      return $this->apiResponse(1,'Loaded.....',[
        'Blood_Types'=> $getBloodType,
        'Governorates'=>$getGoveronrate

      ]);
    }
    



}
