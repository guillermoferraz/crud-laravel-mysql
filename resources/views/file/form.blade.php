<div class="container col-md-8 p-4">
    <div class="row">

        <div class='row mx-auto col-md-12'>
            <div class="form-group mx-auto">
                <input type="text" class="form-control " name="name" id="name" placeholder="Name">
            </div>

            <div class="form-group mx-auto" >
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name">
            </div>
        </div>
        <div class="row mx-auto col-md-12">
            <div class="form-group mx-auto">
                <input type="text" class="form-control" name="id_document" id="id_document" placeholder="Document identification">
            </div>

            <div class="form-group mx-auto">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
            </div>
        </div>
        <div class="row mx-auto col-md-12">

            <div class="form-group mx-auto">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-group mx-auto">
                <input type="email" class="form-control" name="confirm_email" id="confirm_email" placeholder="Confirm your email">
            </div>
        </div>
        <div class="row mx-auto col-md-12">
            <div class="form-group mx-auto">
                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">
            </div>
            <div class="form-group mx-auto">
                <input type="text" class="form-control" name="career" id="career" placeholder="Career">
            </div>
        </div>

            <div class="form-group mx-auto col-md-11 p-2 m-2">
                <textarea type="text" class="form-control" name="description" id="description" placeholder="Description" rows="3"></textarea>
            </div>

        <div class="form-group mx-auto col-md-11">
            <input type="file" class="form-control" name="photo" id="photo">
        </div>

            <div class="form-group mx-auto">
                <input type="text" class="form-control d-none" name="user_id" id="user_id" placeholder="User id" value='{{Auth::user()->id}}'>
            </div>

        <div class="form-group mx-auto col-11">
            <input type="submit" class="btn btn-primary btn-block" id="btn" value="Done">
        </div>

    </div>
</div>
