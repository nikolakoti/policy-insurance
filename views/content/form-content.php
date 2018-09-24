<div class="container">
    <?php if (!empty($successMessage)) { ?>
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-3">
                <div class="alert alert-success text-center" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo $successMessage; ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="card col-md-8 offset-md-2 mt-3 mb-3">
        <div class="card-body">
            <form id="policy-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label>Policy holder<span>*</span></label>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="First name">
                            <div class="error pt-1"></div>
                            <?php if (!empty($formErrors["name"])) { ?>
                                <?php foreach ($formErrors["name"] as $errorMessage) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $errorMessage; ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="surname" id="surname" class="form-control" placeholder="Last name">
                            <div class="error pt-1"></div>
                            <?php if (!empty($formErrors["surname"])) { ?>
                                <?php foreach ($formErrors["surname"] as $errorMessage) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $errorMessage; ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email<span>*</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Your email">
                            <div class="error pt-1"></div>
                            <?php if (!empty($formErrors["email"])) { ?>
                                <?php foreach ($formErrors["email"] as $errorMessage) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $errorMessage; ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone<span>*</span></label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Your phone">
                            <div class="error pt-1"></div>
                            <?php if (!empty($formErrors["phone"])) { ?>
                                <?php foreach ($formErrors["phone"] as $errorMessage) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $errorMessage; ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="mr-3">Type of travel<span>*</span></label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="individual" name="policy" value="individual" class="custom-control-input" checked>
                        <label class="custom-control-label" for="individual">Individual</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="group" name="policy" value="group" class="custom-control-input" data-toggle="modal" data-target=".bd-example-modal-lg">
                        <label class="custom-control-label" for="group">Group</label>
                    </div>
                    <?php if (!empty($formErrors["policy"])) { ?>
                        <?php foreach ($formErrors["policy"] as $errorMessage) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $errorMessage; ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>

                <label>Travel date<span>*</span></label>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="departure_date" id="start" class="form-control" placeholder="Departure date">
                            <div class="error pt-1"></div>
                            <?php if (!empty($formErrors["departure_date"])) { ?>
                                <?php foreach ($formErrors["departure_date"] as $errorMessage) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $errorMessage; ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="return_date" id="end" class="form-control" placeholder="Return date">
                            <div class="error pt-1"></div>
                            <?php if (!empty($formErrors["return_date"])) { ?>
                                <?php foreach ($formErrors["return_date"] as $errorMessage) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $errorMessage; ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="notice" class="col-md-6">

                    </div>
                </div>
                <button type="submit" task="submit" value="submit" class="btn btn-outline-primary px-4 mt-3">Send</button>
            </form>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add insurers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="repeater" method="post" action="<?php echo htmlspecialchars('/process.php'); ?>">
                        <div data-repeater-list="group-a">
                            <div class="repeater-item" data-repeater-item>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" required>
                                            <small>First name<span>*</span></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="surname" class="form-control text-muted" required>
                                            <small>Surname<span>*</span></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control text-muted">
                                            <small>Email</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="date" name="birthday" class="form-control text-muted">
                                            <small>Date of birth</small>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger mb-3" data-repeater-delete>
                                            <i class="fa fa-close"></i>
                                            <span class="ml-1">Remove</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button type="button" class="btn btn-success mt-3" data-repeater-create>
                            <i class="fa fa-plus"></i>
                            <span class="ml-1">Add</span>
                        </button>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


