
@extends('adminlte::page')
<!--page level css starts-->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"> -->
<!--end of page level css-->

@section('content')

    <h4><b>Trip History</b></h4><br>
  
  								    {{csrf_field()}}
                       <!-- <div class="table-responsive" style=""> -->
                        <!-- <table border="1"  id="service_table" class="display">
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

                      <div style="overflow-x:auto;">
                      <table border="1"  id="service_table" class="display">
                      <!-- <table id="service_table" class="table table-striped table-bordered" style="width:100%"> -->
                      <thead>
                        <tr>
                        <th>Trip ID</th>
                        <th>Voucher Code</th>
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
                      <tbody>
                      <?php
                      foreach($all_history as $history){

                      
                      ?>
                        <tr>
                          
                          <td>{{$history['tripid']}}</td>
                          <td>{{$history['vouchercode']}}</td>
                          <td>{{$history['tripstartdate']}}</td>
                          <td>{{$history['tripstarttime']}}</td>
                          <td>{{$history['startaddress']}}</td>
                          <td>{{$history['tripenddate']}}</td>
                          <td>{{$history['tripendtime']}}</td>
                          <td>{{$history['endaddress']}}</td>
                          <td>{{$history['driverid']}}</td>
                          <td>{{$history['customermobile']}}</td>
                          <td>{{$history['customeremail']}}</td>
                          <td>{{$history['distanceapplication']}}</td>
                          <td>{{$history['triptime']}}</td>
                          <td>{{$history['tripcost']}}</td>
                          <td>{{$history['waitingtime']}}</td>
                          <td>{{$history['waitingcost']}}</td>
                          <td>{{$history['triptotalcost']}}</td>
                          <td>{{$history['tripcommission']}}</td>
                        </tr>
                        <?php
                        }

                        ?>

                      </tbody>
                    </table>
                      </div>
                   <!--Import jQuery before export.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>


<!--Data Table-->
<script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"  src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>




<!--Export table buttons-->
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js" ></script>
<script type="text/javascript"  src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>

<!--Export table button CSS-->

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">



  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/5.8.4/firebase.js"></script>    
    <script>
    //  $(document).ready(
    //     function() {
    //       $('#service_table').DataTable();
    //     });

        // $('#service_table').dataTable();

        $('#service_table').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'csv', 'excel', 'pdf','print'
                        ]
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



@endsection