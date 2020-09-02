<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
//VoucherHistoryController extends
class  Controller
{
	public function index(){		

		// live db json file if you want to test with live data

		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/nishanthataxi.json');


		$firebase = (new Factory)
			->withServiceAccount($serviceAccount)
			->withDatabaseUri('https://respectcab-live.firebaseio.com')
			->create();
		   	$ref = $firebase->getDatabase()->getReference('DriverHistory_Model')->orderByKey("vouchercode");
		$historys_old = $ref->getValue();
		$historys = array_filter($historys_old);   
		foreach ($historys as $history) {
		$all_history[] = $history;
		}
		return view('voucherhistory',compact('all_history'));

	}	
}
?>