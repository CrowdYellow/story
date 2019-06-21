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
                    <form class="col s12">
                        <div class="input-field">
                            <input type="text" class="validate" placeholder="用户名" name="name" required>
                        </div>
                        <div class="input-field">
                            <input type="password" placeholder="密码" name="password" class="validate" required>
                        </div>
                        <div class="input-field">
                            <input type="password" placeholder="确认密码" name="password_confirmation" class="validate" required>
                        </div>
                        <div class="button-default">注册</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end register -->
@stop