<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
class VehicleController extends Controller
{
	public function index(){

		//live db connection
			// 	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/nishanthataxi.json');

			// $firebase = (new Factory)
			// ->withServiceAccount($serviceAccount)
			// ->withDatabaseUri('https://respectcab-live.firebaseio.com')
			// ->create();



	// test db json file if you want to test with test data

			$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/respect-cab-dev-firebase-adminsdk-fq12h-0a21c8e8a4.json');


		$firebase = (new Factory)
		->withServiceAccount($serviceAccount)
		->withDatabaseUri('https://respect-cab-dev.firebaseio.com')
		->create();

		$database 		= $firebase->getDatabase();	
		$ref = $database->getReference('Vehicles');
		// $subjects = $ref->getValue();
		// foreach ($subjects as $subject) {
		// 	$all_subject[] = $subject;
		// }

		$vehicles = $ref->getValue();
		foreach ($vehicles as $vehicle) {
			$all_vehicles[] = $vehicle;
		}

		return view('vehicle',compact('all_vehicles'));

	}


	public function addVehicle(Request $request){

		// $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/nishanthataxi.json');

		// 	$firebase = (new Factory)
		// 	->withServiceAccount($serviceAccount)
		// 	->withDatabaseUri('https://respect-cab-dev.firebaseio.com')
		// 	->create();

			// test db json file if you want to test with test data

			$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/respect-cab-dev-firebase-adminsdk-fq12h-0a21c8e8a4.json');


		$firebase = (new Factory)
		->withServiceAccount($serviceAccount)
		->withDatabaseUri('https://respect-cab-dev.firebaseio.com')
		->create();

		$database 		= $firebase->getDatabase();	
		$ref = $database->getReference('Vehicles');

		$vdname = $request->vdname;
		$vdl = $request->vdl;
		$vchn = $request->vchn;
		$venn = $request->venn;
		$vn = $request->vn;
		$key = $ref->push([])->getkey();

		$ref->getChild($key)->set([
			'Vehicles Driver Name' => $vdname,
			'Vehicles DL' => $vdl,
			'Vehicle CN' => $vchn,
			'Vehicle EN' => $venn,
			'Vehicle No' => $vn
		]);

		return back();

	}
}
?>