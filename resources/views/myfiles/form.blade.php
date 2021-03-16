<div class="container col-md-8 p-4">
    <div class="row">

        <div class='row mx-auto col-md-12'>
            <div class="form-group mx-auto">
                <input type="text" class="form-control " name="name" id="name" placeholder="Name" value="{{isset($myfile->name)?$myfile->name: old('name')}}">
            </div>

            <div class="form-group mx-auto" >
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name" value="{{isset($myfile->last_name)?$myfile->last_name: old('last_name')}}">
            </div>
        </div>
        <div class="row mx-auto col-md-12">
            <div class="form-group mx-auto">
                <input type="text" class="form-control" name="id_document" id="id_document" placeholder="Document identification" value="{{isset($myfile->id_document)?$myfile->id_document: old('id_document')}}">
            </div>

            <div class="form-group mx-auto">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{isset($myfile->phone)?$myfile->phone: old('phone')}}">
            </div>
        </div>
        <div class="row mx-auto col-md-12">

            <div class="form-group mx-auto">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{isset($myfile->email)?$myfile->email: old('email')}}">
            </div>
            <div class="form-group mx-auto">
                <input type="email" class="form-control" name="confirm_email" id="confirm_email" placeholder="Confirm your email" value="{{isset($myfile->confirm_email)?$myfile->confirm_email: old('confirm_email')}}">
            </div>
        </div>
        <div class="row mx-auto col-md-12">
            <div class="form-group mx-auto">
                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{isset($myfile->date_of_birth)?$myfile->date_of_birth: old('date_of_birth')}}">
            </div>
            <div class="form-group mx-auto">
                <input type="text" class="form-control" name="career" id="career" placeholder="Career" value="{{isset($myfile->career)?$myfile->career: old('career')}}">
            </div>
        </div>

            <div class="form-group mx-auto col-md-11 p-2 m-2">
                <textarea type="text" class="form-control" name="description" id="description" placeholder="Description" rows="3">{{isset($myfile->description)?$myfile->description: old('description')}}"</textarea>
            </div>

        <div class="form-group mx-auto col-md-11">
            @if(isset($myfile->photo))
                <img class="img-fluid img-thumbnail " src="{{asset('storage').'/'.$myfile->photo}}" alt="" width="200">
            @endif
            <input type="file" class="form-control" name="photo" id="photo">

        </div>

            <div class="form-group mx-auto">
                <input type="text" class="form-control d-none" name="user_id" id="user_id" placeholder="User id" value='{{Auth::user()->id}}' value="{{isset($myfile->user_id)?$myfile->user_id: old('user_id')}}">
            </div>

        <div class="form-group mx-auto col-11">
            <input type="submit" class="btn btn-primary btn-block" id="btn" value="Update">
        </div>

    </div>
</div>
