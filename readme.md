# L4 Form component (practice)

This form component just for practice

## installing

for simple way, try using composer,
add this on your composer.json file in require tag

    "pieter/form-component": "dev-master"

and run from terminal

    ~/php composer.phar update "pieter/yaml"

after that,
add this code on **app/config/app.php**

    array(
      'providers' => array (
            other providers,
            'Pieter\FormComponent\FormComponentServiceProvider',
        ),
      'aliases' => array (
            other aliases,
            'CForm'           => 'Pieter\FormComponent\Facades\CDate',
        )
      ),
    )

## How to use

just call the cForm from [your-view].blade.php

    {{ CForm::custom_year('tahun', array(2008, 2013)) }}


enjoy it !

