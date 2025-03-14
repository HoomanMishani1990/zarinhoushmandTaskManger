<?php

return [
    'required' => ':attribute الزامی است.',
    'email' => ':attribute باید یک آدرس ایمیل معتبر باشد.',
    'min' => [
        'string' => ':attribute باید حداقل :min کاراکتر باشد.',
    ],
    'max' => [
        'string' => ':attribute نباید بیشتر از :max کاراکتر باشد.',
    ],
    // ... add more validation messages

    'attributes' => [
        'name' => 'نام',
        'email' => 'ایمیل',
        'password' => 'رمز عبور',
        'title' => 'عنوان',
        'description' => 'توضیحات',
        // ... add more attributes
    ],
]; 