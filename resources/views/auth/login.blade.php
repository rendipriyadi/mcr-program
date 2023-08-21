
  @extends('templating.parsial.head')



<!-- BEGIN login -->
<div class="login login-v2 fw-bold">
    <!-- BEGIN login-cover -->
    <div class="login-cover">
        <div class="login-cover-img" style="background-image: url(/img/login-bg/dump_truck.png)" data-id="login-cover-image"></div>
        <div class="login-cover-bg"></div>
    </div>
    <!-- END login-cover -->

    <!-- BEGIN login-container -->
    <div class="login-container">
        <!-- BEGIN login-header -->
        <div class="login-header">
            <div class="brand">
                <div class="d-flex align-items-center">
                <img src="{{ asset ('static/manggala.png') }}" alt="" width="30%"><b>MCR</b>Production
                </div>
                <small>Main Control Room | Production</small>
            </div>
            <div class="icon">
                <i class="fa fa-lock"></i>
            </div>
        </div>
        <!-- END login-header -->
        <!-- BEGIN login-content -->
        <div class="login-content">

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-floating mb-20px">
                    <input id="email" type="email" class="form-control fs-13px h-45px border-0  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <label  class="d-flex align-items-center text-gray-600 fs-13px">Email Address</label>
                </div>
                <div class="form-floating mb-20px">
                    <input id="password" type="password" class="form-control  fs-13px h-45px border-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <label  class="d-flex align-items-center text-gray-600 fs-13px">Password</label>
                </div>

                <div class="mb-20px">
                    <button type="submit" class="btn btn-red d-block w-100 h-45px btn-lg">Sign in</button>
                </div>

            </form>
        </div>
        <!-- END login-content -->


