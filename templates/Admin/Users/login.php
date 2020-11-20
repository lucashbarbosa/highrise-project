<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    <div class="users form">
                                        <?= $this->Flash->render('auth') ?>
                                        <?= $this->Form->create() ?>
                                        <fieldset>
                                            <legend><?= __('Por favor informe seu usuário e senha') ?></legend>
                                            <?= $this->Form->input('username') ?>
                                            <?= $this->Form->input('password') ?>
                                        </fieldset>
                                        <?= $this->Form->button(__('Login')); ?>
                                        <?= $this->Form->end() ?>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>