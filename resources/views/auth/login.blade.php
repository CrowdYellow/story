@extends('layouts.app')
@section('content')
    <!-- login -->
    <div class="pages section">
        <div class="container">
            <div class="pages-head">
                <h3>登陆</h3>
            </div>
            <div class="login">
                <div class="row">
                    <form class="col s12" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-field">
                            <input type="text" class="validate" name="phone" placeholder="手机号" required>
                            @if ($errors->has('phone'))
                                <strong style="color: #f00;">{{ $errors->first('phone') }}</strong>
                            @endif
                        </div>
                        <div class="input-field">
                            <input type="password" class="validate" name="password" placeholder="密码" required>
                            @if ($errors->has('password'))
                                <strong style="color: #f00;">{{ $errors->first('password') }}</strong>
                            @endif
                        </div>
                        <button type="submit" class="button-default">登陆</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end login -->
@stop