<!doctype html>

@extends('adminlte::page')

@section('content')


<div class="container" style="margin-top: 10px;">
    <div class="row">
    <div class="card card-default">
        <div class="card-body">
        <form name="my" id="addCustomer"  action="" >
      <div class="form-group mb-2">
                <h3>Driver Registration.</h3>
                   <label for="dname">Driver Name</label> 
                    <input id="dname" type="text" class="form-control" name="dname" placeholder="Driver Name"
                           required="required"/>
                </div>
                 <div class="form-group mb-2">
                    <label for="dmiddlename" >Driver's middle name</label>
                    <input id="dmiddlename" type="text" class="form-control" name="dmiddlename" placeholder="Driver Middle Name"
                           required="required"/><br>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="daddress" >Address</label>
                    <input id="daddress" type="daddress" class="form-control" name="daddress" placeholder="Address"
                           required="required"/>
                </div>
                  <div class="form-group mx-sm-3 mb-2">
                    <label for="dbirthday" >BirthDay</label>
                    <input id="dbirthday" type="date" class="form-control" name="dbirthday" placeholder="Birthday"
                           required="required"/>
                </div>
                  <div class="form-group mx-sm-3 mb-2">
                    <label for="mobile" >Mobile</label>
                    <input id="mobile" type="mobile" class="form-control" name="mobile" placeholder="Mobile No"
                           required="required"/>
                </div>
                  <div class="form-group mx-sm-3 mb-2">
                    <label for="age" >Age</label>
                    <input id="age" type="age" class="form-control" name="age" placeholder="Age"
                           required="required"/>
                </div>
                  <div class="form-group mx-sm-3 mb-2">
                    <label for="dlno" >Driving Licence No</label>
                    <input id="dlno" type="dlno" class="form-control" name="dlno" placeholder="Driving Licence No"
                           required="required"/>
                </div>
                 <div class="form-group mx-sm-3 mb-2">
                    <label for="nicimage" >Driver NIC image</label>
                    <input id="nicimage" type="nicimage" class="form-control" name="nicimage" placeholder="Driver NIC Image"
                           required="required"/>
                </div>
                 <div class="form-group mx-sm-3 mb-2">
                    <label for="gender" >Gender</label>
                    <input id="gender" type="gender" class="form-control" name="gender" placeholder="Gender"
                           required="required"/>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="dimage" >Driver Image</label>
                    <input type="file" class="form-control" id="file" placeholder="Driver Image"
                           required="required"/>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="bankname" >Bank Name</label>
                    <input id="bankname" type="bankname" class="form-control" name="bankname" placeholder="Bank Name"
                           required="required"/>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="accountno">Account No</label>
                    <input id="accountno" type="accountno" class="form-control" name="accountno" placeholder="Account No"
                           required="required"/>
                </div>
                  <div class="form-group form-check">
    
    <!--  -->
    <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
    <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
    <!--  -->
  </div>
                   
    <button id="submitCustomer" class="btn btn-primary mb-2"  display="block" name="signup" type="submit" onClick="handleSignUp()">submit</button>
    <button onclick="exportTableToCSV('members.csv')" class="btn btn-primary mb-2"  display="block" name="signup" type="submit">generate Excel sheet.</button>
</form>
</div>
</div>
  
