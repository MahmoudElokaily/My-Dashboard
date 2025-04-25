@extends("dashboard::dashboard")

@section('content')
    @php
        $name = explode(' ', auth()->user()->name);
    @endphp
    <h1 class="h3 mb-4 text-gray-800">Hello {{$name[0]}}</h1>
    <div class="profile-container">
        <!-- Header Section -->
        <div class="profile-header">
            <div class="profile-info">
                <img src="@if($user->picture) {{ $user->picture }} @else {{asset('images/default/default.png')}} @endif" alt="Profile Picture" class="profile-picture">
                <h2 class="user-name">{{auth()->user()->name}}</h2>
                <p class="user-title">Web Developer</p>
            </div>
        </div>

        <!-- Profile Form Section -->
        <div class="profile-form">
            <!-- Displaying General Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Displaying Success Message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Displaying Specific Error Messages -->
            <form action="{{ route('dashboard.update-profile', auth()->id()) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $name[0]) }}" placeholder="Enter your first name" required>
                    @error('first_name')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $name[1]) }}" placeholder="Enter your last name" required>
                    @error('last_name')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" placeholder="Enter your email address" required>
                    @error('email')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="file-drop-area">
                    <span class="choose-file-button">Choose Files</span>
                    <span class="file-message">or drag and drop files here</span>
                    <input type="file" class="file-input" name="picture" accept=".jfif,.jpg,.jpeg,.png,.gif">
                    @error('picture')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div id="divImageMediaPreview"></div>

                <button type="submit" class="submit-button">Update Profile</button>
            </form>
        </div>
    </div>
@endsection

@push('css')
    <link href="{{ asset('elokaily/css/dashboard-style.css') }}" rel="stylesheet">
@endpush

@push('js')
    <script src="{{ asset('elokaily/js/dashboard.js') }}"></script>
@endpush
