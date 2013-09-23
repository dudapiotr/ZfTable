ZfTable [See on live](http://dudapiotr.eu/table/changes)
=======
Version 0.0.3 Created by Piotr Duda

Introduction
------------

Flexible table generator with headers decorating , rows and cells. 
It Uses own engine to communication by ajax (Pagination, QuickSearch, Sorting and Items per page), 
but  simply can be integrated with [dataTables](http://www.datatables.net/) as well. 


Requirements
------------

* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)


Features
----------------
- Flexible generating table
- Decoratoring headers, rows and cell
- Conditional decorating
- Simply Integration with DataTables
- Pagination, QuickSearch, Sorting and Items per page
- Default Bootstrap layout
- Simple customization (show in example -  we can change table view to any view eq list of articles with all features like pagination, quicksearch, sorint and item per page)

Version 2.0 (planned for release 23.09.2013)
----------------
-  Editable decorator -> the ability to edit data from the table level
-  Filtering for each column
-  Row decorator for separeting row by ordering column (dividing the same data)
-  New conditions
-  Exporter data to CVS




Goals
----------------

- More decorators and conditions
- Adapter for Doctrine 2 and Arrays
- Adapter for JGrid
- Exporter (PDF, CSV)


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




Examples [See on live](http://zfcrm.laohost.net/table/base)
-------
In Example directory there is a couple of examples how use decorators and generate table. After added js and css file
to your layout view, in controller there are a table calls(based on datas from ZF2 tutorial - album ).
