# CI_Language_Sprintf
CodeIgniter Language sprintf Helper

# Why?

Because call the function with a variable that is given by a function return is a bit ugly and usually error-prone...

The old one
```php
echo sprintf(lang('error_email_missing'), 5);
```
VS the new one
```php
echo lang_sprintf('error_email_missing', 5);
```

# Description

```php
string lang_sprintf(string $line [, mixed $args... ])
```
Fetches a language variable and replace % control word in line with extra variables

Like sprintf, but first param is CI language line, the rest is as same as sprintf() or printf()
(http://php.net/manual/en/function.sprintf.php)

# How to use

1. Put **application/helpers/language_sprintf_helper.php** to your **application/helpers/** folder
2. Write your language lines, you can use any control word that available in sprintf.

  ```php
  $lang['error_email_missing'] = 'You must submit an email address. (Error code: %09d)';
  ```
  
3. Load the helper and call lang_sprintf(string $line [, mixed $args... ])

  ```php
  $this->load->helper('language_sprintf');
  
  $this->lang->load('error', 'english);
  
  echo lang_sprintf('error_email_missing', 5);
  ```
  
4. Done!

  ```
  You must submit an email address. (Error code: 000000005)
  ```
