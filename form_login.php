<div id="popupFormLogin" class="modal micromodal-slide" aria-hidden="false">
    <div data-custom-close="1" tabindex="-1" class="modal__overlay">
        <div class="modal__wrapper">
            <div aria-labelledby="modal-1-title" role="dialog" aria-modal="true" class="modal__container form-popup">
                <div class="form-block">
                    <h2 class="form-block__header">Вход</h2>
                    <form enctype="multipart/form-data" method="POST" name="login" class="form-block__login" novalidate="novalidate">
                        <input type="hidden" name="form_type" value="login">
                        <input class="form-block__item js-form-input" type="text" name="name" placeholder="Ваше имя">
                        <input class="form-block__item js-form-input" type="text" name="phone" placeholder="Пароль">
                        <div class="button_container">
                            <div class="preloader js-form-preloader"></div>
                            <input class="form-block__btn js-send-form" type="submit" name="proceed" value="Продолжить">
                        </div>
                    </form>
                    <button title="Close (Esc)" class="modal__close" data-custom-close="2">×</button>
                </div>
            </div>
        </div>
    </div>
</div>