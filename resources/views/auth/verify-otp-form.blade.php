<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS CDN -->
   
    <script src="{{asset('js/axios.min.js')}}"></script>
    <link href="{{asset('css/toastify.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/toastify-js.js')}}"></script>
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
                    <h4>ENTER OTP CODE</h4>
                    <br/>
                    <label>4 Digit Code Here</label>
                    <input id="otp" placeholder="Code" class="form-control" type="text"/>
                    <br/>
                    <button onclick="VerifyOtp()"  class="btn btn-primary w-100 float-end bg-gradient-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Bootstrap JS and jQuery CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    
 
</body>
</html>

   <!-- Your custom scripts or functions here -->
   <script>
    async function VerifyOtp() {
         let otp = document.getElementById('otp').value;
         if(otp.length !==4){
            errorToast('Invalid OTP')
         }
         else{
             showLoader();
             let res=await axios.post('/verify-otp', {
                 otp: otp,
                 email:sessionStorage.getItem('email')
             })
            hideLoader();
 
             if(res.status===200 && res.data['status']==='success'){
                 successToast(res.data['message'])
                 sessionStorage.clear();
                 setTimeout(() => {
                     window.location.href='/resetPassword'
                 }, 1000);
             }
             else{
                 errorToast(res.data['message'])
             }
         }
     }
 </script>








