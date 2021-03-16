<div class="container">
    <div class="row">
        <div class="form-group">
            <input type="file" name="avatar" id="avatar" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="user_id" id="user_id" class="form-control d-none" value="{{Auth::user()->id}}">
        </div>
        <div>
            <input type="submit" class="btn btn-primary btn-block" value="{{ $modo }}">
        </div>
    </div>
</div>
