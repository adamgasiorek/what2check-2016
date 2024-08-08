$(document).ready(function() {

    $('.ui.form').form({
        fields : {
            login : {
                identifier : 'login',
                rules : [{
                    type : 'empty',
                    prompt : 'Please enter your login'
                }, {
                    type : 'length[6]',
                    prompt : 'Your login must be at least 6 characters'
                }]
            },
            email : {
                identifier : 'email',
                rules : [{
                    type : 'empty',
                    prompt : 'Please enter your email'
                }, {
                    type : 'email',
                    prompt : 'It must be email'
                }]
            },
            terms: {
                identifier: 'terms',
                rules: [
                    {
                        type   : 'checked',
                        prompt : 'You must agree to the terms and conditions'
                    }
                ]
            },
            password : {
                identifier : 'password',
                rules : [{
                    type : 'empty',
                    prompt : 'Please enter your password'
                }, {
                    type : 'length[6]',
                    prompt : 'Your password must be at least 6 characters'
                }]
            },
            password2 : {
                identifier : 'password2',
                rules : [{
                    type : 'empty',
                    prompt : 'Please enter your password'
                }, {
                    type : 'length[6]',
                    prompt : 'Your password must be at least 6 characters'
                }, {
                    type : 'match[password]',
                    prompt : 'Must be the same'
                }]
            }
        }
    });



    $('.checkbox').checkbox();

});