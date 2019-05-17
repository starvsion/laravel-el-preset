Use this repo as a skeleton for your new preset, once you're done please open an issue on [this repo](https://github.com/laravel-frontend-presets/internals).

Here's the latest documentation on Laravel 5.6:

https://laravel.com/docs/master/

### Not Yet Complete, try at your own risk. Will make a non-SPA version later.

# A Boilerplate repo for presets

This package makes it easy to use [Element UI](http://element.eleme.io/) with Laravel 5.6+. 

Element UI is a UI Kit and CSS framework that primarily designed for Vue. It includes the most commonly used UI components that looks modern, clean and easy to work with. It can be used as a replacement for Bootstrap, or work alongside Bootstrap. 

You can start using Element-UI with adding `el-` in front of UI elements (e.g. `el-input`, `el-button`).

This package aims at being Vue Beginner friendly, so no vuex or vue-router is used (will do a SPA version later), instead, it uses regular redirects. If you finished reading Vue Docs, you should understand what is happening here.

### Fun fact
Element UI's parent company, is called `eleme`, which is one of the largest Chinese food delivery company similar to Uber Eats. Eleme means *Are you hungry* in Chinese. Eleme developed Element UI for their own use, similar to how Facebook developed React.

### Note

**Element UI** uses these following acronyms:  `element-ui`, `el`

## Contents

- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)


## Installation

### Note
This is designed for Laravel 5.6+ Folder Structure, will figure something out for 5.5

To install this preset on your laravel application, simply run:

``` bash
composer require laravel-frontend-presets/el-preset
```

To make preset, run : 
``` bash
# if you just want the preset
php artisan preset element-ui
# this is adding preset + artisan make:auth
php artisan preset element-ui-auth
 ```

And then, run (replace `&&` with `;` in fish shell): 
``` bash
# If you use yarn
yarn && yarn watch
# If you use npm
npm install && npm watch
```
## Usage

### Assumption

I assume that you have a basic understanding in : 

1. Vue 
2. Laravel Mix
3. Blade

### Vue

I uncommented the Vue Component Auto Add from `index.js`, so if your Vue Components uses `PascalCase`, then it will be imported automatically into `kebab-case`, and Laravel Mix will compile accordingly.

If you need jQuery, please only include the slim version.

### Laravel Mix

It is recommended to add `.version()` at the end of `webpack.mix.js`. 

### Element UI

Both front end and back end validation handling has been included in the included components. They are crazy easy, and if you are confused, kindly refer to [Element UI Form](https://element.eleme.io/#/en-US/component/form).

I am to duplicate the original Laravel Auth Components as closely as possible (without font awesome and bootstrap of course). 

## Contributing

Please check our contributing rules in [our website](https://laravel-frontend-presets.github.io) for details.

## Credits

- [Shuyi](https://github.com/starvsion)
- [All Contributors](../../contributors)

## License

The MIT License (MIT).
