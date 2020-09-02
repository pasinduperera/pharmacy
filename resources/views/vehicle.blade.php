<!doctype html>

@extends('adminlte::page')

@section('content')

<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-4">

    <h4><b>Vehicle Registration</b></h4><br>

    <h5># Add Vehicle</h5>
    <div class="card card-default">
        <div class="card-body">
            <form id="addCustomer" class="form-inline" method="POST" action="">

                <div class="form-group mb-2">
                    <label for="name" class="sr-only">Vehicle Owner Name</label>
                    <input id="name" type="text" class="form-control" name="name" placeholder="Vehicle Owner Name"
                           required autofocus/><br>
                </div>                
                {{csrf_field()}}
                <div class="form-group mx-sm-3 mb-2">
                    <label for="vdidname" class="sr-only">Vehicle Driver ID</label>                
                  <select>
                    @foreach($all_history as $history)
                    <option  id="vdidname" type="vdidname" class="form-control" name="vdidname" value="">{{$history['index']}}</option>
                    @endforeach
                  </select>                
                </div>
                {{csrf_field()}}
                <div class="form-group mx-sm-3 mb-2">
                    <label for="vdname" class="sr-only">Vehicle Driver Name</label>
                    <select>
                    @foreach($all_history as $history)
                    <option  id="vdname" type="vdname" class="form-control" name="vdname" value="">{{$history['dmiddlename']}}</option>
                    @endforeach
                  </select>
                </div> 
                              
                <div class="form-group mx-sm-3 mb-2">
                    <label for="vchassyno" class="sr-only">Chassy No</label>
                    <input id="vchassyno" type="vchassyno" class="form-control" name="vchassyno" placeholder="Chassy No"
                           required autofocus/>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="engineno" class="sr-only">Engine No</label>
                    <input id="engineno" type="engineno" class="form-control" name="engineno" placeholder="Engine No"
                           required autofocus/>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="plateno" class="sr-only">Plate No</label>
                    <input id="plateno" type="plateno" class="form-control" name="plateno" placeholder="Plate No"
                           required autofocus/>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="vehicletype" class="sr-only">Vehicle Type</label>
                    <select name="vehicletype">
                         <option>Vehicle type</option>
                         <option value="Alto">Alto</option>
                         <option value="Mini">Mini</option>
                         <option value="MiniVan">MiniVan</option>
                         <option value="Car">Car</option>
                         <option value="Van">Van</option>                         
                    </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="charges" class="sr-only">Charges</label>
                    <input id="charges" type="charges" class="form-control" name="charges" placeholder="charges"
                           required autofocus/>
                </div>
                <button id="submitCustomer" type="button" class="btn btn-primary mb-2" display="block">Submit</button>
            </form>
        </div>
    </div>
</div>
    <br>
<div class="col-md-8">
    <div class="table-responsive" style="">
        <table  class="table table-striped">
        <tr>
            <th>Vehicle ID</th>
            <th>Driver Owner Name</th>
            <th>Vehicle Driver ID</th>
            <th>Vehicle Driver Name</th>
            <th>Chassy No</th>
            <th>Engine No</th>
            <th>Plate No</th>
            <th>Action</th>
        </tr>
        <tbody id="tbody">

        </tbody>
    </table>
    </div>
</div>

<!-- Update Model -->
<form action="" method="POST" class="users-update-record-model form-horizontal">
    <div id="update-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Update</h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body" id="updateBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                            data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn btn-success updateCustomer" data-dismiss="modal">Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Delete Model -->
<form action="" method="POST" class="users-remove-record-model">
    <div id="remove-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Delete</h4>
                    <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you want to delete this record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"
                            data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn btn-danger waves-effect waves-light deleteRecord" data-dismiss="modal">Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


{{--Firebase Tasks--}}
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        apiKey: "{{ config('services.firebase.api_key') }}",
        authDomain: "{{ config('services.firebase.auth_domain') }}",
        databaseURL: "{{ config('services.firebase.database_url') }}",
        storageBucket: "{{ config('services.firebase.storage_bucket') }}",
        appId: "1:221259002980:web:52d35393d67efaf43cdb71",
    };

    firebase.initializeApp(config);

    var database = firebase.database();

    var lastIndex = 0;

    // Get Data
    firebase.database().ref('vehicle/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value) {
                htmls.push('<tr>\
                <td>' + index + '</td>\
                <td>' + value.name + '</td>\
                <td>' + value.vdidname + '</td>\
                <td>' + value.vdname + '</td>\
                <td>' + value.vchassyno + '</td>\
                <td>' + value.engineno + '</td>\
                <td>' + value.plateno + '</td>\
                <td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateData"  style="width:.5%" data-id="' + index + '"><i class="fa fa-refresh"></i></button>\
            <button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeData"  style="width:.5%" data-id="' + index + '"><i class="fa fa-trash"></i></button></td>\
          </tr>');
            }
            lastIndex = index;
        });
        $('#tbody').html(htmls);
        $("#submitUser").removeClass('desabled');
    });

    // Add Data
    $('#submitCustomer').on('click', function () {
        var values = $("#addCustomer").serializeArray();
        var name = values[0].value;
        var vdidname = values[1].value;
        var vdname = values[2].value;
        var vchassyno = values[3].value;
        var engineno = values[4].value;
        var plateno = values[5].value;
        var vehicletype = values[6].value;
        var charges = values[7].value;
        var userID = lastIndex + 1;

        console.log(values);

        firebase.database().ref('vehicle/' + userID).set({
            name: name,
            vdidname: vdidname,
            vdname: vdname,
            vchassyno: vchassyno,
            engineno: engineno,
            plateno: plateno,
            vehicletype: vehicletype,
            charges: charges,
        });

        // Reassign lastID value
        lastIndex = userID;
        $("#addCustomer input").val("");
    });

    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateData', function () {
        updateID = $(this).attr('data-id');
        firebase.database().ref('vehicle/' + updateID).on('value', function (snapshot) {
            var values = snapshot.val();
            var updateData = '<div class="form-group">\
                <label for="name" class="col-md-12 col-form-label">Name</label>\
                <div class="col-md-12">\
                    <input id="name" type="text" class="form-control" name="name" value="' + values.name + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="vdidname" class="col-md-12 col-form-label">Vehicle Driver Name</label>\
                <div class="col-md-12">\
                    <input id="vdid" type="text" class="form-control" name="vdidname" value="' + values.vdidname + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="vdname" class="col-md-12 col-form-label">Vehicle Driver Name</label>\
                <div class="col-md-12">\
                    <input id="vdname" type="text" class="form-control" name="vdname" value="' + values.vdname + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="vchassyno" class="col-md-12 col-form-label">Chassy No</label>\
                <div class="col-md-12">\
                    <input id="vchassyno" type="text" class="form-control" name="vchassyno" value="' + values.vchassyno + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="engineno" class="col-md-12 col-form-label">Engine No</label>\
                <div class="col-md-12">\
                    <input id="engineno" type="text" class="form-control" name="engineno" value="' + values.engineno + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="plateno" class="col-md-12 col-form-label">Chassy No</label>\
                <div class="col-md-12">\
                    <input id="plateno" type="text" class="form-control" name="plateno" value="' + values.plateno + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="vehicletype" class="col-md-12 col-form-label">vehicletype</label>\
                <div class="col-md-12">\
                    <input id="vehicletype" type="text" class="form-control" name="vehicletype" value="' + values.vehicletype + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="charges" class="col-md-12 col-form-label">charges</label>\
                <div class="col-md-12">\
                    <input id="charges" type="text" class="form-control" name="charges" value="' + values.charges + '" required autofocus>\
                </div>\
            </div>';

            $('#updateBody').html(updateData);
        });
    });

    $('.updateCustomer').on('click', function () {
        var values = $(".users-update-record-model").serializeArray();
        var postData = {
            name: values[0].value,
            vdidname: values[1].value,
            vdname: values[2].value,
            vchassyno: values[3].value,
            engineno: values[4].value,
            plateno: values[5].value,
            vehicletype: values[6].value,
            charges: values[7].value,
        };

        var updates = {};
        updates['/vehicle/' + updateID] = postData;

        firebase.database().ref().update(updates);

        $("#update-modal").modal('hide');
    });

    // Remove Data
    $("body").on('click', '.removeData', function () {
        var id = $(this).attr('data-id');
        $('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="' + id + '">');
    });

    $('.deleteRecord').on('click', function () {
        var values = $(".users-remove-record-model").serializeArray();
        var id = values[0].value;
        firebase.database().ref('vehicle/' + id).remove();
        $('body').find('.users-remove-record-model').find("input").remove();
        $("#remove-modal").modal('hide');
    });
    $('.remove-data-from-delete-form').click(function () {
        $('body').find('.users-remove-record-model').find("input").remove();
    });

 //    $("#vdid").change(function()  {
 //   var param = {vdid: vdid};

 //   $.ajax({
 //     url: 'https://respect-cab-dev.firebaseio.com/.json',
 //     type: "POST",
 //     data: JSON.stringify(param),
 //     success: function () {
 //       alert("success");
 //     },
 //     error: function(error) {
 //       alert("error: "+error);
 //     }
 //   });
 // });

</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection