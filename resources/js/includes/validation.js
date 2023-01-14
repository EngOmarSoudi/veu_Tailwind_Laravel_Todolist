import { Form as veeForm,Field as veeFieled, defineRule , ErrorMessage} from "vee-validate";
import {required , min , max , alpha_spaces as alphaSpaces , between  } from "@vee-validate/rules";
export default{
    install(app){
        app.component('vee-form',veeForm);
        app.component('vee-field',veeFieled);
        app.component( "ErrorMessage", ErrorMessage );
        defineRule('required',required);
        defineRule('min',min);
        defineRule('max',max);
        defineRule('alpha_spaces',alphaSpaces);
        defineRule('between',between);
    },
}
