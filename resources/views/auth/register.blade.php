@extends('layouts.app')
@section('content')
    <!-- register -->
    <div class="pages section">
        <div class="container">
            <div class="pages-head">
                <h3>注册</h3>
            </div>
            <div class="register">
                <div class="row">
                    <form class="col s12" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-field">
                            <input type="text" class="validate" placeholder="用户名" name="name" required>
                            @if ($errors->has('name'))
                                <strong style="color: #f00;">{{ $errors->first('name') }}</strong>
                            @endif
                        </div>
                        <div class="input-field">
                            <input type="text" class="validate" placeholder="手机号" name="phone" required>
                            @if ($errors->has('phone'))
                                <strong style="color: #f00;">{{ $errors->first('phone') }}</strong>
                            @endif
                        </div>
                        <div class="input-field">
                            <input type="password" placeholder="密码" name="password" class="validate" required>
                            @if ($errors->has('password'))
                                <strong style="color: #f00;">{{ $errors->first('password') }}</strong>
                            @endif
                        </div>
                        <div class="input-field">
                            <input type="password" placeholder="确认密码" name="password_confirmation" class="validate" required>
                        </div>
                        <button type="submit" class="button-default">注册</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end register -->
@stop