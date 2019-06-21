@extends('layouts.app')
@section('content')
    <!-- login -->
    <div class="pages section">
        <div class="container">
            <div class="pages-head">
                <h3>LOGIN</h3>
            </div>
            <div class="login">
                <div class="row">
                    <form class="col s12">
                        <div class="input-field">
                            <input type="text" class="validate" placeholder="账号" required>
                        </div>
                        <div class="input-field">
                            <input type="password" class="validate" placeholder="密码" required>
                        </div>
                        <a href="" class="button-default">登陆</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end login -->
@stop