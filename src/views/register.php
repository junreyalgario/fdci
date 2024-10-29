<?php
include 'components/header.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4 class="text-center mb-5">Registration</h4>

            <form action="/register" method="POST">
                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label text-right">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" required value="Junrey Algario">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-right">Email Address</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" required
                            value="junrey.algario@gmail.com">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label text-right">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" name="password" required value="1234">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="confirm_password" class="col-sm-4 col-form-label text-right">Confirm Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            required value="1234">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-8 offset-sm-4">
                        <button type="submit" class="btn btn-primary btn-block mt-5">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'components/footer.php';
?>