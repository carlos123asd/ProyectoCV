<div class="mb-3">
    <label for="{{$type}}-{{$name}}" class="form-label">{{$label}}</label>
    <select name="{{$name}}" id="{{$type}}-{{$name}}">
        @foreach($valores as $valor)
        <option value="{{$valor}}" selected="{{$selected}}">{{$valor}}</option>
        @endforeach
    </select>
</div>