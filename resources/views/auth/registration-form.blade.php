<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS CDN -->
 
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  
    <script src="{{asset('js/axios.min.js')}}"></script>
    <link href="{{asset('css/toastify.min.css')}}" rel="stylesheet" />
    <script src="/js/toastify-js.js"></script>
    <script src="/js/config.js"></script>

</head>
<body>
    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
        </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-10 center-screen">
                <div class="card animated fadeIn w-100 p-3">
                    <div class="card-body">
                        <h4>Sign Up</h4>
                        <hr/>
                        <div class="container-fluid m-0 p-0">
                            <div class="row m-0 p-0">
                                <div class="col-md-4 p-2">
                                    <label>Email Address</label>
                                    <input id="email" placeholder="User Email" class="form-control" type="email"/>
                                </div>
                                <div class="col-md-4 p-2">
                                    <label>First Name</label>
                                    <input id="firstName" placeholder="First Name" class="form-control" type="text"/>
                                </div>
                                <div class="col-md-4 p-2">
                                    <label>Last Name</label>
                                    <input id="lastName" placeholder="Last Name" class="form-control" type="text"/>
                                </div>
                                <div class="col-md-4 p-2">
                                    <label>Mobile Number</label>
                                    <input id="mobile" placeholder="Mobile" class="form-control" type="mobile"/>
                                </div>
                                <div class="col-md-4 p-2">
                                    <label>Password</label>
                                    <input id="password" placeholder="User Password" class="form-control" type="password"/>
                                </div>
                            </div>
                            <div class="row m-0 p-0">
                                <div class="col-md-4 p-2">
                                    <button onclick="onRegistration()" class="btn btn-primary mt-3 w-100 bg-gradient-primary text-white">Complete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery CDN -->
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
  
</body>
</html>
<script>


    async function onRegistration() {
  
          let email = document.getElementById('email').value;
          let firstName = document.getElementById('firstName').value;
          let lastName = document.getElementById('lastName').value;
          let mobile = document.getElementById('mobile').value;
          let password = document.getElementById('password').value;
  
          if(email.length===0){
              errorToast('Email is required')
          }
          else if(firstName.length===0){
              errorToast('First Name is required')
          }
          else if(lastName.length===0){
              errorToast('Last Name is required')
          }
          else if(mobile.length===0){
              errorToast('Mobile is required')
          }
          else if(password.length===0){
              errorToast('Password is required')
          }
          else{
              showLoader();
              let res=await axios.post("/user-Register",{
                  email:email,
                  firstName:firstName,
                  lastName:lastName,
                  mobile:mobile,
                  password:password
              })
             hideLoader();
              if(res.status===200 && res.data['status']==='success'){
                  successToast(res.data['message']);
                  setTimeout(function (){
                      window.location.href='/userLogin'
                  },2000)
              }
              else{
                  errorToast(res.data['message'])
              }
          }
      }
  </script>