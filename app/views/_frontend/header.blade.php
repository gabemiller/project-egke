<header>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="head">
                <nav class="main-navbar">
                    <ul>
                        @include('_frontend.menu', array('items' => $mainMenu->roots()))
                    </ul>
                </nav>
                </div>
            </div>
        </div>
    </div>
</header>