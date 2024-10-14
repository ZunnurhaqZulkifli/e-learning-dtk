@extends('layouts.main_app')

@section('content')
    <div class="vh-100">
        <div class="h-100 container py-4">
          
            <div class="h-25">
              <h1 class="text-center">Register E-Learning DTK</h1>
          </div>

            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-8 col-lg-7 col-xl-6">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">

                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Email input -->

                        <div class="row">
                            <div class="col-6">
                                <div class="form-outline mb-4"
                                    data-mdb-input-init>
                                    <input class="form-control form-control-lg"
                                        id="form1Example13"
                                        name="name"
                                        placeholder="Muhammad Fikri"
                                        type="name" />
                                    <label class="form-label"
                                        for="name">Name</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-outline mb-4"
                                    data-mdb-input-init>
                                    <input class="form-control form-control-lg"
                                        id="form1Example13"
                                        name="username"
                                        placeholder="Username"
                                        type="username" />
                                    <label class="form-label" for="usenrmae">Username</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <select name="typeable" id="" class="form-control form-control-lg">
                                <option value="">Select A Role</option>
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                            </select>

                            <label class="form-label" for="user_type">User Type</label>
                        </div>

                        <div class="form-outline mb-4"
                             data-mdb-input-init>
                            <input class="form-control form-control-lg"
                                   id="form1Example13"
                                   name="phone_number"
                                   placeholder="0103149930"
                                   type="phone_number" />
                            <label class="form-label"
                                   for="form1Example13">Phone Number</label>
                        </div>

                        <div class="form-outline mb-4"
                             data-mdb-input-init>
                            <input class="form-control form-control-lg"
                                   id="form1Example13"
                                   name="email"
                                   placeholder="admin@example.com"
                                   type="email" />
                            <label class="form-label"
                                   for="form1Example13">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4"
                             data-mdb-input-init>
                            <input class="form-control form-control-lg"
                                   id="form1Example23"
                                   name="password"
                                   placeholder="********"
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
