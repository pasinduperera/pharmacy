@extends('adminlte::page')

@section('content')
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-header">

  <!-- Header section containing title -->
  <!-- <header class="mdl-layout__header mdl-color-text--white mdl-color--light-blue-700">
    <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-grid">
      <div class="mdl-layout__header-row mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--8-col-desktop">
        <a href="/"><h3>Firebase Authentication</h3></a>
      </div>
    </div>
  </header> -->

  <main class="mdl-layout__content mdl-color--grey-100">
    <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-grid">

      <!-- Container for the demo -->
      <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
        <div class="mdl-card__title mdl-color--light-blue-600 mdl-color-text--white">
          <h2 class="mdl-card__title-text"><center>Taxi App - Driver Registration Form</center></h2></br>
        </div>
        <form class="form-horizontal" method="post" action="">
        <div class="mdl-card__supporting-text mdl-color-text--grey-600">
          <!-- <p>Enter an email and password below and either sign in to an existing account or sign up</p> -->

            <div>
            <label for="dname" style="font-size:13pt;">Driver Name </label>
                 {{csrf_field()}}
            <input type="text" class="form-control" id="dname" name="dname" placeholder="Driver Name"></input></br>
          </div>
            <label for="daddress" style="font-size:13pt;">Address </label>
              <input type="text" class="form-control" id="daddress" name="daddress" placeholder="Address"></input></br>
            <label for="dtp" style="font-size:13pt;">Phone Number </label>
              <input type="text" class="form-control" id="dtp" name="dtp" placeholder="Phone Number"></input></br>
            <label for="ddob" style="font-size:13pt;">BirthDay </label>
              <input type="date" class="form-control" id="ddob" name="ddob" placeholder="BirthDay"></input></br>
            <label for="dgender" style="font-size:13pt;">Gender </label>
              <input type="text" class="form-control" id="dgender" name="dgender" placeholder="Gender"></input></br>
            <label for="demail" style="font-size:13pt;">Email </label>
              <input type="text" class="form-control" id="demail" name="demail" placeholder="Email"></input></br>
            <label for="dage" style="font-size:13pt;">Age </label>
              <input type="text" class="form-control" id="dage" name="dage" placeholder="Age"></input></br>
            <label for="dnic" style="font-size:13pt;">NIC </label>
              <input type="text" class="form-control" id="dnic" name="dnic" placeholder="NIC"></input></br>
            <label for="ddl" style="font-size:13pt;">DL Number </label>
              <input type="text" class="form-control" id="ddl" name="ddl" placeholder="DL Number"></input></br>
            <label for="dnicimage" style="font-size:13pt;">NIC image </label>
              <input type="text" class="form-control" id="dnicimage" name="dnicimage" placeholder="NIC image"></input></br>
            <label for="ddlimage" style="font-size:13pt;">DL image </label>
             <input type="text" class="form-control" id="ddlimage" name="ddlimage" placeholder="DL image"></input></br>
            <label for="dimage" style="font-size:13pt;">Driver Image </label>
              <input type="text" class="form-control" id="dimage" name="dimage" placeholder="Driver Image"></input></br></br></br>
            <label for="dbankname" style="font-size:13pt;">Bank Name </label>
              <input type="text" class="form-control" id="dbankname" name="dbankname" placeholder="BankName"></input></br>  
            <label for="daccountno" style="font-size:13pt;">Account No</label>
              <input type="text" class="form-control" id="daccountno" name="daccountno" placeholder="Account No"></input></br>  
          <label for="daccountno" style="font-size:13pt;">User Name</label>
          <input class="mdl-textfield__input" style="display:inline;width:auto;" type="text" id="email" name="email" placeholder="Email"/>
          &nbsp;&nbsp;&nbsp;
          <label for="daccountno" style="font-size:13pt;">Password</label>
          <input class="mdl-textfield__input" style="display:inline;width:auto;" type="password" id="password" name="password" placeholder="Password"/>
          <br/><br/>
          <button disabled class="mdl-button mdl-js-button mdl-button--raised" id="quickstart-sign-in" name="signin" style="display:none">Sign In</button>
          &nbsp;&nbsp;&nbsp;
          <button class="btn btn-info btn-block" style="width:10%" id="quickstart-sign-up" name="signup" type="submit">Sign Up</button>
          &nbsp;&nbsp;&nbsp;
          <button class="mdl-button mdl-js-button mdl-button--raised" disabled id="quickstart-verify-email" name="verify-email" style="display:none">Send Email Verification</button>
          &nbsp;&nbsp;&nbsp;
          <button class="mdl-button mdl-js-button mdl-button--raised" id="quickstart-password-reset" name="verify-email" style="display:none">Send Password Reset Email</button>
          </br></br></br></br>

          <!-- Container where we'll display the user details -->
<!--           <div class="quickstart-user-details-container">
            Firebase sign-in status: <span id="quickstart-sign-in-status">Unknown</span>
            <div>Firebase auth <code>currentUser</code> object value:</div>
            <pre><code id="quickstart-account-details">null</code></pre>
          </div> -->
        </div>
      
      </div>
                            
    </div>
  </main>

                         <div class="table-responsive" style="margin-left:10px;">
                          <h2><center>Driver Details</center></h2>
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Driver Image</th>
                              <th>Driver Name</th>
                              <th>Driver Address</th>
                              <th>Driver TP</th>
                              <th>Driver Birthday</th>
                              
                              <th>Driver Driving Licence No</th>
                              <th>Driver NIC</th>
                              <th>Driver NIC Image</th>
                              
                              <th>#</th>
                              
                            </tr>
                          </thead>
                          @foreach($all_drivers as $driver)
                          <tbody>
                            <tr>
                              <th scope="row">{{$driver['DriverImage']}}</th>
                              <td>{{$driver['SubjectName']}}</td>
                              <td>{{$driver['DriverAddress']}}</td>
                              <td>{{$driver['DriverMobile']}}</td>
                              <td>{{$driver['DriverBirthday']}}</td>
                              
                              <td>{{$driver['DriverDriverLicence']}}</td>
                              <td>{{$driver['DriverMIC']}}</td>
                              <td>{{$driver['DriverNICImage']}}</td>
                              
                              <td>Delete | Update | Add</td>
                            </tr>
                           @endforeach
                            
                          </tbody>
                        </table>
                      </div>
