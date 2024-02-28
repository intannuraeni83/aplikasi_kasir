@extends('template_auth.layout')

@section('content')
<div class="my-auto page page-h">
			<div class="main-signin-wrapper">
				<div class="main-card-signin d-md-flex">
				<div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white" >
					<div class="my-auto authentication-pages">
						<div>
							<h5 class="mb-4">FORM REGISTER</h5>
							<p class="mb-5">APLIKASI KASIR</p>
							<a href="index.html" class="btn btn-success">Learn More</a>
						</div>
					</div>
				</div>
				<div class="sign-up-body wd-md-50p">
					<div class="main-signin-header">
						<h2>Selamat Datang!</h2>
						<h4>Tolong buat akun untuk melanjutkan</h4>
						<form method="POST" action="{{ route('register') }}">
                    @csrf

    <div class="form-group">
        <label>Username</label>
        <input class="form-control" placeholder="Enter your username" type="text" name="username" value="{{ old('username') }}">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input class="form-control" placeholder="Enter your email" type="email" name="email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input class="form-control" placeholder="Enter your password" type="password" name="password">
    </div>
    <div class="form-group">
        <label>Nama Lengkap</label> 
        <input class="form-control" placeholder="Enter your nama lengkap" type="text" name="full_name" value="{{ old('full_name') }}">
    </div>
    <div class="form-group">
        <label>Alamat</label> 
        <input class="form-control" placeholder="Enter your alamat" type="text" name="address" value="{{ old('address') }}">
    </div>
    <div class="form-group">
        <label>Hak Akses</label> 
        <select name='role' id="f1" class="form-control select2" onchange="reload_table()"> 
            <option value="">=== pilih ===</option> 
            <option value="administrator" @if(old('role') == 'administrator') selected @endif>administrator</option> 
            <option value="petugas" @if(old('role') == 'petugas') selected @endif>petugas</option> 
        </select>     
    </div>

    <button class="btn btn-primary btn-block" type="submit">Buat Akun</button>
</form>

					</div>
				</div>
			</div>
			</div>
		</div>
@endsection