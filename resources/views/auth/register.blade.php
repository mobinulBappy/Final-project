<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Ecobazar</title>
<!-- ===================== Google Fonts Start ============================= -->
  @include('include.frontend-css')
<!-- ===================== ALL Css Start ============================= -->
</head>
</body>

<section>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 signin-left">
                    <img src="{{ asset('frontend/assets/image/Logo.svg') }}" alt="">
                </div>
                <div class="col-lg-5 shadow signin-right">
                    <div class="card">
                        <div class="card-body p-5">
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input class="form-control" type="text" name="name" id="" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input class="form-control" type="email" name="email" id="" value="{{ old('email') }}">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                 <div class="form-group mt-2">
                                    <label for="">Password</label>
                                    <input class="form-control" type="password" name="password" id="">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="">Confirmation Password</label>
                                    <input class="form-control" type="password" name="password-confirmation" id="">
                                </div>
                                <button type="submit">Sign Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- ===================== ALL Js Src Start ============================= -->
    @include('include.frontend-js')
<!-- ===================== ALL Js Src End ============================= -->
</body>
</html>