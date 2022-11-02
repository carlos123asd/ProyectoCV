@extends("layouts.base")
@section("title","registro")
@section("content")

<style>
    .ventana-modal{
        width: 40%;
        margin-top: 100px;
        padding-left: 5px;
        background: rgba(104, 245, 91, 0.5);
        border: 2px solid rgba(0, 0, 0, 0.5);
    }
</style>

@if(Session::has("mensaje"))
            <div tabindex="-1">
                <div class="modal-dialog">
                <div class="modal-content ventana-modal">
                    <div class="modal-header">
                    <h5 class="modal-title">Inicio Sesion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <p>{{Session::get("mensaje")}}</p>
                    </div>
                </div>
                </div>
            </div>
        {{--<div>{{Session::get("mensaje")}}</div>--}}
@endif

<div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <form method="POST" action="{{route('usuario.iniciar')}}">
                    @csrf
                    @include("components.input-text",["name"=>"email","type"=>"email","value"=>"","label"=>"Correo electrónico"])
                    @include("components.input-text",["name"=>"password","type"=>"password","value"=>"","label"=>"password"])
                    @include("components.button",["type"=>"submit","value"=>"iniciar","color"=>"success"])
                </form>
            </div>
        </div>
</div>
@endsection