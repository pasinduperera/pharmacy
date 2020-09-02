@extends('adminlte::page')

@section('content')

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

    <h4><b>Trip History.....</b></h4><br>
  
  								    {{csrf_field()}}
                       <!-- <div class="table-responsive" style=""> -->
                        <!-- <table id="example" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Trip ID</th>
                              <th>Trip StartDate</th>
                              <th>Trip StartTime</th>
                              <th>Trip Start Address</th>
                              <th>Trip EndDate</th>
                              <th>Trip EndTime</th>                              
                              <th>Trip Finish Address</th>
                              <th>Driver ID</th>
                              <th>Customer Mobile</th>
                              <th>Customer Email</th> 
                              <th>Distance From Apllication</th> 
                              <th>Trip time</th> 
                              <th>Trip Cost</th>                             
                              <th>Waiting time</th>
                              <th>Waiting Cost</th>
                              <th>Total Trip Cost</th>  
                              <th>Trip Commission</th>  
                            </tr>
                          </thead>
                          @foreach($all_history as $history)
                          <tbody>
                            <tr>
                              <th scope="row">{{$history['tripid']}}</th>
                              <th scope="row">{{$history['tripstartdate']}}</th>
                              <th scope="row">{{$history['tripstarttime']}}</th>
                              <th scope="row">{{$history['startaddress']}}</th>
                              <th scope="row">{{$history['tripenddate']}}</th>
                              <th scope="row">{{$history['tripendtime']}}</th>
                              <th scope="row">{{$history['endaddress']}}</th>
                              <th scope="row">{{$history['driverid']}}</th>
                              <th scope="row">{{$history['customermobile']}}</th>
                              <th scope="row">{{$history['customeremail']}}</th>
                              <th scope="row">{{$history['distanceapplication']}}</th>   
                              <th scope="row">{{$history['triptime']}}</th>   
                              <th scope="row">{{$history['tripcost']}}</th>   
                              <th scope="row">{{$history['waitingtime']}}</th>
                              <th scope="row">{{$history['waitingcost']}}</th>
                              <th scope="row">{{$history['triptotalcost']}}</th>
                              <th scope="row">{{$history['tripcommission']}}</th>                                   
                            </tr>
                           @endforeach
                            
                          </tbody>
                        </table> -->
                      <!-- </div>  -->



  <script src="https://www.gstatic.com/firebasejs/5.8.4/firebase.js"></script>    
    <script>
    $(document).ready(function() {
    $('#example').DataTable();
  });
  // Your web app's Firebase configuration
    var firebaseConfig = {
      apiKey: "AIzaSyBxAgYkVh28NMPcJNtb-aWzsl1uk0kj2P4",
      authDomain: "uberapp-fae8e.firebaseapp.com",
      databaseURL: "https://uberapp-fae8e.firebaseio.com",
      projectId: "uberapp-fae8e",
      storageBucket: "uberapp-fae8e.appspot.com",
      messagingSenderId: "48887736052",
      appId: "1:221259002980:web:52d35393d67efaf43cdb71",
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
  </script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection