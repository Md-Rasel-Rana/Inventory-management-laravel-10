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
    <script src="{{asset('js/config.js')}}"></script>
    <style>
     
    </style>
</head>
<body>
    
    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
                <div class="indeterminate"></div>
            </div>
        </div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6 center-screen">
            <div class="card animated fadeIn w-90 p-4">
                <div class="card-body">
                    <h4>SET NEW PASSWORD</h4>
                    <br/>
                    <label>New Password</label>
                    <input id="password" placeholder="New Password" class="form-control" type="password"/>
                    <br/>
                    <label>Confirm Password</label>
                    <input id="cpassword" placeholder="Confirm Password" class="form-control" type="password"/>
                    <br/>
                    <button onclick="ResetPass()" class="btn btn-primary w-100 bg-gradient-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Bootstrap JS and jQuery CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Your custom scripts or functions here -->
    <script>
        async function ResetPass() {
              let password = document.getElementById('password').value;
              let cpassword = document.getElementById('cpassword').value;
      
              if(password.length===0){
                  errorToast('Password is required')
              }
              else if(cpassword.length===0){
                  errorToast('Confirm Password is required')
              }
              else if(password!==cpassword){
                  errorToast('Password and Confirm Password must be same')
              }
              else{
                showLoader()
                let res=await axios.post("/reset-password",{password:password});
                hideLoader();
                if(res.status===200 && res.data['status']==='success'){
                    successToast(res.data['message']);
                    setTimeout(function () {
                        window.location.href="/userLogin";
                    },1000);
                }
                else{
                  errorToast(res.data['message'])
                }
              }
      
          }
      </script>
</body>
</html>