<div class="table-responsive" style="">
    <table class="table table-striped">
        <tr>
            <th>D.ID</th>
            <th>Driver Name</th>
            <th>Driver Middle Name</th>
            <th>Address</th>
            <th>Birthday</th>
            <th>Mobile</th>
            <th>Age</th>
            <th>D.L. No</th>
            <th>D. NIC No</th>
            <th>D. NIC Image</th>
            <th>Gender</th>
            <th>Bank Name</th>
            <th>Account No</th>
            <th>Email</th>
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
<script src="https://www.gstatic.com/firebasejs/5.6.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/5.6.0/firebase-auth.js"></script>

  <script src="https://www.gstatic.com/firebasejs/5.6.0/firebase-firestore.js"></script>
  <script src="https://www.gstatic.com/firebasejs/5.6.0/firebase.js"></script>

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

    const ref = firebase.storage().ref();

    var lastIndex = 0;

    var selectedfile;

    var downloadURL;

    // Get Data
    firebase.database().ref('drivers/').on('value', function (snapshot) {
        // alert("get Data Successfull");
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value) {
                htmls.push('<tr>\
                <td>' + index + '</td>\
                <td>' + value.dname + '</td>\
                <td>' + value.dmiddlename + '</td>\
                <td>' + value.daddress + '</td>\
                <td>' + value.dbirthday + '</td>\
                <td>' + value.mobile + '</td>\
                <td>' + value.age + '</td>\
                <td>' + value.dlno + '</td>\
                <td>' + value.nicno + '</td>\
                <td>' + value.nicimage + '</td>\
                <td>' + value.gender + '</td>\
                <td>' + value.bankname + '</td>\
                <td>' + value.accountno + '</td>\
                <td>' + value.email + '</td>\
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
        // alert("add Data Successfull");
        var values = $("#addCustomer").serializeArray();
        var dname = values[0].value;
        var dmiddlename = values[1].value;
        var daddress = values[2].value;
        var dbirthday = values[3].value;
        var mobile = values[4].value;
        var age = values[5].value;
        var dlno = values[6].value;
        var nicno = values[7].value;
        var nicimage = values[8].value;
        var gender = values[9].value;
        var bankname = values[10].value;
        var accountno = values[11].value;
        var email = values[12].value;
        var index = values[13].value;
        var userID = lastIndex + 1;

        console.log(values);

        firebase.database().ref('drivers/' + userID).set({
            dname: dname,
            dmiddlename: dmiddlename,
            daddress: daddress,
            dbirthday: dbirthday,
            mobile: mobile,
            age: age,
            dlno: dlno,
            nicno: nicno,
            nicimage: nicimage,
            gender: gender,
            bankname: bankname,
            accountno: accountno,
            email: email,
            index: userID,    
        });

        firebase.database().ref('Driver_Earning_And_Commission2/' + userID).set({
            balance: 0.0,
            date: 000,
            driverid: userID,
            paidcommission: 0.0,
            totalcommission: 0.0, 
            totalearning: 0.0,   
        });
        
    });

    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateData', function () {
        updateID = $(this).attr('data-id');
        firebase.database().ref('drivers/' + updateID).on('value', function (snapshot) {
            var values = snapshot.val();
            var updateData = '<div class="form-group">\
            <label for="dname" class="col-md-12 col-form-label">Driver Name</label>\
            <div class="col-md-12">\
                <input id="dname" type="text" class="form-control" name="dname" value="' + values.dname + '" required="required">\
            </div>\
        </div>\
        <div class="form-group">\
            <label for="dmiddlename" class="col-md-12 col-form-label">Driver Middle Name</label>\
            <div class="col-md-12">\
                <input id="dmiddlename" type="text" class="form-control" name="dmiddlename" value="' + values.dmiddlename + '" required="required">\
            </div>\
        </div>\
        <div class="form-group">\
            <label for="daddress" class="col-md-12 col-form-label">Address</label>\
            <div class="col-md-12">\
                <input id="daddress" type="text" class="form-control" name="daddress" value="' + values.daddress + '" required="required">\
            </div>\
        </div>\
            <div class="form-group">\
                <label for="dbirthday" class="col-md-12 col-form-label">Driver Birthday</label>\
                <div class="col-md-12">\
                    <input id="dbirthday" type="date" class="form-control" name="dbirthday" value="' + values.dbirthday + '" required="required">\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="mobile" class="col-md-12 col-form-label">Mobile</label>\
                <div class="col-md-12">\
                    <input id="mobile" type="text" class="form-control" name="mobile" value="' + values.mobile + '" required="required">\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="age" class="col-md-12 col-form-label">Age</label>\
                <div class="col-md-12">\
                    <input id="age" type="text" class="form-control" name="age" value="' + values.age + '" required="required">\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="dlno" class="col-md-12 col-form-label">Driving Licence No</label>\
                <div class="col-md-12">\
                    <input id="dlno" type="text" class="form-control" name="dlno" value="' + values.dlno + '" required="required">\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="nicno" class="col-md-12 col-form-label">NIC No</label>\
                <div class="col-md-12">\
                    <input id="nicno" type="text" class="form-control" name="nicno" value="' + values.nicno + '" required="required">\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="nicimage" class="col-md-12 col-form-label">NIC Image</label>\
                <div class="col-md-12">\
                    <input id="nicimage" type="text" class="form-control" name="nicimage" value="' + values.nicimage + '" required="required">\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="gender" class="col-md-12 col-form-label">Gender</label>\
                <div class="col-md-12">\
                    <input id="gender" type="text" class="form-control" name="gender" value="' + values.gender + '" required="required">\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="dimage" class="col-md-12 col-form-label">Driver Image</label>\
                <div class="col-md-12">\
                    <input id="dimage" type="text" class="form-control" name="dimage" value="' + values.dimage + '" required="required">\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="bankname" class="col-md-12 col-form-label">Bank Name</label>\
                <div class="col-md-12">\
                    <input id="bankname" type="text" class="form-control" name="bankname" value="' + values.bankname + '" required="required">\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="accountno" class="col-md-12 col-form-label">Account No</label>\
                <div class="col-md-12">\
                    <input id="accountno" type="text" class="form-control" name="accountno" value="' + values.accountno + '" required="required">\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="email" style="font-size:13pt;">User Name</label>\
                <div class="col-md-12">\
                    <input id="email_id" type="text" class="form-control" name="emailname" value="' + values.email + '" required="required">\
                </div>\
            </div>';


          

            $('#updateBody').html(updateData);
        });
    });

    $('.updateCustomer').on('click', function () {
        var values = $(".users-update-record-model").serializeArray();
        var postData = {
            dname: values[0].value,
            dmiddlename: values[1].value,
            daddress: values[2].value,
            dbirthday: values[3].value,
            mobile: values[4].value,
            age: values[5].value,
            dlno: values[6].value,
            nicno: values[7].value,
            nicimage: values[8].value,
            gender: values[9].value,
            dimage: values[10].value,
            bankname: values[11].value,
            accountno: values[12].value,
            email: values[13].value,
            index: parseInt(updateID),
        };

        var updates = {};
        updates['/drivers/' + updateID] = postData;

        firebase.database().ref().update(updates);

        $("#update-modal").modal('hide');
    });

    $("#file").on("change", function(event){
        selectedfile = event.target.files[0];
    })



    function handleSignUp() {
        var filename = selectedfile.name;
        var storageRef = firebase.storage().ref('/driverimages/'+filename);
        var uploadtask = storageRef.put(selectedfile);      

            

      var email3 = document.getElementById("addCustomer").elements.namedItem("emailname").value;
       //alert(email3); // 
      var password = document.getElementById("addCustomer").elements.namedItem("passwordname").value;
       //alert(password); // 
      //  var email = "deepthasanushk92@gmail.com";
      // var password = "1234567";
      

      if (email3.length < 4) {
        //alert('Please enter an email address.');
        return;
      }
      if (password.length < 4) {
        //alert('Please enter a password.');
        return;
      }
      // Sign in with email and pass.
      // [START createwithemail]
      firebase.auth().createUserWithEmailAndPassword(email3, password).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // [START_EXCLUDE]
        if (errorCode == 'auth/weak-password') {
          //alert('The password is too weak.');
        } else {
          //alert(errorMessage);
        }
        console.log(error);

        // [END_EXCLUDE]

        // Register three observers:
        // 1. 'state_changed' observer, called any time the state changes
        // 2. Error observer, called on failure
        // 3. Completion observer, called on successful completion
        uploadTask.on('state_changed', function(snapshot){
          // Observe state change events such as progress, pause, and resume
          // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded

        }, function(error) {
          // Handle unsuccessful uploads
        }, function() {
          // Handle successful uploads on complete
          // For instance, get the download URL: https://firebasestorage.googleapis.com/...
          // uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
            uploadTask.snapshot.storageRef.getDownloadURL().then(function(downloadURL) { console.log(downloadURL); })               

          });

        });

        alert(downloadURL); 

            

      // [END createwithemail]
    }


    function initApp() {
      // Listening for auth state changes.
      // [START authstatelistener]
      firebase.auth().onAuthStateChanged(function(user) {

        
        // [START_EXCLUDE silent]
        //document.getElementById('quickstart-verify-email').disabled = true;
        // [END_EXCLUDE]
        if (user) {
          // User is signed in.
          //var displayName = user.displayName;
          var email = user.email;
          var emailVerified = user.emailVerified;
          var photoURL = user.photoURL;
          var isAnonymous = user.isAnonymous;
          var uid = user.uid;
          var providerData = user.providerData;
          // [START_EXCLUDE]
          //document.getElementById('quickstart-sign-in-status').textContent = 'Signed in';
          //document.getElementById('quickstart-sign-in').textContent = 'Sign out';
          //document.getElementById('quickstart-account-details').textContent = JSON.stringify(user, null, '  ');
          if (!emailVerified) {
            //document.getElementById('quickstart-verify-email').disabled = false;
          }
          // [END_EXCLUDE]
        } else {
          // User is signed out.
          // [START_EXCLUDE]
          //document.getElementById('quickstart-sign-in-status').textContent = 'Signed out';
          //document.getElementById('quickstart-sign-in').textContent = 'Sign in';
          //document.getElementById('quickstart-account-details').textContent = 'null';
          // [END_EXCLUDE]
        }
        // [START_EXCLUDE silent]
        //document.getElementById('quickstart-sign-in').disabled = false;
        // [END_EXCLUDE]
      });
      // [END authstatelistener]
      //document.getElementById('quickstart-sign-in').addEventListener('click', toggleSignIn, false);
      document.getElementById('submitCustomer').addEventListener('click', handleSignUp, false);
      //document.getElementById('quickstart-verify-email').addEventListener('click', sendEmailVerification, false);
      //document.getElementById('quickstart-password-reset').addEventListener('click', sendPasswordReset, false);
    }  
    
    // Remove Data
    $("body").on('click', '.removeData', function () {
        var id = $(this).attr('data-id');
        $('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="' + id + '">');
    });

    $('.deleteRecord').on('click', function () {
        var values = $(".users-remove-record-model").serializeArray();
        var id = values[0].value;
        firebase.database().ref('drivers/' + id).remove();
        $('body').find('.users-remove-record-model').find("input").remove();
        $("#remove-modal").modal('hide');
    });
    $('.remove-data-from-delete-form').click(function () {
        $('body').find('.users-remove-record-model').find("input").remove();
    });

    window.onload = function() {
      initApp();
    };

    function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}

function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");
    
    for (var i = 0; i < rows.length; i++) {
        var row = [], 
        cols = rows[i].querySelectorAll("td, th");
        
       
            row.push(rows[i].innerText);
        
        csv.push(row.join(","));        
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection