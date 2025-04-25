@extends("dashboard::auth")
@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" action="{{ route('dashboard.create-user') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="firstName" required
                                           placeholder="First Name" value="{{ old('firstName') }}">
                                    @error('firstName')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="exampleLastName" name="secondName" required
                                           placeholder="Last Name" value="{{ old('secondName') }}">
                                    @error('secondName')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" required
                                       placeholder="Email Address" value="{{ old('email') }}">
                                @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" name="password" required
                                           id="exampleInputPassword" placeholder="Password">
                                    @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" name="password_confirmation" required
                                           id="exampleRepeatPassword" placeholder="Repeat Password">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                            <hr>

                            <a href="{{ route('dashboard.redirection' , 'google') }}" target="_blank" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>

                            <a href="{{ route('dashboard.redirection' , 'facebook') }}" target="_blank" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>
                        </form>

                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{route('dashboard.forget-password')}}">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{route("dashboard.login")}}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
