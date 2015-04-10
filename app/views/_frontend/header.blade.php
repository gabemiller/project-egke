<header>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="head">
                    <div class="site-title">
                        <img class="no-border" src="/assets/cross.svg" alt="Görög Katolikus kereszt">

                        <h1>Encsi Görög Katolikus Egyházközség</h1>
                    </div>
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
<section class="webradio">
    <div class="container">
        <div class="radio-container">
        <h1 class="player-title">Webrádió</h1>

        <div class="player-wrapper">
            <audio class="audio-player" preload="auto" controls>
                <source src="http://online.szentistvanradio.hu:7000/;&type=mp3" type="audio/mpeg"/>
            </audio>
        </div>

        <form class="form-inline">
            <div class="form-group">
                <label>Válasszon egy rádióállomást</label>
                <select name="radio" class="form-control input-sm radio-select">
                    <option value="http://92.43.201.24:8000/mr">Mária rádió</option>
                    <option selected value="http://online.szentistvanradio.hu:7000/;&type=mp3">Szent István
                        rádió
                    </option>
                    <option value="http://katolikusradio.hu:9000/live_low.mp3">Katolikus rádió
                    </option>
                </select>
            </div>
        </form>
        </div>
    </div>
</section>