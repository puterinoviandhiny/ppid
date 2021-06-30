<!-- FOOTER -->
<footer class="uk-section uk-section-secondary uk-padding-remove-bottom">
    <div class="uk-container">
        <div class="uk-grid uk-grid-large" data-uk-grid>
            <div class="uk-width-1-2@m">
                <h5>PPID KOTA PONTIANAK</h5>
                <ul class="uk-list">
                    <li>Telpon : (0561) 733041</li>
                    <li>Email : kominfo@pontianakkota.go.id</li>
                </ul>
                <div>
                    <a href="" class="uk-icon-button" data-uk-icon="twitter"></a>
                    <a href="" class="uk-icon-button" data-uk-icon="facebook"></a>
                    <a href="" class="uk-icon-button" data-uk-icon="instagram"></a>
                </div>
            </div>
            <div class="uk-width-1-2@m">
                <img src="{{ asset ('img/ppid4.png') }}" alt="Logo" width="400px" height="100px">
            </div>
            </div>

        </div>
    </div>

    <div class="uk-text-center uk-padding uk-padding-remove-horizontal">
        <span class="uk-text-small uk-text-muted">© 2019 PPID Kota Pontianak</span>
    </div>
</footer>
<!-- /FOOTER -->
<!-- JS FILES -->
<script src="https://cdn.jsdelivr.net/npm/uikit@latest/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@latest/dist/js/uikit-icons.min.js"></script>

{!! NoCaptcha::renderJs() !!}
<script>

    var bar = document.getElementById('js-progressbar');

    UIkit.upload('.js-upload', {

        url: '',
        multiple: true,

        beforeSend: function () {
            console.log('beforeSend', arguments);
        },
        beforeAll: function () {
            console.log('beforeAll', arguments);
        },
        load: function () {
            console.log('load', arguments);
        },
        error: function () {
            console.log('error', arguments);
        },
        complete: function () {
            console.log('complete', arguments);
        },

        loadStart: function (e) {
            console.log('loadStart', arguments);

            bar.removeAttribute('hidden');
            bar.max = e.total;
            bar.value = e.loaded;
        },

        progress: function (e) {
            console.log('progress', arguments);

            bar.max = e.total;
            bar.value = e.loaded;
        },

        loadEnd: function (e) {
            console.log('loadEnd', arguments);

            bar.max = e.total;
            bar.value = e.loaded;
        },

        completeAll: function () {
            console.log('completeAll', arguments);

            setTimeout(function () {
                bar.setAttribute('hidden', 'hidden');
            }, 1000);

            alert('Upload Completed');
        }

    });

</script>
    </body>
</html>
