<link rel="stylesheet" href="./css/persanal_data.css">
<form class="personal-data">
    <div class="personal-data__line">
        <div class="personal-data__item">
            <div class="app-input">
                <div class="app-input__label">
                    Фамилия
                </div> 
                <label class="app-input__wrapper">
                    <input type="text" placeholder="" tabindex="1" minlength="2" maxlength="50" name="" required="required">
                </label>
            </div>
        </div> 
        <div class="personal-data__item">
            <div class="app-input">
                <div class="app-input__label">
                  Имя
                </div>
                <label class="app-input__wrapper">
                  <input type="text" placeholder="" tabindex="2" minlength="2" maxlength="50" name="" required="required">
                </label> 
              </div> 
            </div>
          </div> 
          <div class="personal-data__line">
            <div class="personal-data__item">
              <div class="app-input">
                <div class="app-input__label">
                  Отчество
                </div> <label class="app-input__wrapper">
                  <input type="text" placeholder="" tabindex="3" maxlength="50" name="">
                </label>
              </div>
            </div> 
            <div class="personal-data__item">
              <div class="app-input" tabindex="4" name="birthday">
                <div class="datepicker">
                  <div class="datepicker__label datepicker__error">
                    Дата рождения
                  </div>
                  <span>
                    <label class="datepicker__input-wrapper datepicker__error">
                      <input placeholder="" tabindex="0" required="required" type="text" class="datepicker__input">
                  </span>
                </div> 
              </div> 
            </div>
          </div> 
          <div class="personal-data__line">
            <div class="personal-data__item">
              <div data-v-3ba30185="" class="phone-input__wrapper" tabindex="-1"><div data-v-3ba30185="" class="label">
                Телефон
              </div> 
              <label data-v-3ba30185="" class="phone-input disabled"><!----> <input data-v-3ba30185="" placeholder="Номер телефона" tabindex="-1" required="required" disabled="disabled" autocomplete="tel tel-local tel-national" name="phone" type="tel" inputmode="tel" class="phone-input__input phone-input__input--short">
            </label>
          </div> 
      </div> 
      <div class="item-data"><div class="app-input"><div class="app-input__label">
        E-mail
      </div> 
      <label class="app-input__wrapper">
        <input type="text" placeholder="" tabindex="5" maxlength="50" name="" required="required"></label> 
        <div class="app-input__list"> 
        </div>
      </div>
    </div>
  </div> 
  <div class="personal-data__submit">
    <div type="submit" disabled="disabled" class="button personal-data__button blue disabled"> 
      Сохранить изменения 
    </div>
  </div>
</form>