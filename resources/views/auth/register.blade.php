  @extends('auth.layout.main')
  @section('content')
  <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <input type="text" name="name" autocomplete="off" class="form-control form-control-user"
                                                id="name" aria-describedby="name"
                                                placeholder="name">
                                        </div>
                                        <div class="form-group">
                                          @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="email" placeholder="email">
                                        </div>
                                        <div class="form-group">
                                          @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                                        {{-- <a href={{ route('login')}} class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> --}}
                                        <hr>
                                        <a href="#" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="#" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="t.me/dompetcerdas_bot">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="http://t.me/dompetcerdas_bot" target="_blank">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        @endsection