<!doctype html>

@extends('adminlte::page')

@section('content')

<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-4">

    <h4><b>Package Assign Definition</b></h4><br>

    <h5>Assign packages here</h5>
    <div class="card card-default">
        <div class="card-body">
            <form id="addCustomer" class="form-inline" method="POST" action="">
                <div class="form-group mb-2">
                    <label for="assignid" class="sr-only">Assign id</label>
                    <input id="assignid" type="text" class="form-control" name="assignid" placeholder="assignid"
                           required autofocus/><br>
                </div>            

                <div class="form-group mx-sm-3 mb-2">
                    <label for="driverid" class="sr-only">Driver ID</label>
                    <input id="driverid" type="driverid" class="form-control" name="driverid" placeholder="driverid"
                           required autofocus/>
                </div>

                <div class="form-group mx-sm-3 mb-2">
                    <label for="pkgid" class="sr-only">Package ID</label>
                    <input id="pkgid" type="pkgid" class="form-control" name="pkgid" placeholder="pkgid"
                           required autofocus/>
                </div>

                <div class="form-group mx-sm-3 mb-2">
                    <label for="customerphone" class="sr-only">Customer Phone</label>
                    <input id="customerphone" type="customerphone" class="form-control" name="customerphone" placeholder="customerphone"
                           required autofocus/>
                </div>
                
                <div class="form-group mx-sm-3 mb-2">
                    <label for="tripstatus" class="sr-only">Trip status</label>
                        <select name="tripstatus">
                             <option value="pending">Pending</option>
                             <option value="Completed">Completed</option>                          
                        </select>
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
            <th>Relation ID</th>
            <th>Assign ID</th>
            <th>Driver ID</th>
            <th>Package ID</th>
            <th>Customer Phone</th>
            <th>Trip status</th>
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
    firebase.database().ref('packageassign/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value) {
                htmls.push('<tr>\
                <td>' + index + '</td>\
                <td>' + value.assignid + '</td>\
                <td>' + value.driverid + '</td>\
                <td>' + value.pkgid + '</td>\
                <td>' + value.customerphone + '</td>\
                <td>' + value.tripstatus + '</td>\
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
        var assignid = values[0].value;
        var driverid = values[1].value;
        var pkgid = values[2].value;
        var customerphone = values[3].value;
        var tripstatus = values[4].value;
        var userID = lastIndex + 1;

        console.log(values);

        firebase.database().ref('packageassign/' + values[1].value).set({
            assignid: assignid,
            driverid: driverid,
            pkgid: pkgid,
            customerphone: customerphone,
            tripstatus: tripstatus,
        });

        // Reassign lastID value
        lastIndex = userID;
        $("#addCustomer input").val("");
    });

    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateData', function () {
        updateID = $(this).attr('data-id');
        firebase.database().ref('packageassign/' + updateID).on('value', function (snapshot) {
            var values = snapshot.val();
            var updateData = '<div class="form-group">\
                <label for="assignid" class="col-md-12 col-form-label">Assign ID</label>\
                <div class="col-md-12">\
                    <input id="assignid" type="text" class="form-control" name="assignid" value="' + values.assignid + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="driverid" class="col-md-12 col-form-label">Driver ID</label>\
                <div class="col-md-12">\
                    <input id="driverid" type="text" class="form-control" name="driverid" value="' + values.driverid + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="pkgid" class="col-md-12 col-form-label">Package ID</label>\
                <div class="col-md-12">\
                    <input id="pkgid" type="text" class="form-control" name="pkgid" value="' + values.pkgid + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="customerphone" class="col-md-12 col-form-label">Customer Phone</label>\
                <div class="col-md-12">\
                    <input id="customerphone" type="text" class="form-control" name="customerphone" value="' + values.customerphone + '" required autofocus>\
                </div>\
            </div>';

            $('#updateBody').html(updateData);
        });
    });

    $('.updateCustomer').on('click', function () {
        var values = $(".users-update-record-model").serializeArray();
        var postData = {
            assignid: values[0].value,
            driverid: values[1].value,
            pkgid: values[2].value,
            customerphone: values[3].value,
        };

        var updates = {};
        updates['/packageassign/' + updateID] = postData;

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
        firebase.database().ref('packageassign/' + id).remove();
        $('body').find('.users-remove-record-model').find("input").remove();
        $("#remove-modal").modal('hide');
    });
    $('.remove-data-from-delete-form').click(function () {
        $('body').find('.users-remove-record-model').find("input").remove();
    });
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection