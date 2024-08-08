<!doctype html>
<html lang="en" class="dark-theme">

<head>
    <?php include_once ('includes/main-head.php') ?>
</head>
<style>
    .valid {
        border-color: green;
    }

    .invalid {
        border-color: red;
    }

    .validation-message {
        font-size: 0.9em;
        margin-top: 5px;
    }

    .valid-message {
        color: green !important;
    }

    .invalid-message {
        color: red !important;
    }
</style>

<body>
    <!--sidebar wrapper -->
    <?php include_once ('includes/sidebar.php') ?>
    <!--end sidebar wrapper -->
    <!--start header -->
    <?php include_once ('includes/header.php') ?>
    <!--end header -->
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0 text-uppercase">Add Social Media Link</h6>
                        </div>

                    </div>
                    <hr />

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-addProject" role="tabpanel">
                            <form action="<?= base_url() ?>UserDashboard/add_social_media" method="post">
                                <div class="items" data-group="test">
                                    <?php if ($this->session->flashdata('errors')): ?>
                                        <div class="col-md-12">
                                            <div class="alert alert-danger">
                                                <?php foreach ($this->session->flashdata('errors') as $error): ?>
                                                    <p><?= $error ?></p>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <!-- Repeater Content -->
                                    <div class="row item-content">
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Linkdin Id</label>
                                            <input type="text" id="linkedin_id" name="linkdin_id" class="form-control"
                                                placeholder="https://www.linkedin.com/in/xyz-4b4701279/"
                                                value="<?= $social_media->linkdin_id ?? '' ?>">
                                            <p id="linkedin_message" class="validation-message"></p>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Facebook Id</label>
                                            <input type="text" id="facebook_id" name="facebook_id" class="form-control"
                                                placeholder="https://www.facebook.com/profile.php?id=199001271238740&mibextid=NGHnsi"
                                                value="<?= $social_media->facebook_id ?? '' ?>">
                                            <p id="facebook_message" class="validation-message"></p>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Twitter Id</label>
                                            <input type="text" id="twitter_id" name="twitter_id" class="form-control"
                                                placeholder="https://twitter.com/8dndndn78h984594/"
                                                value="<?= $social_media->twitter_id ?? '' ?>">
                                            <p id="twitter_message" class="validation-message"></p>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Pinterest Id</label>
                                            <input type="text" id="pinterest_id" name="pinterest_id"
                                                class="form-control" placeholder="https://in.pinterest.com/xyz/"
                                                value="<?= $social_media->pinterest_id ?? '' ?>">
                                            <p id="pinterest_message" class="validation-message"></p>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="inputEmail1" class="form-label">Instragram Id</label>
                                            <input type="text" id="instagram_id" name="instragram_id"
                                                class="form-control"
                                                placeholder="https://www.instagram.com/xyz?utm_source=qr&igsh=MW1oejcwbXM4d2F6Zg=="
                                                value="<?= $social_media->instragram_id ?? '' ?>">
                                            <p id="instagram_message" class="validation-message"></p>
                                        </div>


                                        <div class="col-md-12 text-end">
                                            <button type="submit" class="btn btn-outline-secondary w-25"
                                                id="socialmediasubmitButton">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include_once ('includes/footer.php') ?>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const validators = {
                linkedin: /^https:\/\/www\.linkedin\.com\/in\/[a-zA-Z0-9-]+\/?$/,
                facebook: /^https:\/\/www\.facebook\.com\/profile\.php\?id=\d+(&mibextid=\w+)?$/,
                twitter: /^https:\/\/twitter\.com\/[a-zA-Z0-9_]+\/?$/,
                pinterest: /^https:\/\/in\.pinterest\.com\/[a-zA-Z0-9-_]+\/?$/,
                instagram: /^https:\/\/www\.instagram\.com\/[a-zA-Z0-9_.]+\/?$/
            };

            const elements = {
                linkedin: document.getElementById('linkedin_id'),
                facebook: document.getElementById('facebook_id'),
                twitter: document.getElementById('twitter_id'),
                pinterest: document.getElementById('pinterest_id'),
                instagram: document.getElementById('instagram_id')
            };

            const messages = {
                linkedin: document.getElementById('linkedin_message'),
                facebook: document.getElementById('facebook_message'),
                twitter: document.getElementById('twitter_message'),
                pinterest: document.getElementById('pinterest_message'),
                instagram: document.getElementById('instagram_message')
            };

            const submitButton = document.getElementById('socialmediasubmitButton');

            function validateURL(type, url) {
                return validators[type].test(url);
            }

            function handleValidation(event) {
                const id = event.target.id;
                const type = id.split('_')[0];
                const value = event.target.value;
                const isValid = validateURL(type, value);
                if (value === '') {
                    elements[type].classList.remove('valid', 'invalid');
                    messages[type].textContent = '';
                } else {
                    const isValid = validateURL(type, value);
                    if (isValid) {
                        elements[type].classList.remove('invalid');
                        elements[type].classList.add('valid');
                        messages[type].textContent = '';
                    } else {
                        elements[type].classList.remove('valid');
                        elements[type].classList.add('invalid');
                        messages[type].textContent = `Invalid ${type.charAt(0).toUpperCase() + type.slice(1)} URL`;
                        messages[type].classList.add('invalid-message');
                    }
                }

                checkFormValidity();
            }

            function checkFormValidity() {
                const allValid = Object.keys(elements).every(key => {
                    const value = elements[key].value;
                    return value === '' || validateURL(key, value);
                });

                submitButton.disabled = !allValid;
            }

            Object.keys(elements).forEach(key => {
                elements[key].addEventListener('input', handleValidation);
            });

            checkFormValidity(); // Initial check to disable the button on page load
        });
    </script>