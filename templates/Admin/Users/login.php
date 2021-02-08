<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 offset-3">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome to the Highrise Dashboard!</h1>
                                    </div>

                                    <div class="users form">
                                        <?= $this->Flash->render('auth') ?>
                                        <?= $this->Form->create() ?>
                                        <fieldset>

                                            <label>Username</label>
                                            <?= $this->Form->input('username', ['class' => 'form-control mb-3']) ?>
                                            <label>Password</label>
                                            <?= $this->Form->input('password', ['class' => 'form-control mb-3', 'type' => 'password']) ?>
                                        </fieldset>
                                        <?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary']); ?>
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
