<div class="container" style="min-height: 300px;">

    <h1>RESET YOUR PASSWORD</h1>
    <form action="{{ route('ResetPasswordFront') }}" method="POST" style="margin-top: 100px;">
        @CSRF

        <div class="form-group">
            <label>Email : </label>
            <input type="text" name="email" >

        </div>
        <input type="submit" name="btnSubmit" value="Submit" class="btn-primary">

    </form>


</div>
