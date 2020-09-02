@extends('adminlte::page')

@section('content')
<form class="form-horizontal" action="" method="post">
    <!-- <fieldset class="form-group floating-label-form-group">
      <label for="user-id" style="font-size:13pt;">User Name </label>
        <input type="text" class="form-control" id="user-id" placeholder="User Name">
    </fieldset>
    <fieldset class="form-group floating-label-form-group">
      <label for="user-password" style="font-size:13pt;">Password </label>
        <input type="password" class="form-control" id="user-password" placeholder="Enter Password">
    </fieldset><br/><br/> -->


     <div class="app-content content">
    <div class="content-wrapper">

      <div class="content-body">

        <!-- Basic tabs start -->

        <!-- Basic badge Input end -->
        <!-- Justified With Top Border start -->
        

          <div class="row match-height">
            <div class="col-lg-12 col-lg-12">
            	<strong><h3><center>Taxi App - Customer Registration</center></strong></h3>

                    
                              <div class="card-body" style="margin-left:-170px;">                                
                                  {{csrf_field()}}
                                    <fieldset class="form-group floating-label-form-group">
                                      <label for="cname" style="font-size:13pt;">Customer Name </label>
                                        <input type="text" class="form-control" id="cname" placeholder="Customer Name" name="cname"></input>                                      
                                      <label for="caddress" style="font-size:13pt;">Address </label>
                                        <input type="text" class="form-control" id="caddress" placeholder="Address" name="caddress"></input>
                                      <label for="ctp" style="font-size:13pt;">Phone No </label>
                                        <input type="text" class="form-control" id="ctp" placeholder="Phone No" name="ctp"></input>
                                      <label for="cemail" style="font-size:13pt;">Email </label>
                                        <input type="text" class="form-control" id="cemail" placeholder="Email" name="cemail"></input>
                                      
                                    </fieldset>
                                      

      <button style="width:10%;border-radius: 0px;" type="submit" class="btn btn-info btn-block"><i class="ft-user"></i> Save</button>
  </form>    
  								</div>	

  

<form action="" method="POST" class="users-remove-record-model">
    <div id="remove-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Delete Record</h4>
                    <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h4>You Want You Sure Delete This Record?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light deleteMatchRecord">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>                              
                                 
                            
                    <div class="card-body">
                      <strong><h2>View Customers Details</strong></h2>
                      <p>
                        <br><br>

                       <div class="table-responsive" style="margin-left:10px;">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Customer Name</th>
                              <th>Customer Email</th>
                              <th>Customer TP</th>
                              <th>#</th>
                              
                            </tr>
                          </thead>

                          @foreach($all_customers as $customer)
                          <tbody>
                            <tr>
                              <th scope="row">{{$customer['Customer Name']}}</th>
                              <td>{{$customer['Customer Email']}}</td>
                              <td>{{$customer['Customer TP']}}</td>
                              <td><a data-toggle="modal" data-target="#update-modal" class="btn btn-outline-success updateData" data-id="'+index+'">Update</a>
                                  <a data-toggle="modal" data-target="#remove-modal" class="btn btn-outline-danger removeData" data-id="'+index+'">Delete</a></td>
                            </tr>
                           @endforeach
                            
                          </tbody>
                        </table>
                      </div>  


                      <div class="table-responsive" style="margin-left:-70px;">

                      </div>
                    </div>
        
                </div>
              </div>
            </div>
          </div>
        </div>

        <form action="" method="POST" class="users-update-record-model form-horizontal">
    <div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Update Record</h4>
                    <button type="button" class="close update-data-from-delete-form" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body" id="updateBody">
                    <!-- <div class="form-group">
                      <label for="cname" class="col-md-12 col-form-label">Customer Name</label>
                      <div class="col-md-12">
                          <input type="text" class="form-control" id="cname" placeholder="{{$customer['Customer Name']}}" name="cname"></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ctp" class="col-md-12 col-form-label">Address</label>
                      <div class="col-md-12">
                          <input type="text" class="form-control" id="ctp" placeholder="{{$customer['Customer Address']}}" name="ctp"></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ctp" class="col-md-12 col-form-label">Email</label>
                      <div class="col-md-12">
                          <input type="text" class="form-control" id="ctp" placeholder="{{$customer['Customer Email']}}" name="ctp"></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ctp" class="col-md-12 col-form-label">Phone No</label>
                      <div class="col-md-12">
                          <input type="text" class="form-control" id="ctp" placeholder="{{$customer['Customer TP']}}" name="ctp"></input>
                      </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect update-data-from-delete-form" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success waves-effect waves-light updateUserRecord">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

      
@endsection
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/5.8.4/firebase.js"></script>    
    <script>
  // Your web app's Firebase configuration
    var config = {
    apiKey: "{{ config('services.firebase.api_key') }}",
    authDomain: "{{ config('services.firebase.auth_domain') }}",
    databaseURL: "{{ config('services.firebase.database_url') }}",
    storageBucket: "{{ config('services.firebase.storage_bucket') }}",
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

var lastIndex = 0;




var updateID = 0;
$('body').on('click', '.updateData', function() {
  updateID = $(this).attr('data-id');
  firebase.database().ref('users/' + updateID).on('value', function(snapshot) {
    var values = snapshot.val();
    var updateData = '<div class="form-group">\
            <label for="first_name" class="col-md-12 col-form-label">First Name</label>\
            <div class="col-md-12">\
                <input id="first_name" type="text" class="form-control" name="first_name" value="'+values.first_name+'" required autofocus>\
            </div>\
        </div>\
        <div class="form-group">\
            <label for="last_name" class="col-md-12 col-form-label">Last Name</label>\
            <div class="col-md-12">\
                <input id="last_name" type="text" class="form-control" name="last_name" value="'+values.last_name+'" required autofocus>\
            </div>\
        </div>';

        $('#updateDate').html(updateData);
  });
});

$('.updateUserRecord').on('click', function() {
  var values = $(".users-update-record-model").serializeArray();
  var postData = {
      first_name : values[0].value,
      last_name : values[1].value,
  };

  var updates = {};
  updates['/users/' + updateID] = postData;

  firebase.database().ref().update(updates);

  $("#update-modal").modal('hide');
});

$("body").on('click', '.removeData', function() {
  var id = $(this).attr('data-id');
  $('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
});

$('.deleteMatchRecord').on('click', function(){
  var values = $(".users-remove-record-model").serializeArray();
  var id = values[0].value;
  firebase.database().ref('Customers' + id).remove();
    $('body').find('.users-remove-record-model').find( "input" ).remove();
  $("#remove-modal").modal('hide');
});
$('.remove-data-from-delete-form').click(function() {
  $('body').find('.users-remove-record-model').find( "input" ).remove();
});





  </script>
@section('css')
  <!-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection