<link rel="stylesheet" href="./css/persanal_data.css">
<form class="personal-data">
    <div class="personal-data__line">
        <div class="personal-data__item">
            <div class="app-input">
                <div class="app-input__label">
                    Фамилия
                    <span class="app-input__asterisk">*</span>
                </div> 
                <label class="app-input__wrapper">
                    <input type="text" placeholder="" tabindex="1" minlength="2" maxlength="50" name="" required="required">
                </label>
                <div class="app-input__list"> 
                    <ul class="app-input__items-list"></ul> 
                </div>
            </div>
        </div> 
        <div class="personal-data__item">
            <div class="app-input">
                <div class="app-input__label">
    Имя
     <span class="app-input__asterisk">
      *
    </span></div> <label class="app-input__wrapper"><input type="text" placeholder="" tabindex="2" minlength="2" maxlength="50" name="" required="required"></label> <!----> <div class="app-input__list"> <ul class="app-input__items-list"></ul> </div></div> <!----></div></div> <div class="personal-data__line"><div class="personal-data__item"><div class="app-input"><div class="app-input__label">
    Отчество
     <!----></div> <label class="app-input__wrapper"><input type="text" placeholder="" tabindex="3" maxlength="50" name=""></label> <!----> <div class="app-input__list"> <ul class="app-input__items-list"></ul> </div></div> <!----></div> <div class="personal-data__item"><div class="app-input" tabindex="4" name="birthday"><div class="datepicker"><div class="datepicker__label datepicker__error">
      Дата рождения
      <span class="app-input__asterisk">
        *
      </span></div> <span><label class="datepicker__input-wrapper datepicker__error"><input placeholder="" tabindex="0" required="required" type="text" class="datepicker__input"> <!----> <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" alt="Календарь" class="datepicker__calendar-icon datepicker__calendar-icon--mobile"><rect x="2" y="3" width="12" height="11" rx="1" stroke="#26A9E0" stroke-width="1.5"></rect><path d="M12 1v2" stroke="#26A9E0" stroke-width="1.5" stroke-linecap="round"></path><path d="M4 1v2" stroke="#26A9E0" stroke-width="1.5" stroke-linecap="round"></path><path d="M5 7.31h6" stroke="#26A9E0" stroke-width="1.5" stroke-linecap="round"></path></svg> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" alt="Календарь" class="datepicker__calendar-icon datepicker__calendar-icon--desktop"><rect x="3" y="5" width="18" height="16" rx="2" stroke="#26A9E0" stroke-width="1.5"></rect><path d="M17 2v2" stroke="#26A9E0" stroke-width="1.5" stroke-linecap="round"></path><path d="M7 2v2" stroke="#26A9E0" stroke-width="1.5" stroke-linecap="round"></path><path d="M7 11.223h10" stroke="#26A9E0" stroke-width="1.5" stroke-linecap="round"></path></svg></label><div data-v-39b30300="" class="vc-popover-content-wrapper is-interactive" style="margin: 0px;"><!----></div></span></div> <div class="datepicker__error-message">
    Поле обязательно для заполнения
  </div></div> <!----></div></div> <div class="personal-data__line"><div class="personal-data__item"><div data-v-3ba30185="" class="phone-input__wrapper" tabindex="-1"><div data-v-3ba30185="" class="label">
    Телефон
    <span data-v-3ba30185="" class="asterisk">
      *
    </span></div> <label data-v-3ba30185="" class="phone-input disabled"><!----> <input data-v-3ba30185="" placeholder="Номер телефона" tabindex="-1" required="required" disabled="disabled" autocomplete="tel tel-local tel-national" name="phone" type="tel" inputmode="tel" class="phone-input__input phone-input__input--short"></label> <!----> <!----></div> <p class="personal-data__item-info">
          Чтобы изменить номер телефона, пожалуйста, обратитесь в службу поддержки
        </p></div> <div class="item-data"><div class="app-input"><div class="app-input__label">
    E-mail
     <span class="app-input__asterisk">
      *
    </span></div> <label class="app-input__wrapper"><input type="text" placeholder="" tabindex="5" maxlength="50" name="" required="required"></label> <!----> <div class="app-input__list"> <ul class="app-input__items-list"></ul> </div></div> <!----></div></div> <div class="personal-data__submit"><!----> <div type="submit" disabled="disabled" class="button personal-data__button blue disabled"> Сохранить изменения </div></div></form>