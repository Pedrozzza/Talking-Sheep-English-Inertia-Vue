import { defineRule, configure } from "vee-validate";
import { localize } from '@vee-validate/i18n';
import { required, email, min, max, confirmed, regex } from '@vee-validate/rules';

defineRule('required', required );
defineRule('email', email );
defineRule('min', min );
defineRule('max', max );
defineRule('confirmed', confirmed);
defineRule('regex', regex);

configure({
    generateMessage: localize('cs', {
        messages: {
            required: 'Pole je povinné',
            email: 'Email není ve správném formátu',
            min: 'Pole musí obsahovat alespoň počet znaků (0:{length})',
            max: 'Pole nesmí být delší než 0:{length} znaků',
            confirmed: 'Hesla se musí shodovat',
            regex: 'Tel. číslo není ve správném formátu',
        }
    })
})
