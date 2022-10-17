@extends("layouts.base")
@section("title","registro")
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <form method="POST" action="{{route('usuario.registrar')}}">
                    @csrf
                    @include("components.input-text",["name"=>"email","type"=>"email","label"=>"Correo electrónico"])
                    @include("components.input-text",["name"=>"password","type"=>"password","label"=>"password"])
                    @include("components.input-text",["name"=>"name","type"=>"text","label"=>"name"])
                    @include("components.input-text",["name"=>"surname","type"=>"text","label"=>"surname"])
                    @include("components.input-text",["name"=>"fecha","type"=>"date","label"=>"fecha"])
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