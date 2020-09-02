<!doctype html>

@extends('adminlte::page')

@section('content')

<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-4">

    <h4><b>Vehicle Type Registration</b></h4><br>

    <h5># Add Vehicle Type</h5>
    <div class="card card-default">
        <div class="card-body">
            <form id="addCustomer" class="form-inline" method="POST" action="">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="vehicletype" class="sr-only">Vehicle Type</label>
                        <select name="vehicletype">
                             <option>Vehicle type</option>
                             <option value="Alto">Alto</option>
                             <option value="Mini">Mini</option>
                             <option value="Car">Car</option>
                             <option value="Van">Van</option>
                             <option value="MiniVan">MiniVan</option>                         
                        </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="charges" class="sr-only">Extra Charge/KM</label>
                    <input id="charges" type="charges" class="form-control" name="charges" placeholder="extra charge/KM"
                           required autofocus/>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="initialcharge" class="sr-only">Initial Charge</label>
                    <input id="initialcharge" type="initialcharge" class="form-control" name="initialcharge" placeholder="initialcharge"
                           required autofocus/>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="initialdistance" class="sr-only">Initial Distance</label>
                    <input id="initialdistance" type="initialdistance" class="form-control" name="initialdistance" placeholder="initialdistance"
                           required autofocus/>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="waitingcost" class="sr-only">Waiting cost</label>
                    <input id="waitingcost" type="waitingcost" class="form-control" name="waitingcost" placeholder="waitingcost"
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
            <th>Vehicle type</th>
            <th>Extra charge/KM</th>
            <th>Initial charge</th>
            <th>Initial distance</th>
            <th>Waiting charge</th>
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
    firebase.database().ref('vehicletype/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value) {
                htmls.push('<tr>\
                <td>' + index + '</td>\
                <td>' + value.vehicletype + '</td>\
                <td>' + value.charges + '</td>\
                <td>' + value.initialcharge + '</td>\
                <td>' + value.initialdistance + '</td>\
                <td>' + value.waitingcost + '</td>\
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
        var vehicletype = values[0].value;
        var charges = values[1].value;
        var initialcharge = values[2].value;
        var initialdistance = values[3].value;
        var waitingcost = values[4].value;
        var userID = lastIndex + 1;

        console.log(values);

         firebase.database().ref('vehicletype/' + userID).set({
            vehicletype: vehicletype,
            charges: charges,
            initialcharge: initialcharge,
            initialdistance: initialdistance,
            waitingcost: waitingcost,
        });

        // Reassign lastID value
        lastIndex = userID;
        $("#addCustomer input").val("");
    });

    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateData', function () {
        updateID = $(this).attr('data-id');
        firebase.database().ref('vehicletype/' + updateID).on('value', function (snapshot) {
            var values = snapshot.val();
            var updateData = '<div class="form-group">\
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
            </div>\
            <div class="form-group">\
                <label for="initialcharge" class="col-md-12 col-form-label">initialcharge</label>\
                <div class="col-md-12">\
                    <input id="initialcharge" type="text" class="form-control" name="initialcharge" value="' + values.initialcharge + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="initialdistance" class="col-md-12 col-form-label">initialdistance</label>\
                <div class="col-md-12">\
                    <input id="initialdistance" type="text" class="form-control" name="initialdistance" value="' + values.initialdistance + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="waitingcost" class="col-md-12 col-form-label">charges</label>\
                <div class="col-md-12">\
                    <input id="waitingcost" type="text" class="form-control" name="waitingcost" value="' + values.waitingcost + '" required autofocus>\
                </div>\
            </div>';

            $('#updateBody').html(updateData);
        });
    });

    $('.updateCustomer').on('click', function () {
        var values = $(".users-update-record-model").serializeArray();
        var postData = {
            vehicletype: values[0].value,
            charges: values[1].value,
            initialcharge: values[2].value,
            initialdistance: values[3].value,
            waitingcost: values[4].value,
        };

        var updates = {};
        updates['/vehicletype/' + updateID] = postData;

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
        firebase.database().ref('vehicletype/' + id).remove();
        $('body').find('.users-remove-record-model').find("input").remove();
        $("#remove-modal").modal('hide');
    });
    $('.remove-data-from-delete-form').click(function () {
        $('body').find('.users-remove-record-model').find("input").remove();
    });
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection