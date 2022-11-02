@extends("layouts.base")
@section("title","registro")
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <form method="POST" action="{{route('usuario.registrar')}}">
                    @csrf
                    @include("components.input-text",["name"=>"email","type"=>"email","value"=>"","label"=>"Correo electrónico"])
                    @include("components.input-text",["name"=>"password","type"=>"password","value"=>"","label"=>"password"])
                    @include("components.input-text",["name"=>"name","type"=>"text","value"=>"","label"=>"name"])
                    @include("components.input-text",["name"=>"surname","type"=>"text","value"=>"","label"=>"surname"])
                    @include("components.input-text",["name"=>"fecha","type"=>"date","value"=>"","label"=>"fecha"])
                    @include("components.special-select",["name"=>"type_user","type"=>"select","selected"=> "false","label"=>"Tipo de usuario","valores"=>$tipos_users])
                    @include("components.button",["type"=>"submit","value"=>"registrar","color"=>"danger"])
                </form>
                @if($errors->any())
                @foreach($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection