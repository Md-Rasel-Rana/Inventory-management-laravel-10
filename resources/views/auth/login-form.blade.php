<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
<body class="body">
    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
        </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
                <div class="card w-90 p-4">
                    <div class="card-body">
                        <h4>SIGN IN</h4>
                        <br/>
                        <input id="email" placeholder="User Email" class="form-control" type="email"/>
                        <br/>
                        <input id="password" placeholder="User Password" class="form-control" type="password"/>
                        <br/>
                        <button onclick="SubmitLogin()" class="btn btn-primary w-100  text-black">Next</button>

                        <hr/>
                        <div class="float-end mt-3">
                            <span>
                                <a class="text-center ms-3 h6 btn btn-warning" href="{{ url('/userRegistration') }}">Sign Up </a>
                                <span class="ms-1">|</span>
                                <a class="text-center ms-3 h6 btn btn-danger" href="{{ url('/sendOtp') }}">Forget Password</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery CDN -->
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
    
    <!-- Your custom scripts or functions here -->
  

  
</body>
</html>
<script>

    async function SubmitLogin() {
              let email=document.getElementById('email').value;
              let password=document.getElementById('password').value;
  
              if(email.length===0){
                  errorToast("Email is required");
              }
              else if(password.length===0){
                  errorToast("Password is required");
              }
              else{
                  showLoader();
                  let res=await axios.post("/user-login",{email:email, password:password});
                  hideLoader()
                  if(res.status===200 && res.data['status']==='success'){
                      window.location.href="/dashBoard";
                  }
                  else{
                      errorToast(res.data['message']);
                  }
              }
      }
  
  </script>