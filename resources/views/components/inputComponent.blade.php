<div class="form-group">
    <label for="{{ $idElement }}">{{$description}}</label>
    <input type="text" class="form-control" id="{{ $idElement }}" name="{{ $namePlayer }}">
    {{ $slot }}
</div>
