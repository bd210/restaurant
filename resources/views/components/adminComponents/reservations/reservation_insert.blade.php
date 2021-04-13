<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Reservation <b>Create</b></h2>
                    </div>

                </div>
            </div>
            <table class="table table-striped table-hover">

                <form action="{{ route('createReservation') }}" method="POST">
                    @csrf
                   <div class="form-controlr">
                       <label>Name : </label>
                       <input type="text" name="name" class="form form-control"/> <br/>
                   </div>
                    <div class="form-controlr">
                        <label>Email : </label>
                        <input type="text" name="email" class="form form-control"/> <br/>
                    </div>
                    <div class="form-controlr">
                        <label>Phone : </label>
                        <input type="text" name="phone" class="form form-control"/> <br/>
                    </div>
                    <div class="form-controlr">
                        <label>Date : </label>
                        <input type="datetime-local" name="date" class="form form-control"/> <br/>
                    </div>
                    <div class="form-controlr">
                        <label>Number of people : </label>
                        <input type="number" name="people" class="form form-control"/> <br/>
                    </div>
                    <div class="form-controlr">
                        <label>Message : </label>
                        <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea><br/>
                    </div>
                    <input type="submit" value="Create" class="btn btn-primary">
                </form>

            </table>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
