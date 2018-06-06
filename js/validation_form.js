$(document).ready(function () {
    $('#contact_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        submitHandler: function () {
            $('#success_message').slideDown({opacity: "show"}, "slow");
            $('#contact_form').data('bootstrapValidator').resetForm();
        },
        fields: {
            first_name: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Моля въведете име!'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'В полето може да има само азбучни букви и интервали!'
                    }
                }
            },
            last_name: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Моля въведете фамилия!'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'В полето може да има само азбучни букви и интервали!'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Моля въведете e-mail адрес!'
                    },
                    emailAddress: {
                        message: 'Моля въведете валиден e-mail адрес!'
                    }
                }
            },
            phone: {
                validators: {
                    phone: {
                        country: 'BG',
                        message: 'Моля въведете валиден телефонен номер за България!'
                    }
                }
            },
            comment: {
                validators: {
                    stringLength: {
                        min: 10,
                        max: 200,
                        message: 'Моля въведете поне 10 символа и не повече от 200!'
                    },
                    notEmpty: {
                        message: 'Моля въведете вашето съобщение към нас!'
                    }
                }
            }
        }
    })
});

//registration form validations
$(document).ready(function () {
    $('#registration_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Моля въведете име!'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'В полето може да има само азбучни букви и интервали!'
                    }
                }
            },
            last_name: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Моля въведете фамилия!'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'В полето може да има само азбучни букви и интервали!'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Моля въведете e-mail адрес!'
                    },
                    emailAddress: {
                        message: 'Моля въведете валиден e-mail адрес!'
                    },
                    remote: {
                        type: 'POST',
                        url: 'remote.php',
                        message: 'Този имейл вече е регистриран в системата!',
                        delay: 2000,
                        data:{
                            type:'email'
                        }
                    }
                }
            },
            username: {
                validators: {
                    stringLength: {
                        min: 3,
                        max: 20,
                        message: 'Потребителското име трябва да е с дължина между 3-20 символа!'
                    },
                    notEmpty: {
                        message: 'Моля въведете вашето потребителско име!'
                    },
                    remote: {
                        type: 'POST',
                        url: 'remote.php',
                        message: 'Потребителското име е заето!',
                        delay: 2000,
                        data:{
                            type:'username'
                        }
                    },
                    regexp: {
                        regexp: /^[\w]+$/,
                        message: 'В полето НЕ може да има знаци и интервали!'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Моля въведете парола!'
                    },
                    stringLength: {
                        min: 6,
                        max: 20,
                        message: 'Паролата трябва да е с дължина между 6-20 символа!'
                    }
                }
            },
            confirm_password: {
                validators: {
                    notEmpty: {
                        message: 'Моля въведете същата парола!'
                    },
                    identical: {
                        field: 'password',
                        message: 'Паролата не съвпада!'
                    }
                }
            }
        }
    })
});

//Login form validate
$(document).ready(function () {
    $('#login_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Моля въведете вашето потребителско име!'
                    },
                }
            },
            password: {
                validators: {
                    stringLength: {
                        min: 6,
                        max: 20,
                        message: 'Паролата трябва да е с дължина между 6-20 символа!'
                    },
                    notEmpty: {
                        message: 'Моля въведете парола!'
                    }
                }
            }
        }
    })
});

$(document).ready(function () {
    $('#survey-headers').bootstrapValidator({
        fields: {
            title: {
                validators: {
                    stringLength: {
                        min: 3,
                        max: 100,
                        message: 'Заглавието трябва да е с дължина между 3-50 символа!'
                    },
                    notEmpty: {
                        message: 'Моля въведете заглавие!'
                    },
                    remote: {
                        type: 'POST',
                        url: 'remote.php',
                        message: 'Това заглавие вече съществува!',
                        delay: 2000,
                        data:{
                            type:'title'
                        }
                    }
                }
            }
        }
    })
});

$(document).ready(function () {
    $('#makeAdmin').bootstrapValidator({
        fields: {
            userforadmin: {
                validators: {
                    notEmpty: {
                        message: 'Моля въведете потребителско име!'
                    },
                    remote: {
                        type: 'POST',
                        url: 'remote.php',
                        message: 'Потребителкото име не съществува!',
                        delay: 2000,
                        data:{
                            type:'userforadmin'
                        }
                    }
                }
            }
        }
    })
});

$(document).ready(function () {
    $('#remove-admin').bootstrapValidator({
        fields: {
            userNoadmin: {
                validators: {
                    notEmpty: {
                        message: 'Моля въведете потребителско име!'
                    },
                    remote: {
                        type: 'POST',
                        url: 'remote.php',
                        message: 'Потребителкото име не съществува!',
                        delay: 2000,
                        data:{
                            type:'userNoadmin'
                        }
                    }
                }
            }
        }
    })
});



