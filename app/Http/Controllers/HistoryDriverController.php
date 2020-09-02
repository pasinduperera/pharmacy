<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
class HistoryDriverController extends Controller
{
	public function index(){		

		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/nishanthataxi.json');

			$firebase = (new Factory)
			->withServiceAccount($serviceAccount)
			->withDatabaseUri('https://respectcab-live.firebaseio.com')
			->create();

		$database 		= $firebase->getDatabase();			
		$ref = $database->getReference('Driver_Earning_And_Commission2');
		// $subjects = $ref->getValue();
		// foreach ($subjects as $subject) {
		// 	$all_subject[] = $subject;
		// }

		$historys = $ref->getValue();
		foreach ($historys as $history) {
			$all_history[] = $history;
		}

		return view('history_driver',compact('all_history'));

	}


	
}
?>