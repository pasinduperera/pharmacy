@extends('adminlte::page')
@section('style')
<style type="text/css">
.desabled {
  pointer-events: none;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
<!--       <div class="col-md-4">
        <div class="card card-default">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <strong>Add User</strong>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
      </div> -->
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <strong>All Users Listing</strong>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Customer Name</th>
                            <th>Customer Address</th>
                            <th width="180" class="text-center">Action</th>
                        </tr>
                        <tbody id="tbody">
                          
                        </tbody>  
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Model -->
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

<!-- Update Model -->
<form action="" method="POST" class="users-update-record-model form-horizontal">
    <div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Update Record</h4>
                    <button type="button" class="close update-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" id="updateBody">
                    
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
  <script src="https://www.gstatic.com/firebasejs/5.8.4/firebase.js"></script>    
    <script>
  // Your web app's Firebase configuration
    var firebaseConfig = {
      apiKey: "{{ config('services.firebase.api_key') }}",
        authDomain: "{{ config('services.firebase.auth_domain') }}",
        databaseURL: "{{ config('services.firebase.database_url') }}",
        storageBucket: "{{ config('services.firebase.storage_bucket') }}",
        appId: "1:221259002980:web:52d35393d67efaf43cdb71",
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);


    var database = firebase.database();


// Get Data

firebase.database().ref('Customers').on('value', function(snapshot) {
    var value = snapshot.val();
    var htmls = [];
    $.each(value, function(index, value){
      if(value) {
        htmls.push('<tr>\
            <td>'+ value.caddress +'</td>\
            <td>'+ value.caddress +'</td>\
            <td><a data-toggle="modal" data-target="#update-modal" class="btn btn-outline-success updateData" data-id="'+index+'">Update</a>\
            <a data-toggle="modal" data-target="#remove-modal" class="btn btn-outline-danger removeData" data-id="'+index+'">Delete</a></td>\
          </tr>');
      }     
      lastIndex = index;
    });
    $('#tbody').html(htmls);
    $("#submitUser").removeClass('desabled');
});


// Add Data
$('#submitUser').on('click', function(){
  var values = $("#addUser").serializeArray();
  var first_name = values[0].value;
  var last_name = values[1].value;
  var userID = lastIndex+1;

    firebase.database().ref('Customers').set({
        first_name: caddress,
        last_name: ctp,
    });

    // Reassign lastID value
    lastIndex = userID;
  $("#addUser input").val("");
});

// Update Data
var updateID = 0;
$('body').on('click', '.updateData', function() {
  updateID = $(this).attr('data-id');
  firebase.database().ref('Customers/').on('value', function(snapshot) {
    var values = snapshot.val();
    var updateData = '<div class="form-group">\
            <label for="cname" class="col-md-12 col-form-label">First Name</label>\
            <div class="col-md-12">\
                <input type="text" class="form-control" id="cname" placeholder="Customer Name" name="cname"></input>\
            </div>\
        </div>\
        <div class="form-group">\
            <label for="ctp" class="col-md-12 col-form-label">Last Name</label>\
            <div class="col-md-12">\
                <input type="text" class="form-control" id="ctp" placeholder="Phone No" name="ctp"></input>\
            </div>\
        </div>';

        $('#updateBody').html(updateData);
  });
});

$('.updateUserRecord').on('click', function() {
  var values = $(".users-update-record-model").serializeArray();
  var postData = {
      caddress : values[0].value,
      ctp : values[1].value,
  };

  var updates = {};
  updates['Customers/' + updateID] = postData;

  firebase.database().ref().update(updates);

  $("#update-modal").modal('hide');
});


// Remove Data
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
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection