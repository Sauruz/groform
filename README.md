## Groform
A Laravel package to create forms easily with in build validation.

### Installation
___
By default, Composer pulls in packages from Packagist so you’ll have to make a slight adjustment to your project composer.json file. Open the file and update include the following array somewhere in the object:
````
"repositories": [
    {
    "type": "vcs",
    "url": "https://github.com/sauruz/groform"
    }
]
````

Now composer will also look into this repository for any installable package. Execute the following command to install the package:

````
composer require sauruz/groform
````

Now, open the config/app.php file and scroll down to the providers array. In that array, there should be a section for the package service providers. Add the following line of code in that section:

```
/*
* Package Service Providers...
*/
Gromatics\Groform\Providers\GroformProvider::class
```

### Publish files
___
Groform standard ships with 1 example contact and input fields. You can edit them the way you like.

Publish the forms
````
php artisan vendor:publish --tag=groform-forms
````
Publish the views
````
php artisan vendor:publish --tag=groform-views
````

The example contact form will be added to `resources/groforms/`. Remember, groforms always have the extension groform.php.
The input views will be added to `resources/views/groform/`.

### Use Forms
___
In the example `contact.groform.php` you can find all the configurations. 
To use the example contact form simply add this to a view:
````
<x-groform form="contact"/>
````

to validate the contact form you can do this in your controller:

````
use Gromatics\Groform\Groform;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function store(Request $request) {
        $request->validate(Groform::validationRules('contact'));
        ...
    }
}
````
