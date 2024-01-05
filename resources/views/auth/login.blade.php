<x-auth-layout title="Admin Login">

    <form class="form w-100" novalidate="novalidate" action="{{ route('admin.postLogin') }}"
          method="POST">
        @csrf
        <!--begin::Title-->
        <div class="pb-5 pb-lg-15">
            <h3 class="fw-bolder text-dark display-6">Login</h3>
        </div>
        <!--begin::Title-->
        <!--begin::Form group-->
        {{ $errors->first('email')  }}
        <div class="fv-row mb-10">
            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
            <input class="form-control form-control-lg form-control-solid" type="text" name="email"
                   autocomplete="off"/>
        </div>
        <!--end::Form group-->
        <!--begin::Form group-->
        <div class="fv-row mb-10">
            <div class="d-flex justify-content-between mt-n5">
                <label class="form-label fs-6 fw-bolder text-dark pt-5">Password</label>
            </div>
            <input class="form-control form-control-lg form-control-solid" type="password" name="password"
                   autocomplete="off"/>
        </div>
        <!--end::Form group-->
        <!--begin::Action-->
        <div class="pb-lg-0 pb-5">
            <button type="submit" class="btn btn-primary fw-bolder fs-6 px-8 py-4 my-3 me-3">Sign In
            </button>
        </div>
        <!--end::Action-->
    </form>

{{--        <form id="login-form" action="{{ route('admin.postLogin') }}" method="POST">--}}
{{--            @csrf--}}
{{--            <h2 class="login-title">Log in</h2>--}}
{{--            <div class="form-group">--}}
{{--                <div class="input-group-icon right">--}}
{{--                    <div class="input-icon"><i class="fa fa-envelope"></i></div>--}}
{{--                    <input class="form-control" type="email" name="email" placeholder="Email" autocomplete="off">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <div class="input-group-icon right">--}}
{{--                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>--}}
{{--                    <input class="form-control" type="password" name="password" placeholder="Password">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="form-group text-center">--}}
{{--                <button class="btn btn-info btn-block mb-4" type="submit">Login</button>--}}

{{--                <a href="{{ route('password-reset') }}" style="margin-right: 12px" class="btn btn-success">Forgot--}}
{{--                    Password</a>--}}
{{--                <a href="/" class="btn btn-success">Home</a>--}}

{{--            </div>--}}

{{--        </form>--}}

</x-auth-layout>
