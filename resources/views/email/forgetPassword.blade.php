<h1>Forget Password Email</h1>
<p>Dear {{ @$name }}</p>
You can reset password from bellow link:
<a href="{{ route('reset.password.get', $token) }}">Reset Password</a>