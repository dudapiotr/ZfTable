ZfTable 3.0 [See on live (new site)](http://dudapiotr.eu)
=======
Version 3.0 Created by Piotr Duda

Download
-----------
[Complete site : dudapiotr.eu](https://drive.google.com/file/d/0B4WJ3MxrRUAENF9haVlxZEZ4eURwRU12WXBWUDVraXU0bFFZ/edit?usp=sharing)

Introduction
------------

Awesome table/grid (and much much more) generator with huge possibilities of decorating and conditioning. 
Integrated with DataTables, Doctrine 2, Bootstrap 2.0 and 3.0.

Contributors
------------
If you want to help develop this module please don't hesitate. 


Requirements
------------

* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)


Features
----------------
-  Flexible generating table
-  Decoratoring headers, rows and cell
-  Conditional decorating (Greater, Lesser, Equal, NotEqual, Between)
-  Simply Integration with DataTables
-  Pagination, QuickSearch, Sorting and Items per page
-  Default Bootstrap layout - support for Bootstrap 3.0 and 2.2.2
-  Simple customization (show in example -  we can change table view to any view eq list of articles with all features like pagination, quicksearch, sorint and item per page)
-  Editable decorator -> the ability to edit data from the table level
-  Filtering for each column
-  Row decorator for separeting row by ordering column (dividing the same data)
-  Exporter data to CVS
-  Callable decorator
-  Doctrine 2 Adapter (Source)
-  Array Adaper  (Source)
-  JavaScript Events (Callable Events)
-  Possibility to send additional params

Changes in Version 3.0
----------------
- Callable decorator
- Doctrine 2 Adapter (Source)
- Array Adaper  (Source)
- JavaScript Events (Callable Events)
- Possibility to send additional params


Changes in Version 2.0
----------------
-  Editable decorator -> the ability to edit data from the table level
-  Filtering for each column
-  Row decorator for separeting row by ordering column (dividing the same data)
-  New conditions
-  Exporter data to CVS
-  Support for Bootstrap 3.0


In next verions
----------------

- Export only selected data
- Add dynamicly (by ajax) new row
- More decorators and conditions
- Adapter for Doctrine 2 and Arrays
- Adapter for JGrid
- Exporter (PDFV)


Installation
------------

### Main Setup

#### By cloning project

Clone this project into your `./vendor/` directory.

#### With composer

1. Add this project in your composer.json:

    ```json
    "require": {
        "dudapiotr/zftable": "dev-master"
    }
    ```

2. Now tell composer to download ZfTable by running the command:

    ```bash
    $ php composer.phar update
    ```

#### Post installation

1. Enabling it in your `application.config.php`file.

    ```php
    <?php
    return array(
        'modules' => array(
            // ...
           'ZfTable',
        ),
        // ...
    );
    ```

2. From public directory (in sources) copy optional files (js, css and images) to your public.
All files are optional (zf-table.js is need to use own engine, but also can use dataTables engine)




Examples [See on live](http://dudapiotr.eu)
-------
In Example directory there is a couple of examples how use decorators and generate table. After added js and css file
to your layout view, in controller there are a table calls(based on datas from ZF2 tutorial - album ).
