import { Form as veeForm,Field as veeFieled, defineRule , ErrorMessage} from "vee-validate";
import {required} from "@vee-validate/rules";
export default{
    install(app){
        app.component('vee-form',veeForm);
        app.component('vee-field',veeFieled);
        app.component( "ErrorMessage", ErrorMessage );
        defineRule('required',required)
    },
}
