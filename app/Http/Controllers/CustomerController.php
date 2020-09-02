<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
class CustomerController extends Controller
{
	public function index(){		

		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/nishanthataxi.json');

			$firebase = (new Factory)
			->withServiceAccount($serviceAccount)
			->withDatabaseUri('https://respectcab-live.firebaseio.com')
			->create();

		$database 		= $firebase->getDatabase();	
		$ref = $database->getReference('Customers');
		// $subjects = $ref->getValue();
		// foreach ($subjects as $subject) {
		// 	$all_subject[] = $subject;
		// }

		$customers1 = $ref->getValue();
		//$customers1 = array_filter($customers); 
		foreach ($customers1 as $customer) {
			$all_customers[] = $customer;
		}

		return view('home2',compact('all_customers'));

	}


	public function addcustomers(Request $request){

		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/nishanthataxi.json');

			$firebase = (new Factory)
			->withServiceAccount($serviceAccount)
			->withDatabaseUri('https://respect-cab-dev.firebaseio.com')
			->create();

		$database 		= $firebase->getDatabase();	
		$ref = $database->getReference('Customers');

		
		$cname = $request->cname;
		$caddress = $request->caddress;
		$ctp = $request->ctp;
		$cemail = $request->cemail;
		$key = $ref->push([])->getkey();

		$ref->getChild($key)->set([
			'Customer Id' => $key,
			'Customer Name' => $cname,
			'Customer Address' => $caddress,
			'Customer TP' => $ctp,
			'Customer Email' => $cemail
		]);

		return back();

		// $subjects = $ref->getvalue();
		// foreach ($subjects as $subject) {
		// 	$all_subject[] = $subject;
		// }

		// return view('driver',compact('all_subject'));
	}
}
?>