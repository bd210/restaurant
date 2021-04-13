
@isset($resetPassword)
<form action="{{ route('resetPassword', ['id'=> session()->get('user')->id]) }}" method="post">
    @csrf
<div class="form-group">
    <label><b> Current Password : </b> </label>
    <input type="password" class="form-text" name="currentPassword"    />

</div>
<div class="form-group">
    <label><b> New Password : </b> </label>
    <input type="password" class="form-text" name="password"    />

</div>
<div class="form-group">
    <label> <b> Confirm New Password : </b></label>
    <input type="password" class="form-text" name="confirm_password"      />

</div>
    <input type="submit" value="Edit" class="btn btn-primary">
</form>

@endisset
