<?php
/* author banarsiamin@gmail.com
* Add all functionality
* add yuour sourceCredentials  And userCredentials 
* @file
* @author Amin KHAN
* Provides route responses for the Example module.
*/
ini_set("soap.wsdl_cache_enabled", 0);
ini_set("user_agent", "FOOBAR");
class MINDBODY_API 
{
	/*
	*WSDL Is xml AND NWSDL simple 
	*/
	public $appointmentServiceWSDL = "https://api.mindbodyonline.com/0_5/AppointmentService.asmx?WSDL";
	public $appointmentServiceNWSDL = "https://api.mindbodyonline.com/0_5/AppointmentService.asmx";
	public $classServiceWSDL = "https://api.mindbodyonline.com/0_5/ClassService.asmx?WSDL";
	public $classServiceNWSDL = "https://api.mindbodyonline.com/0_5/ClassService.asmx";
	public $clientServiceWSDL = "https://api.mindbodyonline.com/0_5/ClientService.asmx?WSDL";
	public $clientServiceNWSDL = "https://api.mindbodyonline.com/0_5/ClientService.asmx";
	public $dataServiceWSDL = "https://api.mindbodyonline.com/0_5/DataService.asmx?WSDL";
	public $dataServiceNWSDL = "https://api.mindbodyonline.com/0_5/DataService.asmx";
	public $finderServiceWSDL = "https://api.mindbodyonline.com/0_5/FinderService.asmx?WSDL";
	public $finderServiceNWSDL = "https://api.mindbodyonline.com/0_5/FinderService.asmx";
	public $saleServiceWSDL = "https://api.mindbodyonline.com/0_5/SaleService.asmx?WSDL";
	public $saleServiceNWSDL = "https://api.mindbodyonline.com/0_5/SaleService.asmx";
	public $siteServiceWSDL = "https://api.mindbodyonline.com/0_5/SiteService.asmx?WSDL";
	public $siteServiceNWSDL = "https://api.mindbodyonline.com/0_5/SiteService.asmx";
	public $staffServiceWSDL = "https://api.mindbodyonline.com/0_5/StaffService.asmx?WSDL";
	public $staffServiceNWSDL = "https://api.mindbodyonline.com/0_5/StaffService.asmx";
	private $client;
	protected $sourceCredentials = array("SourceName"=>'your SourceName', "Password"=>'your Password=', "SiteIDs"=>array('int'=>-9999));
	protected $userCredentials = array("Username"=>'Siteowner', "Password"=>'Siteowner', "SiteIDs"=>array('int'=>-9999));
		
