@extends('layouts.app')
@section('content')
    <style>
        .apply {
            width: 100%;
            margin-top: 50px;
        }
        img{
            border-radius: 50%;
        }
        button:visited {
            outline: none;
        }
        button:focus {
            outline: none;
            background-color: #111111;
            opacity: 1;
        }
        button{
            border: 0;
        }
        .center-btn {
            width: 20%;
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
    </style>
    <div class="row apply">
        <div style="text-align: center;margin-top: 90px">
            <img id="avatar" src="{{ asset($user->avatar) }}" alt="{{ $user->name }}" width="90">
            <form action="" style="display: block;text-align: center;" id="upload-form">
                @csrf
                <input type="file" name="avatar" id="file" hidden onchange="uploadAvatar(this)" accept="image/*">
                <button type="button" class="center-btn" onclick="document.getElementById('file').click();">修改头像</button>
            </form>
        </div>
    </div>
@stop
@section('js')
    <script>
        function uploadAvatar(event)
        {
            var strExtension = event.value.substr(event.value.lastIndexOf('.') + 1);
            if (strExtension !== 'jpeg' && strExtension !== 'jpg' && strExtension !== 'png' && strExtension !== 'gif'){
                alert('请选择图片！');
                return;
            }
            var formData = new FormData($('#upload-form')[0]);
            $.ajax({
                type: "POST",
                url: '{{ route('users.avatar', $user->id) }}',
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success:function (data) {
                    if (data.status === 200) {
                        $('#avatar').attr('src',data.data.path);
                    }else{
                        alert('上传失败');
                    }
                }
            });
        }
    </script>
@stop