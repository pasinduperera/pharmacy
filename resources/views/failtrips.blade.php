@extends('adminlte::page')
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
@section('content')

    <h4><b>Failed Trip History</b></h4><br>
  
  								    {{csrf_field()}}
                       
                      <div style="overflow-x:auto;">
                      <table border="1"  id="service_table" class="display">
                      <thead>
                        <tr>
                            <th>Driver ID</th>
                              <th>Date</th> 
                              <th>Trip Start Address</th>
                              <th>Trip End Address</th>
                              <th>Trip Start Time</th>
                              <th>Trip Status</th>                              
                              <th>Trip Total Distance</th>
                              <th>Trip Cost</th>
                              <th>Trip Time</th>                    
                              <th>Waiting time</th>
                              <th>Waiting Cost</th>  
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      foreach($all_history as $history){
                      
                      
                      ?>
                        <tr>
                          
                          <td><?php echo $history['Driver ID'];?></td>
                          <td><?php if(isset($history['date'])){echo $history['date'];}?></td>

                          
                          <td><?php if(isset($history['startaddress'])){echo $history['startaddress'];}?></td>

                          <td><?php if(isset($history['endaddress'])){echo $history['endaddress'];}?></td>
                          <td><?php if(isset($history['starttime'])){echo $history['starttime'];}?></td>
                          <td><?php if(isset($history['status'])){echo $history['status'];}?></td>
                          <td><?php if(isset($history['totaldistance'])){echo $history['totaldistance'];}?></td>
                          <td><?php if(isset($history['tripcost'])){echo $history['tripcost'];}?></td>
                          <td><?php if(isset($history['triptime'])){echo $history['triptime'];}?></td>
                          <td><?php if(isset($history['waitingtime'])){echo $history['waitingtime'];}?></td>
                          <td><?php if(isset($history['waitingcost'])){echo $history['waitingcost'];}?></td>
                       
                          
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




  <script src="https://www.gstatic.com/firebasejs/5.8.4/firebase.js"></script>    
    <script>

$('#service_table').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'csv', 'excel', 'pdf', 'print'
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection