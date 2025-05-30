@extends('components.layout_login')

@section('styles')
<style>
    /* From Uiverse.io by vinodjangid07 */ 
  

  .form_main {
  width: 500px;
  height: 600px; 
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background-color: rgba(255, 255, 255, .8);
  padding: 30px 30px 30px 30px;
  /* box-shadow: 20px 22px 28px 0px rgba(20, 61, 71, 0.7); */
  position: relative;
  overflow: hidden;

  backdrop-filter: blur(16px) saturate(180%);
  -webkit-backdrop-filter: blur(16px) saturate(180%);
  background-color: rgba(255, 255, 255, 0.75);
  border-radius: 12px;
  opacity: 100%;
}

.form_main::before {
  position: absolute;
  content: "";
  width: 800px;
  height: 800px;
  background-color:rgb(69, 118, 87);
  transform: rotate(45deg);
  left: -635px;
  bottom: -55px;
  z-index: 1;
  border-radius: 30px;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.082);
}

.heading {
  font-size: 3em;
  color: #2e2e2e;
  font-weight: 700;
  font-family: 'Poppins';
  margin: 5px 0 10px 0;
  z-index: 2;
}

.inputContainer {
  width: 70%;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2;
}

.inputIcon {
  position: absolute;
  left: 3px;
}

.inputField {
  width: 100%;
  height: 30px;
  background-color: transparent;
  border: none;
  border-bottom: 2px solid  rgb(186, 186, 186);
  margin: 10px 0;
  color: black;
  font-size: .8em;
  font-weight: 500;
  box-sizing: border-box;
  padding-left: 30px;
}

.inputField:focus {
  outline: none;
  border-bottom: 2px solid rgb(0, 100, 13);
}

.inputField::placeholder {
  color: rgb(45, 45, 45);
  font-size: 1em;
  font-weight: 500;
}

.Btn {
  z-index: 2;
  position: relative;
  width: 150px;
  height: 55px;
  border-radius: 45px;
  border: none;
  background-color: rgb(93, 150, 115);
  color: white;
  box-shadow: 0px 10px 10px rgb(93, 150, 115) inset,
  0px 5px 10px rgba(5, 5, 5, 0.212),
  0px -10px 10px rgb(93, 150, 115) inset;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
}

.Btn::before {
  width: 70%;
  height: 2px;
  position: absolute;
  background-color: rgba(250, 250, 250, 0.678);
  content: "";
  filter: blur(1px);
  top: 7px;
  border-radius: 50%;
}

.Btn::after {
  width: 70%;
  height: 2px;
  position: absolute;
  background-color: rgba(250, 250, 250, 0.137);
  content: "";
  filter: blur(1px);
  bottom: 7px;
  border-radius: 50%;
}

.Btn:hover {
  animation: jello-horizontal 0.9s both;
}

@keyframes jello-horizontal {
  0% {
    transform: scale3d(1, 1, 1);
  }

  30% {
    transform: scale3d(1.25, 0.75, 1);
  }

  40% {
    transform: scale3d(0.75, 1.25, 1);
  }

  50% {
    transform: scale3d(1.15, 0.85, 1);
  }

  65% {
    transform: scale3d(0.95, 1.05, 1);
  }

  75% {
    transform: scale3d(1.05, 0.95, 1);
  }

  100% {
    transform: scale3d(1, 1, 1);
  }
}


.forgotLink {
  z-index: 2;
  font-size: .9em;
  font-weight: 500;
  color:rgb(11, 147, 9);
  text-decoration: none;
  padding: 8px 15px;
  border-radius: 20px;
}
</style>
@endsection

<!-- From Uiverse.io by vinodjangid07 --> 
@section('main')
<form action="{{ route('logins.user_login') }}" method="POST" class="form_main mt-5">
    @csrf @method('POST')
    <p class="heading"><strong>Login</strong></p>
      <div class="inputContainer">
          <svg class="inputIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2e2e2e" viewBox="0 0 16 16">
          <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"></path>
          </svg>
      <input type="text" class="inputField" name="username" id="username" placeholder="Username">
      </div>
        
    <div class="inputContainer">
        <svg class="inputIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2e2e2e" viewBox="0 0 16 16">
        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
        </svg>
        <input type="password" class="inputField" name="password" id="password" placeholder="Password">
    </div>
                  
    <button class="Btn">Sign In</button>
    <a class="forgotLink" href="#">Forgot your password?</a>

  </form>
@endsection

@section('scripts')
<script src="{{ asset('cdns/jquery-3.4.1.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('cdns/Chart.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('bootstrap/assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('bootstrap/assets/demo/chart-bar-demo.js') }}"></script>
<script src="{{ asset('cdns/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('bootstrap/js/scripts.js')}}"></script>

<!-- select 2  -->
<link href="{{ asset('bootstrap/css/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('bootstrap/js/select2.min.js') }}"></script>

<!-- select 2  -->
<script>
$(document).ready(function() {
    $('.boxtypes').select2({
        placeholder: "Select Box Type",
        allowClear: true,
        width: 'resolve'
    });
    $('.platforms').select2({
        placeholder: "Select platforms",
        allowClear: true,
        width: 'resolve'
    });
    $('.compatible').select2({
        placeholder: "Select Compatible",
        allowClear: true,
        width: 'resolve'
    });
    $('.auditor').select2({
        placeholder: "Select Auditor",
        allowClear: true,
        width: 'resolve'
    });
    
});
</script>

@endsection