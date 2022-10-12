<div class="form-group float-right">
    <label>Tags</label>
    <select class="form-control list-tag" id="listTag">
        @foreach($tags as $tag)
            <option value="{{ $tag->slug }}">{{ $tag->name }}</option>
        @endforeach
    </select>
</div>