	// CLASS SERVICE //
	function getClasses($params = array()) {
		$this->client = new SoapClient( $this->classServiceWSDL, array("soap_version"=>SOAP_1_1, 'trace'=>true, 
		'exceptions'=>FALSE, "location" => $this->classServiceNWSDL,
	   "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try 
		{
			$result = $this->client->GetClasses(array("Request"=>$request));
		} catch (SoapFault $s) {
				echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
				echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	
	//  GetClassSchedules : - Gets a list of class schedules.  //
	function getClassSchedules($params = array()) {
		$this->client = new SoapClient( $this->classServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->classServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try 
		{
			$result = $this->client->GetClassSchedules(array("Request"=>$request));
		} catch (SoapFault $s) {
				echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
				echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}

	
	function getXMLRequest() {
		return $this->client->__getLastRequest();
	}
	
	function getXMLResponse() {

		return $this->client->__getLastResponse();
	}
	
    /*************************************
     *	Staff Service
	 *	Provides methods and attributes relating to staff.
	 *	The following operations are supported. For a formal definition, please review the Service Description.
     **********************************************************************************************************/
	
	/*
	*   AddOrUpdateStaff :-  Add or update staff.1712 16894
	*/
	function addOrUpdateStaff($params = array()) {
		$this->client = new SoapClient($this->staffServiceWSDL, array('soap_version'=>SOAP_1_1, 'Test'=>FALSE, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->staffServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try { 
				$result = $this->client->AddOrUpdateStaff(array("Request"=>$request)); 
		} 
		catch (SoapFault $s) {	echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;} 
		catch (Exception $e) {	echo 'ERROR: ' . $e->getMessage();	}
		return $result;
	}
	/*
	*   GetStaff :-  Gets a list of staff members.
	*/
	function getStaff($params = array()) {
		$this->client = new SoapClient($this->staffServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->staffServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try { 
				$result = $this->client->GetStaff(array("Request"=>$request)); 
		} 
		catch (SoapFault $s) {echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;} 
		catch (Exception $e) {	echo 'ERROR: ' . $e->getMessage();	}
		return $result;
	}
	/*	
	*   GetStaffImgURL :- Gets a staff member's image URL if it exists.
	*/
	function getStaffImgURL($params = array()) {
		$this->client = new SoapClient($this->staffServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->staffServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try { 
				$result = $this->client->GetStaffImgURL(array("Request"=>$request)); 
		} 
		catch (SoapFault $s) {echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;} 
		catch (Exception $e) {	echo 'ERROR: ' . $e->getMessage();	}
		return $result;
	}
	/*
	*   GetStaffPermissions :- Gets a list of staff permissions based on the given staff member.
	*/
	function getStaffPermissions($params = array()) {
		$this->client = new SoapClient($this->staffServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->staffServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try { 
				$result = $this->client->GetStaffPermissions(array("Request"=>$request)); 
		} 
		catch (SoapFault $s) {echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;} 
		catch (Exception $e) {	echo 'ERROR: ' . $e->getMessage();	}
		return $result;
	}
	/*
	*   ValidateStaffLogin :-  Validates a username and password. This method returns the staff on success. 
	*/
	function validateStaffLogin($params = array()) {
		$this->client = new SoapClient($this->staffServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->staffServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try { 
				$result = $this->client->ValidateStaffLogin(array("Request"=>$request)); 
		} 
		catch (SoapFault $s) {echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;} 
		catch (Exception $e) {	echo 'ERROR: ' . $e->getMessage();	}
		return $result;
	}
	
	/**************END STAFF******************/
	
	/***************************************************/
	/**************Appointments STAFF******************/
	/*************************************************/
    
	//  GetStaffAppointments :- Gets a list of appointments that a given staff member is instructing. //
	function GetStaffAppointments($params = array()) {
		$this->client = new soapClient( $this->appointmentServiceWSDL, array("soap_version"=>SOAP_1_1, 'encoding'=>'UTF-8', 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->appointmentServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		
		try 
		{
			
			$result = $this->client->GetStaffAppointments(array("Request"=>$request));
			
		} catch (SoapFault $s) {
				echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
				echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	//  GetClassSchedules : - Gets a list of class schedules.  //
	function getScheduleItems($params = array()) {
		$this->client = new soapClient( $this->appointmentServiceWSDL, array("soap_version"=>SOAP_1_1, 'encoding'=>'UTF-8', 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->appointmentServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try 
		{
			$result = $this->client->GetScheduleItems(array("Request"=>$request));
		} catch (SoapFault $s) {
				echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
				echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	//  GetBookableItems  : - Gets a list of class schedules.     //
	function getBookableItems($params = array()) {
		$this->client = new soapClient( $this->appointmentServiceWSDL, array("soap_version"=>SOAP_1_1, 'encoding'=>'UTF-8', 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->appointmentServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try 
		{  // $client->GetActivationCode(array("Request"=>$request));
			$result = $this->client->GetBookableItems (array("Request"=>$request));
		} catch (SoapFault $s) {
				echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
				echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	/*AddOrUpdateAppointments  :- Adds or updates a list of appointments.*/
	function addUpdateAppointments($params = array()) {
		$this->client = new soapClient( $this->appointmentServiceWSDL, array("soap_version"=>SOAP_1_1, 'encoding'=>'UTF-8', 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->appointmentServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try 
		{
			$result = $this->client->AddOrUpdateAppointments(array("Request"=>$request));
		} catch (SoapFault $s) {
				echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
				echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	/* AddOrUpdateAvailabilities :- Adds or updates a list of availabilities.*/
	function addUpdateAvailabilities($params = array()) {
		$this->client = new soapClient( $this->appointmentServiceWSDL, array("soap_version"=>SOAP_1_1, 'encoding'=>'UTF-8', 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->appointmentServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try 
		{    
			$result = $this->client->AddOrUpdateAvailabilities(array("Request"=>$request));
		} catch (SoapFault $s) {
				echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
				echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	/************** END Appointments STAFF******************/
	
	/************** START Service******************/
	
	/* AddOrUpdateContactLogs   :- Add or update client contact logs..*/
		function AddOrUpdateContactLogs ($params = array()) {
		$this->client = new SoapClient($this->clientServiceWSDL, array("soap_version"=>SOAP_1_1,'location'=>$this->clientServiceNWSDL, 'trace'=>true, 'exceptions'=>FALSE, "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try {
			$result = $this->client->AddOrUpdateContactLogs (array("Request"=>$request));
		} catch (SoapFault $s) {
	    	echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	/* GetClients :- Gets a list of clients..*/
	function getClients($params = array()) {
		$this->client = new SoapClient($this->clientServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->clientServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		//$result = $client->GetActivationCode(array("Request"=>$request));
		try {
			$result = $this->client->GetClients(array("Request"=>$request));
		} catch (SoapFault $s) {
	    	echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}

	/* GetClientIndexes  :-Gets a list of currently available client indexes.*/
	function GetClientIndexes ($params = array()) {
		$this->client = new SoapClient($this->clientServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->clientServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try {
			$result = $this->client->GetClientIndexes (array("Request"=>$request));
		} catch (SoapFault $s) {
	    	echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	/* GetClientPurchases   :-Get purchases for a client.*/
	function GetClientPurchases ($params = array()) {
		$this->client = new SoapClient($this->clientServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->clientServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try {
			$result = $this->client->GetClientPurchases (array("Request"=>$request));
		} catch (SoapFault $s) {
	    	echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	/* GetClientVisits    :-Get purchases for a client.*/
	function GetClientVisits ($params = array()) {
		$this->client = new SoapClient($this->clientServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->clientServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try {
			$result = $this->client->GetClientVisits (array("Request"=>$request));
		} catch (SoapFault $s) {
	    	echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	/* GetClientServices     :-Get purchases for a client.*/
	function getClientServices ($params = array()) {
		$this->client = new SoapClient($this->clientServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->clientServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try {
			$result = $this->client->GetClientServices (array("Request"=>$request));
		} catch (SoapFault $s) {
	    	echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	/* AddOrUpdateClients     :-Get purchases for a client.*/
	function addOrUpdateClients ($params = array()) {
		$this->client = new SoapClient($this->clientServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->clientServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try {
			$result = $this->client->AddOrUpdateClients (array("Request"=>$request));
		} catch (SoapFault $s) {
	    	echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	/************** END Service******************/
	
	/***************************************************/
	/**************Site *******************************/
	/*************************************************/
    
	//  GetSites :- Gets a list of appointments that a given staff member is instructing. //
	function getSites($params = array()) {
		$this->client = new soapClient( $this->siteServiceWSDL, array("soap_version"=>SOAP_1_1, 'encoding'=>'UTF-8', 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->siteServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try 
		{
			$result = $this->client->GetSites(array("Request"=>$request));
			
		} catch (SoapFault $s) {
				echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
				echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	
		//  GetClassSchedules : - Gets a list of class schedules.  //
	function getActiveClientMemberships($params = array()) {
		$this->client = new SoapClient( $this->clientServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->clientServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials),$params);
		try 
		{
			$result = $this->client->GetActiveClientMemberships(array("Request"=>$request));
		} catch (SoapFault $s) {
				echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
				echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	//  GetClassSchedules : - Gets a list of class schedules.  //
	function getPackages($params = array()) {
		$this->client = new SoapClient( $this->staffServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->staffServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try 
		{
			$result = $this->client->GetStaff(array("Request"=>$request));
		} catch (SoapFault $s) {
				echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
				echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	/* UpdateClientServices     :-Get purchases for a client.*/
	function updateClientServices($params = array()) {
		$this->client = new SoapClient($this->clientServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->clientServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try {
			$result = $this->client->UpdateClientServices(array("Request"=>$request));
		} catch (SoapFault $s) {
	    	echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	function getClientContracts($params = array()) {
		$this->client = new SoapClient($this->clientServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->clientServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try {
			$result = $this->client->GetClientContracts(array("Request"=>$request));
		} catch (SoapFault $s) {
	    	echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	
	/************** END Service******************/
	
	function addArrival($params = array()) {
		$this->client = new SoapClient( $this->clientServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->clientServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials),$params);
		try 
		{
			$result = $this->client->AddArrival(array("Request"=>$request));
		} catch (SoapFault $s) {
				echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
				echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	
	/* CheckoutShoppingCart      :-Get purchases for a client.*/
	
	/************** END CheckoutShoppingCart******************/
		/* GetPackages      :-Get Sale client .*/
	function getPackagesSale($params = array()) {
		$this->client = new SoapClient($this->saleServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->saleServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials),$params);
		try {
			$result = $this->client->GetPackages(array("Request"=>$request));
		} catch (SoapFault $s) {
	    	echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	/************** END GetPackages******************/
	/* GetProducts      :-Get GetProducts .*/
	function getProducts($params = array()) {
		$this->client = new SoapClient($this->saleServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->saleServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials),$params);
		try {
			$result = $this->client->GetProducts(array("Request"=>$request));
		} catch (SoapFault $s) {
	    	echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
	/************** END GetPackages******************/
	
	function checkoutShoppingCart($params = array()) {
		$this->client = new SoapClient($this->saleServiceWSDL, array('soap_version'=>SOAP_1_1, 'trace'=>true, 'exceptions'=>FALSE, "location" => $this->saleServiceNWSDL,
		 "stream_context" => stream_context_create( array( 'ssl' => array('verify_peer'=> false,'allow_self_signed' => FALSE)))));
		$request = array_merge(array("SourceCredentials"=>$this->sourceCredentials, "UserCredentials"=>$this->userCredentials),$params);
		try {
			$result = $this->client->CheckoutShoppingCart(array("Request"=>$request));
		} catch (SoapFault $s) {
	    	echo 'ERROR: [' . $s->faultcode . '] ' . $s->faultstring;
		} catch (Exception $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}
		return $result;
	}
}
echo "<PRE>";
$mindb 		= new MINDBODY_API(); 
print_r($mindb->GetClientContracts(array('ClientID'=>100000528))); 
$checkout	= $mindb->checkoutShoppingCart(
			array( 'ClientID' => 100000528,
					'CartID' => 124, 
					'InStore' => true,
					'Test' => true,    // Here 
					'SendEmail' => true,
					'CartItems' => array(
						'CartItem' => array(
							'Quantity' => 1,
							'Item' => new SoapVar(
									array('ID' => 124), SOAP_ENC_ARRAY, 'Service', 'http://clients.mindbodyonline.com/api/0_5'
							),
							'DiscountAmount' => 0
						)
					),
					'Payments' => array(
						'PaymentInfo' => new SoapVar(
								array(
									'CreditCardNumber' => '4242424242424242',
									'ExpYear' => '2019',
									'ExpMonth' => '03',
									'Amount' => 0,
									'BillingAddress' => 'indore',
									'BillingPostalCode' => '93401',
									'BillingCity'=>'indore',
									'BillingState'=>'CA',
									'BillingName'=>'Amin321 Aminkhanb321',
									//'ID'=>205
								), SOAP_ENC_ARRAY, 'CreditCardInfo', 'http://clients.mindbodyonline.com/api/0_5'
						)
					)
				));
			

print_r($checkout);  die("test Amin khan");



															




?>