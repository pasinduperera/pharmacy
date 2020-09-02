<!doctype html>

@extends('adminlte::page')

@section('content')

<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-4">

    <h4><b>Package Definition</b></h4><br>

    <h5>Add packages here</h5>
    <div class="card card-default">
        <div class="card-body">
            <form id="addCustomer" class="form-inline" method="POST" action="">
                <div class="form-group mb-2">
                    <label for="packagen" class="sr-only">Package name</label>
                    <input id="packagen" type="text" class="form-control" name="packagen" placeholder="packagen"
                           required autofocus/><br>
                </div>
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
                    <label for="initialdistance" class="sr-only">Initial Distance</label>
                    <input id="initialdistance" type="initialdistance" class="form-control" name="initialdistance" placeholder="Initial Distance"
                           required autofocus/>
                </div>

                <div class="form-group mx-sm-3 mb-2">
                    <label for="initialhours" class="sr-only">Initial hours</label>
                    <input id="initialhours" type="initialhours" class="form-control" name="initialhours" placeholder="Initial hours"
                           required autofocus/>
                </div>

                <div class="form-group mx-sm-3 mb-2">
                    <label for="initialcost" class="sr-only">Initial cost</label>
                    <input id="initialcost" type="initialcost" class="form-control" name="initialcost" placeholder="Initial cost"
                           required autofocus/>
                </div>

                <div class="form-group mx-sm-3 mb-2">
                    <label for="nextcost" class="sr-only">next distance cost</label>
                    <input id="nextcost" type="nextcost" class="form-control" name="nextcost" placeholder="next cost"
                           required autofocus/>
                </div>

                <div class="form-group mx-sm-3 mb-2">
                    <label for="waitingcost" class="sr-only">Waiting cost</label>
                    <input id="waitingcost" type="waitingcost" class="form-control" name="waitingcost" placeholder="Waiting cost"
                           required autofocus/>
                </div>

                <div class="form-group mx-sm-3 mb-2">
                    <label for="nexthours" class="sr-only">Next hours</label>
                    <input id="nexthours" type="nexthours" class="form-control" name="nexthours" placeholder="Next hours"
                           required autofocus/>
                </div>

                <div class="form-group mx-sm-3 mb-2">
                    <label for="nexthourcost" class="sr-only">Next hour cost</label>
                    <input id="nexthourcost" type="nexthourcost" class="form-control" name="nexthourcost" placeholder="Next hour cost"
                           required autofocus/>
                </div>
                
                <button id="submitCustomer" type="button" class="btn btn-primary mb-2" display="block">Submit</button>
            </form>
        </div>
    </div>
</div>
    <br>
<div class="col-md-8">
    <table style="width:900%" style="align:right">
        <tr>
            <th>Package ID</th>
            <th>Package Name</th>
            <th>Vehicle Type</th>
            <th>Initial Distance</th>
            <th>Initial hours</th>
            <th>Initial cost</th>
            <th>Next KM cost</th>
            <th>Waiting cost</th>
            <th>Next hours</th>
            <th>Next hour cost</th>
            <th style="width:90%">Action</th>
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
                            aria-hidden="true">x
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
    firebase.database().ref('packagedetails/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value) {
                htmls.push('<tr>\
                <td>' + index + '</td>\
                <td>' + value.packagen + '</td>\
                <td>' + value.vehicletype + '</td>\
                <td>' + value.initialdistance + '</td>\
                <td>' + value.initialhours + '</td>\
                <td>' + value.initialcost + '</td>\
                <td>' + value.nextcost + '</td>\
                <td>' + value.waitingcost + '</td>\
                <td>' + value.nexthours + '</td>\
                <td>' + value.nexthourcost + '</td>\
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
        var packagen = values[0].value;
        var vehicletype = values[1].value;
        var initialdistance = values[2].value;
        var initialhours = values[3].value;
        var initialcost = values[4].value;
        var nextcost = values[5].value;
        var waitingcost = values[6].value;
        var nexthours = values[7].value;
        var nexthourcost = values[8].value;
        var userID = lastIndex + 1;

        console.log(values);

        firebase.database().ref('packagedetails/' + userID).set({
            packagen: packagen,
            vehicletype: vehicletype,
            initialdistance: initialdistance,
            initialhours: initialhours,
            initialcost: initialcost,
            nextcost: nextcost,
            waitingcost: waitingcost,
            nexthours: nexthours,
            nexthourcost: nexthourcost,
        });

        // Reassign lastID value
        lastIndex = userID;
        $("#addCustomer input").val("");
    });

    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateData', function () {
        updateID = $(this).attr('data-id');
        firebase.database().ref('packagedetails/' + updateID).on('value', function (snapshot) {
            var values = snapshot.val();
            var updateData = '<div class="form-group">\
                <label for="packagen" class="col-md-12 col-form-label">Package Name</label>\
                <div class="col-md-12">\
                    <input id="packagen" type="text" class="form-control" name="packagen" value="' + values.packagen + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="vehicletype" class="col-md-12 col-form-label">Vehicle Type</label>\
                <div class="col-md-12">\
                    <input id="vehicletype" type="text" class="form-control" name="vehicletype" value="' + values.vehicletype + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="initialdistance" class="col-md-12 col-form-label">Initial Distance</label>\
                <div class="col-md-12">\
                    <input id="initialdistance" type="text" class="form-control" name="initialdistance" value="' + values.initialdistance + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="initialhours" class="col-md-12 col-form-label">Initial Hours</label>\
                <div class="col-md-12">\
                    <input id="initialhours" type="text" class="form-control" name="initialhours" value="' + values.initialhours + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="initialcost" class="col-md-12 col-form-label">Initial cost</label>\
                <div class="col-md-12">\
                    <input id="initialcost" type="text" class="form-control" name="initialcost" value="' + values.initialcost + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="nextcost" class="col-md-12 col-form-label">Next cost</label>\
                <div class="col-md-12">\
                    <input id="nextcost" type="text" class="form-control" name="nextcost" value="' + values.nextcost + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="waitingcost" class="col-md-12 col-form-label">Waiting cost</label>\
                <div class="col-md-12">\
                    <input id="waitingcost" type="text" class="form-control" name="waitingcost" value="' + values.waitingcost + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="nexthours" class="col-md-12 col-form-label">Next hours</label>\
                <div class="col-md-12">\
                    <input id="nexthours" type="text" class="form-control" name="nexthours" value="' + values.nexthours + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="nexthourcost" class="col-md-12 col-form-label">Next hour cost</label>\
                <div class="col-md-12">\
                    <input id="nexthourcost" type="text" class="form-control" name="nexthourcost" value="' + values.nexthourcost + '" required autofocus>\
                </div>\
            </div>';

            $('#updateBody').html(updateData);
        });
    });

    $('.updateCustomer').on('click', function () {
        var values = $(".users-update-record-model").serializeArray();
        var postData = {
            packagen: values[0].value,
            vehicletype: values[1].value,
            initialdistance: values[2].value,
            initialhours: values[3].value,
            initialcost: values[4].value,
            nextcost: values[5].value,
            waitingcost: values[6].value,
            nexthours: values[7].value,
            nexthourcost: values[8].value,
        };

        var updates = {};
        updates['/packagedetails/' + updateID] = postData;

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
        firebase.database().ref('packagedetails/' + id).remove();
        $('body').find('.users-remove-record-model').find("input").remove();
        $("#remove-modal").modal('hide');
    });
    $('.remove-data-from-delete-form').click(function () {
        $('body').find('.users-remove-record-model').find("input").remove();
    });
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection