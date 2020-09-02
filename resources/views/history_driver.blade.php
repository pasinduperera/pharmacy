<!doctype html>

<head>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

@extends('adminlte::page')

@section('content')

<div class="container" style="margin-top: 10px;">
    <br>

<div class="col-md-12">
   <div class="table-responsive" style="">
    <h4><b>Driver Commission</b></h4><br>
    <!-- <table  class="table table-striped"> -->

    <table id="service_table" class="table table-striped">
        <tr>
            <th>Date</th>
            <th>Driver ID</th>
            <th>Total Earnings</th>
            <th>Total Commission</th>
            <th>Pay Amount</th>
            <th>Balance</th>
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
    firebase.database().ref('Driver_Earning_And_Commission2/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value) {
                htmls.push('<tr>\
                <td>' + value.date + '</td>\
                <td>' + value.driverid + '</td>\
                <td>' + value.totalearning + '</td>\
                <td>' + value.totalcommission + '</td>\
                <td>' + value.paidcommission +'</td>\
                <td>' + value.balance + '</td>\
            <td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateData"  style="width:.5%" data-id="' + index + '"><i class="fa fa-refresh"></i></button>\
            </td>\
          </tr>');
            }
            lastIndex = index;
        });
        $('#tbody').html(htmls);
        var com = value.paidcommission;
        alert
        $("#submitUser").removeClass('desabled');
    });



    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateData', function () {
        
        updateID = $(this).attr('data-id');
        firebase.database().ref('Driver_Earning_And_Commission2/' + updateID).on('value', function (snapshot) {
            var values = snapshot.val();
             
            var updateData = '<div class="form-group">\
            <label for="first_name" class="col-md-12 col-form-label">Date</label>\
            <div class="col-md-12">\
                <input id="date" type="text" class="form-control" name="date" value="' + values.date + '" readonly>\
            </div>\
        </div>\
        <div class="form-group">\
            <label for="driverid" class="col-md-12 col-form-label">Driver ID</label>\
            <div class="col-md-12">\
                <input id="driverid" type="text" class="form-control" name="driverid" value="' + values.driverid + '" readonly>\
            </div>\
        </div>\
            <div class="form-group">\
                <label for="totalearning" class="col-md-12 col-form-label">Total Earning</label>\
                <div class="col-md-12">\
                    <input id="totalearning" type="text" class="form-control" name="totalearning" value="' + values.totalearning + '" readonly>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="totalcommission" class="col-md-12 col-form-label">Total Commission</label>\
                <div class="col-md-12">\
                    <input id="totalcommission" type="text" class="form-control" name="totalcommission" value="' + values.totalcommission + '" readonly>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="paidcommission" class="col-md-12 col-form-label">Paid Commission</label>\
                <div class="col-md-12">\
                    <input id="paidcommission" type="text" class="form-control" name="paidcommission" value="' + values.paidcommission + '" readonly>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="balance" class="col-md-12 col-form-label">Balance</label>\
                <div class="col-md-12">\
                    <input id="balance" type="text" class="form-control" name="balance" value="' + values.balance + '" readonly>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="balance" class="col-md-12 col-form-label">Paying Commission</label>\
                <div class="col-md-12">\
                    <input id="paying_commission" type="text" class="form-control" name="paying_commission" required autofocus>\
                </div>\
            </div>';

            $('#updateBody').html(updateData);
        });
    });

    $('.updateCustomer').on('click', function () {
        var values = $(".users-update-record-model").serializeArray();

      var paying_commision =  document.getElementById("paying_commission").value;

      var paid_commision = Number(values[4].value) + Number(paying_commision);

      
        var postData = {
            date: values[0].value,
            driverid: values[1].value,
            totalearning: Number(values[2].value),
            totalcommission: Number(values[3].value),
            paidcommission: paid_commision,
            balance: Number(values[5].value)-Number(paying_commision),
        };

        var updates = {};
        updates['/Driver_Earning_And_Commission2/' + updateID] = postData;

        firebase.database().ref().update(updates);


        var rootRef = firebase.database().ref();

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        var date = dd + '-' + mm + '-' + yyyy;

        var urlRef = rootRef.child('Driver_Earning_And_Commission_RecordWise/' + values[1].value + '/' + date);

        
        urlRef.once("value", function(snapshot) {

            if (snapshot.exists()){

                snapshot.forEach(function(child) {
              
                    var  all_values = child.key;

                    if(all_values=='paid_amount'){
                        // console.log("works");
                        var  prev_paid_amount = child.val();
                        var total_amount =  parseInt(prev_paid_amount) + parseInt(paying_commision);
                        var storesRef = rootRef.child('Driver_Earning_And_Commission_RecordWise/' + values[1].value);
                        var newStoreRef = storesRef.child(date);
                        newStoreRef.set({
                            paid_amount: parseInt(total_amount),
                            paid_date : date,
                        });
                    }
                
            
                });


            }else{

                var storesRef = rootRef.child('Driver_Earning_And_Commission_RecordWise/' + values[1].value);
                var newStoreRef = storesRef.child(date);
                newStoreRef.set({
                    paid_amount: paying_commision,
                    paid_date : date,
                });


            }
       
         });


        $("#update-modal").modal('hide');
    });


   


</script>



@endsection