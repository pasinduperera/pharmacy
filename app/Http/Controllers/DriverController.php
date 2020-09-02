<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class DriverController extends Controller
{
	public function index(){
		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/nishanthataxi.json');

			$firebase = (new Factory)
			->withServiceAccount($serviceAccount)
			->withDatabaseUri('https://respectcab-live.firebaseio.com')
			->create();

		$database 		= $firebase->getDatabase();	
		$ref = $database->getReference('Drivers');


		$drivers = $ref->getValue();
		foreach ($drivers as $driver) {
			$all_drivers[] = $driver;
		}

		return view('driver',compact('all_drivers'));

	}

	public function addDriver(Request $request){

		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/nishanthataxi.json');

			$firebase = (new Factory)
			->withServiceAccount($serviceAccount)
			->withDatabaseUri('https://respectcab-c47d9.firebaseio.com')
			->create();

		$database 		= $firebase->getDatabase();	
		$ref = $database->getReference('Drivers');

		$dname = $request->dname;
		$daddress = $request->daddress;
		$dtp = $request->dtp;
		$ddob = $request->ddob;
		$dgender = $request->dgender;
		$dnicimage = $request->dnicimage;
		$ddlimage = $request->ddlimage;
		$demail = $request->demail;
		$dnic = $request->dnic;
		$ddl = $request->ddl;
		$dimage = $request->dimage;
		$dage = $request->dage;
		$dbankname = $request->dbankname;
		$daccountno = $request->daccountno;

		$key = $ref->push([])->getkey();

		$ref->getChild($key)->set([
			'SubjectName' => $dname,
			'DriverAddress' => $daddress,
			'DriverMobile' => $dtp,
			'DriverBirthday' => $ddob,
			'DriverNICImage' => $dnicimage,
			'DriverEmial' => $demail,
			'DriverMIC' => $dnic,
			'DriverDriverLicence' => $ddl,
			'DriverImage' => $dimage,
			'DriverAge' => $dage,
			'DrivingLicenceImage' => $ddlimage,
			'Driver Gender' => $dgender,
			'Driver Bank Name' => $dbankname,
			'Driver Account No' => $daccountno
		]);
		
		return back()->with('key', 'You have done successfully');

	}


}
?>