</div>

      

  <script src="https://www.gstatic.com/firebasejs/5.8.4/firebase.js"></script>    
    <script>
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


    const auth = firebase.auth






  </script>

    <script type="text/javascript">


    /**
     * Handles the sign in button press.
     */
    function toggleSignIn() {
      if (firebase.auth().currentUser) {
        // [START signout]
        firebase.auth().signOut();
        // [END signout]
      } else {
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        if (email.length < 4) {
          alert('Please enter an email address.');
          return;
        }
        if (password.length < 4) {
          alert('Please enter a password.');
          return;
        }
        // Sign in with email and pass.
        // [START authwithemail]
        firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
          // Handle Errors here.
          var errorCode = error.code;
          var errorMessage = error.message;
          // [START_EXCLUDE]
          if (errorCode === 'auth/wrong-password') {
            alert('Wrong password.');
          } else {
            alert(errorMessage);
          }
          console.log(error);
          document.getElementById('quickstart-sign-in').disabled = false;
          // [END_EXCLUDE]
        });
        // [END authwithemail]
      }
      document.getElementById('quickstart-sign-in').disabled = true;
    }
    /**
     * Handles the sign up button press.
     */
    function handleSignUp() {
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;
      if (email.length < 4) {
        alert('Please enter an email address.');
        return;
      }
      if (password.length < 4) {
        alert('Please enter a password.');
        return;
      }
      // Sign in with email and pass.
      // [START createwithemail]
      firebase.auth.createUserWithEmailAndPassword(email, password).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // [START_EXCLUDE]
        if (errorCode == 'auth/weak-password') {
          alert('The password is too weak.');
        } else {
          alert(errorMessage);
        }
        console.log(error);
        // [END_EXCLUDE]
      });
      // [END createwithemail]
    }
    /**
     * Sends an email verification to the user.
     */
    function sendEmailVerification() {
      // [START sendemailverification]
      firebase.auth().currentUser.sendEmailVerification().then(function() {
        // Email Verification sent!
        // [START_EXCLUDE]
        alert('Email Verification Sent!');
        // [END_EXCLUDE]
      });
      // [END sendemailverification]
    }
    function sendPasswordReset() {
      var email = document.getElementById('email').value;
      // [START sendpasswordemail]
      firebase.auth().sendPasswordResetEmail(email).then(function() {
        // Password Reset Email Sent!
        // [START_EXCLUDE]
        alert('Password Reset Email Sent!');
        // [END_EXCLUDE]
      }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // [START_EXCLUDE]
        if (errorCode == 'auth/invalid-email') {
          alert(errorMessage);
        } else if (errorCode == 'auth/user-not-found') {
          alert(errorMessage);
        }
        console.log(error);
        // [END_EXCLUDE]
      });
      // [END sendpasswordemail];
    }
    /**
     * initApp handles setting up UI event listeners and registering Firebase auth listeners:
     *  - firebase.auth().onAuthStateChanged: This listener is called when the user is signed in or
     *    out, and that is where we update the UI.
     */
    function initApp() {
      // Listening for auth state changes.
      // [START authstatelistener]
      firebase.auth().onAuthStateChanged(function(user) {
        // [START_EXCLUDE silent]
        document.getElementById('quickstart-verify-email').disabled = true;
        // [END_EXCLUDE]
        if (user) {
          // User is signed in.
          var displayName = user.displayName;
          var email = user.email;
          var emailVerified = user.emailVerified;
          var photoURL = user.photoURL;
          var isAnonymous = user.isAnonymous;
          var uid = user.uid;
          var providerData = user.providerData;
          // [START_EXCLUDE]
          document.getElementById('quickstart-sign-in-status').textContent = 'Signed in';
          document.getElementById('quickstart-sign-in').textContent = 'Sign out';
          document.getElementById('quickstart-account-details').textContent = JSON.stringify(user, null, '  ');
          if (!emailVerified) {
            document.getElementById('quickstart-verify-email').disabled = false;
          }
          // [END_EXCLUDE]
        } else {
          // User is signed out.
          // [START_EXCLUDE]
          document.getElementById('quickstart-sign-in-status').textContent = 'Signed out';
          document.getElementById('quickstart-sign-in').textContent = 'Sign in';
          document.getElementById('quickstart-account-details').textContent = 'null';
          // [END_EXCLUDE]
        }
        // [START_EXCLUDE silent]
        document.getElementById('quickstart-sign-in').disabled = false;
        // [END_EXCLUDE]
      });
      // [END authstatelistener]
      document.getElementById('quickstart-sign-in').addEventListener('click', toggleSignIn, false);
      document.getElementById('quickstart-sign-up').addEventListener('click', handleSignUp, false);
      document.getElementById('quickstart-verify-email').addEventListener('click', sendEmailVerification, false);
      //document.getElementById('quickstart-password-reset').addEventListener('click', sendPasswordReset, false);
    }
    window.onload = function() {
      initApp();
    };
  </script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection