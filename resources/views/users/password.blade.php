@extends('layouts.app')
@section('content')
    <style>
        .clearfloat {
            zoom: 1;
        }
        .apply {
            width: 100%;
            margin-top: 50px;
        }
        .apply .bottom {
            width: 100%;
            margin-bottom: 5%;
            background-color: #fff;
            border-top: 1px solid #e1e1e1;
        }
        .apply .bottom ul li {
            width: 100%;
            float: left;
            border-bottom: 1px solid #e1e1e1;
            line-height: .5rem;
            padding: 1rem;
        }
        .apply .bottom ul li div {
            width: 100%;
            padding: 0 3%;
        }
        .apply .bottom ul li p {
            width: 25%;
            float: left;
            font-size: .12rem;
            color: #333333;
        }
        .apply .bottom ul li input {
            margin: 0;
            padding: 0;
            float: left;
            width: 75%;
            border: none;
            font-size: .12rem;
            color: #333333;
            line-height: .5rem;
        }
        .clearfloat:after {
            display: block;
            clear: both;
            content: "";
            visibility: hidden;
            height: 0;
        }
        .center-btn {
            width: 94%;
            display: block;
            margin: 5% auto;
            text-align: center;
            height: 3rem;
            line-height: 3rem;
            background-color: #111111;
            color: #fff;
            font-size: .15rem;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            opacity: .8;
        }
        button:visited {
            outline: none;
            -moz-outline: none;
        }
        button:focus {
            outline: none;
            background-color: #111111;
            opacity: 1;
        }
        button{
            border: 0;
        }
    </style>
    <div class="row">
        <div class="col s12">
            <div class="warp warpthree clearfloat">
                <div class="apply applytwo clearfloat">
                    <form action="{{ route('users.password', $user->id) }}" method="post">
                        @csrf
                        <div class="bottom clearfloat">
                            <ul>
                                <li>
                                    <div class="box-s clearfloat">
                                        <p>原密码：</p>
                                        <input type="password" name="oldPassword" id="" value="" placeholder="">
                                        @if ($errors->has('oldPassword'))
                                            <strong style="color: #f00;">{{ $errors->first('oldPassword') }}</strong>
                                        @endif
                                    </div>
                                </li>
                                <li>
                                    <div class="box-s clearfloat">
                                        <p>新密码：</p>
                                        <input type="password" name="password" id="" value="" placeholder="">
                                        @if ($errors->has('password'))
                                            <strong style="color: #f00;">{{ $errors->first('password') }}</strong>
                                        @endif
                                    </div>
                                </li>
                                <li>
                                    <div class="box-s clearfloat">
                                        <p>重复新密码：</p>
                                        <input type="password" name="password_confirmation" id="" value="" placeholder="">
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <button type="submit" class="center-btn db ra3">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop