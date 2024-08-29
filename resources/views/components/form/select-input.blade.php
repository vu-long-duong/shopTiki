<div class="form-group">
    <label>{{$title}}</label>
    <select class="form-control">
        @foreach ($collection as $item)
            <option>{{$item->{{$attribute}}}}</option>
        @endforeach
    </select>
</div>
