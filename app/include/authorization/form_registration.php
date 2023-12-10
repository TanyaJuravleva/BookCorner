<div id="popupFormRegistration" class="modal micromodal-slide" aria-hidden="false">
    <div data-custom-close="1" tabindex="-1" class="modal__overlay">
        <div class="modal__wrapper">
            <div aria-labelledby="modal-1-title" role="dialog" aria-modal="true" class="modal__container form-popup">
                <div class="form-block">
                    <h2 class="form-block__header">Регистрация</h2>
                    <form enctype="multipart/form-data" action="app/controller/reg.php" method="POST" id="formRegistation" name="form" class="form-block__login" novalidate="novalidate">
                        <input class="form-block__item js-form-input-name" type="text" name="name" placeholder="Ваше имя">
                        <p class="phone-prec">Не обязательно для заполнения</p>
                        <input class="form-block__item js-form-input-phone" type="tel" name="phone" placeholder="Телефон">
                        <input class="form-block__item js-form-input-email" type="text" name="email" placeholder="Email">
                        <input class="form-block__item js-form-input-pass" type="text" name="password" placeholder="Пароль">
                        <button class="email-exist dis-none">Пользователь с таким имейлом уже существует</button>
                        <input class="form-block__btn js-send-form" type="submit" name="proceed" value="Продолжить">
                    </form>
                    <button title="Close (Esc)" class="modal__close" data-custom-close="2">×</button>
                </div>
            </div>
        </div>
    </div>
</div>