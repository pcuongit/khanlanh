<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{asset('admin/img/logo/logo.png')}}" rel="icon">
    <title>RuangAdmin - Login</title>
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    @if(count($errors->messages()) > 0)
                                    <div class="alert alert-danger alert-dismissible" role="alert" id="errors">
                                        <button type="button" class="close" onClick="closeAlert(event)">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        @foreach($errors->messages() as $key => $msg)
                                        <p>
                                            {{$msg[0]}}
                                        </p>
                                        @endforeach
                                    </div>
                                    @endif
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Hệ Thống Quản Trị</h1>
                                    </div>
                                    <form class="user" method="post" action="{{ route('adminstrator.login.post') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="username" name="username"
                                                aria-describedby="emailHelp" placeholder="nhập địa chỉ email"
                                                autocomplete="off" autocorrect="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password"
                                                autocomplete="off" autocorrect="off" placeholder="mật khẩu">
                                        </div>
                                        <div class="form-group">
                                            <!-- <div class="custom-control custom-checkbox small"
                                                style="line-height: 1.5rem;">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div> -->
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-block" value="Đăng Nhập">
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('admin/js/ruang-admin.js')}}"></script>
    <script src="{{asset('admin/js/custom.js')}}"></script>
</body>

</html>