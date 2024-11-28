<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Appcore - Forgot Password</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="css/slick.css"/>
        <style type="text/css">
            /* Custom styles for flash messages */
            .flash-message {
                padding: 10px;
                margin-bottom: 20px;
                border-radius: 5px;
                font-size: 16px;
                transition: opacity 0.3s ease;
            }
            .flash-message.success {
                background-color: #d4edda;
                color: #155724;
                border: 1px solid #c3e6cb;
            }
            .message.error {
                background-color: #f8d7da;
                color: #721c24;
                border: 1px solid #f5c6cb;
            }
            .flash-message.info {
                background-color: #cce5ff;
                color: #004085;
                border: 1px solid #b8daff;
            }
            .flash-message.warning {
                background-color: #fff3cd;
                color: #856404;
                border: 1px solid #ffeeba;
            }
        </style>
        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
    </head>
    
    <body>

        <section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>

        <main>
            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto col-12">
                            <!-- Display Flash messages here -->
                            <?= $this->Flash->render() ?>

                            <h1 class="hero-title text-center mb-5">Forgot Password</h1>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <?= $this->Form->create($userData,['id'=>'forgot_password']) ?>

                                        <div class="form-floating mb-4 p-0">
                                            <?= $this->Form->control('email',['type'=>'email','label'=>false,'class'=>'form-control']) ?>
                                            <label for="email">Email address</label>
                                        </div>

                                        

                                        <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            <?= __("forgot_password") ?>
                                        </button>

                                    <?= $this->Form->end() ?>
                                    <p class="text-center"><a href="<?= $this->Url->build(['_name'=>'user_signin']) ?>">Back to sign in </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a class="text-white mb-3"  href="<?= $this->Url->build(["_name"=>"home"]) ?>">Appcore Labs</a></h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 <strong>Little Fashion</strong></p>
                        <br>
                        <p class="copyright-text">Designed by <a href="<?= $this->Url->build(["_name"=>"home"]) ?>" target="_blank">Appcore Labs</a></p>
                    </div>
                    <div class="col-lg-5 col-8">
                        <h5 class="text-white mb-3">Sitemap</h5>
                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item"><a href="about.html" class="footer-menu-link">Story</a></li>
                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Blogs</a></li>
                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy policy</a></li>
                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">FAQs</a></li>
                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-4">
                        <h5 class="text-white mb-3">Social</h5>
                        <ul class="social-icon">
                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>
                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>
                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>
                            <li><a href="#" class="social-icon-link bi-skype"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>
        <?= $this->Html->script('jquery.validate.min.js') ?>
        <?= $this->Html->script('users.js') ?>
    </body>
</html>
