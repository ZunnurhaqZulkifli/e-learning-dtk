@extends('layouts.main_app')

@section('content')
    <div class="vh-100">
        <div class="h-100 container py-4">
          <div class="h-25">
              <h1 class="text-center">Sistem E-Learning DTK</h1>
          </div>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-8 col-lg-7 col-xl-6">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">

                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4"
                             data-mdb-input-init>
                            <input class="form-control form-control-lg"
                                   id="form1Example13"
                                   name="username"
                                   type="username" />
                            <label class="form-label"
                                   for="form1Example13">Username</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4"
                             data-mdb-input-init>
                            <input class="form-control form-control-lg"
                                   id="form1Example23"
                                   name="password"
                                   type="password" />
                            <label class="form-label"
                                   for="form1Example23">Password</label>
                        </div>

                        <div class="d-flex justify-content-around mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input checked
                                       class="form-check-input"
                                       id="form1Example3"
                                       type="checkbox"
                                       value="" />
                                <label class="form-check-label"
                                       for="form1Example3"> Remember me </label>
                            </div>
                            <a href="#!">Forgot password?</a>
                        </div>

                        <!-- Submit button -->
                        <button class="btn btn-primary btn-lg btn-block"
                                data-mdb-button-init
                                data-mdb-ripple-init
                                type="submit">Sign in</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
