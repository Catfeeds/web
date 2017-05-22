<?php
namespace app\libs;
use yii;
use JPush\Client as Client;
class Jpush
{
    static public function push($type=1,$message='hello',$content='发帖',$alias='hublot',$num = 0,$informType=1,$belong){
        include_once($_SERVER['DOCUMENT_ROOT'].'/../libs/jpush/autoload.php');
        if($belong==2){
            $app_key = 'd78813d1f98c413504a15391';
            $master_secret = 'c4489435d983685c0d595b06';
        } elseif($belong==3){
            $app_key = '';
            $master_secret = '';
        } else{
            $app_key = 'c26b8b85850bd1e386eff92b';
            $master_secret = 'd26a2483f693244374d8b2b8';
        }
        $client = new Client($app_key, $master_secret);
        if($type == 1){
            $push_payload = $client->push()
                ->setPlatform('all')
                ->addAllAudience()
                ->message($message, array(
                    'extras' => array(
                        'type' => $type,
                        'message' => $content
                    ),
                ))
                ->options(array(
                    'apns_production' => true,
                ));
        }elseif($type==2){
            $push_payload = $client->push()
                ->setPlatform('all')
                ->addAlias($alias)
                ->iosNotification($message, array(
                    'badge' => $num,
                    'extras' => array(
                        'type' => $type,
                        'message' => $content,
                        'informType' => $informType
                    ),
                ))
                ->options(array(
                    'apns_production' => true,
                ));
        } else{
            $push_payload = $client->push()
                ->setPlatform('all')
                ->addAllAudience()
                ->iosNotification($message)
                ->options(array(
                    'apns_production' => true,
                ));
        }
        try {
            $response = $push_payload->send();
        }catch (\JPush\Exceptions\APIConnectionException $e) {
            // try something here
//            print $e;
        } catch (\JPush\Exceptions\APIRequestException $e) {
            // try something here
//            print $e;
        }
    }
}