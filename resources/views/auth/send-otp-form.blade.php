<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
  
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/toastify.min.css')}}" rel="stylesheet" /> 
    <link href="/css/toastify.min.css" rel="stylesheet" />
     <script src="/js/toastify-js.js"></script>

    <script src="{{asset('js/axios.min.js')}}"></script>
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
            <div class="card animated fadeIn w-90  p-4">
                <div class="card-body">
                    <h4>EMAIL ADDRESS</h4>
                    <br/>
                    <label>Your email address</label>
                    <input id="email" placeholder="User Email" class="form-control" type="email"/>
                    <br/>
                    <button onclick="VerifyEmail()"  class="btn btn-primary w-100 float-end bg-gradient-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap JS and jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   
    
    <!-- Your custom scripts or functions here -->
    <script>
        async function VerifyEmail() {
             let email = document.getElementById('email').value;
             if(email.length === 0){
                errorToast('Please enter your email address')
             }
             else{
                 showLoader();
                 let res = await axios.post('/send-Otp', {email: email});
                 hideLoader();
                 if(res.status===200 && res.data['status']==='success'){
                     successToast(res.data['message'])
                     sessionStorage.setItem('email', email);
                     setTimeout(function (){
                         window.location.href = '/verifyOtp';
                     }, 1000)
                 }
                 else{
                     errorToast(res.data['message'])
                 }
             }
     
         }
     </script>
     
</body>
</html>