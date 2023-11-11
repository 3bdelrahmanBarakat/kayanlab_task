{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dropify.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">

    <div class="cover">
      <div class="front">
        <img src="{{asset('assets/Images/frontImg.jpg')}}" alt="">
        <div class="text">
          <span class="text-1">Every new experience is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>

    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Register</div>
            @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                            @endif
          <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input name="first_name" type="text" placeholder="Enter your first name" value="{{ old('first_name') }}" required autofocus autocomplete="first_name">
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input name="last_name" type="text" placeholder="Enter your last name" value="{{ old('last_name') }}" required autofocus autocomplete="last_name">
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="email" type="text" placeholder="Enter your email" value="{{ old('email') }}" required  autocomplete="email">
              </div>
              <div class="input-box">
                <i class="fab fa-twitter-square"></i>
                <input name="username" type="text" placeholder="Enter your username" value="{{ old('username') }}" required  autocomplete="username">
              </div>
              <div class="input-box">
                <i class="fas fa-phone-square-alt"></i>
                <input type="number" id="phone" name="phone" pattern="[+]{1}[0-9]{11,14}" placeholder="Enter your phone" value="{{ old('phone') }}" required  autocomplete="phone">
              </div>
              <div class="input-box">

                {{-- <i  class="fas fa-envelope"></i> &nbsp;&nbsp;&nbsp;&nbsp; --}}
                <i class="fas fa-transgender-alt"></i>
                <select id="gender" name="gender" value="{{ old('gender') }}" required  autocomplete="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
              </div>

              <div class="">
                <label for="image">Upload Image:</label>
                <input class="dropify" id="validationCustom05" type="file"
                                                name="photo" value="{{ old('photo') }}" required  autocomplete="photo">
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input name="password" type="password" placeholder="Enter your password" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input name="password_confirmation" type="password" placeholder="Confirm your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Sumbit">
              </div>
              <div class="text sign-up-text">You already have account? <a href="{{route('login')}}">Login now</a></div>
            </div>
        </form>
      </div>

    </div>
    </div>
  </div>
  <script src="{{asset('assets/dropify.js')}}"></script>
  <script src="{{asset('assets/jquery-3.3.1.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script>
    $('.dropify').dropify();

</script>

</body>
</html>
