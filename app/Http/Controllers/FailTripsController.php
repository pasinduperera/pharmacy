<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
class FailTripsController extends Controller
{
	public function index(){		

		// $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/nishanthataxi.json');

		// 	$firebase = (new Factory)
		// 	->withServiceAccount($serviceAccount)
		// 	->withDatabaseUri('https://respectcab-live.firebaseio.com')
		// 	->create();


			// test db json file if you want to test with test data

		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/respect-cab-dev-firebase-adminsdk-fq12h-0a21c8e8a4.json');


		$firebase = (new Factory)
		->withServiceAccount($serviceAccount)
		->withDatabaseUri('https://respect-cab-dev.firebaseio.com')
		->create();

		$database 		= $firebase->getDatabase();		
		$ref = $database->getReference('DriverTracking');

		// $ref = $database->getReference('DriverHistory_Model/{$driverid}');
		// $subjects = $ref->getValue();
		// foreach ($subjects as $subject) {
		// 	$all_subject[] = $subject;
		// }

		$historys_old = $ref->getValue();

		$historys = array_filter($historys_old); 
		foreach ($historys as $history) {
            foreach ($history as $history_location_wise) {

                if(isset($history_location_wise['status'])){
                     $trip_status =  $history_location_wise['status'];
                }
              
                if($trip_status=="No"){
                    $all_history[] = $history_location_wise;
                  }
          
              
               
            }

			
		}

		return view('failtrips',compact('all_history'));

	}


	
}
?>