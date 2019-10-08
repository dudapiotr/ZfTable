[![Build Status](https://travis-ci.org/dudapiotr/ZfTable.svg?branch=master)](https://travis-ci.org/dudapiotr/ZfTable)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dudapiotr/ZfTable/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/dudapiotr/ZfTable/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/dudapiotr/zftable/v/stable.svg)](https://packagist.org/packages/dudapiotr/zftable) [![Total Downloads](https://poser.pugx.org/dudapiotr/zftable/downloads.svg)](https://packagist.org/packages/dudapiotr/zftable) [![License](https://poser.pugx.org/dudapiotr/zftable/license.svg)](https://packagist.org/packages/dudapiotr/zftable)

Not supported ZfTable 3.1 [See on live (new site)](http://dudapiotrek.laohost.net/)
=======
Version 3.1 Created by Piotr Duda

Download
-----------
[Complete site : dudapiotr.eu](https://drive.google.com/file/d/0B4WJ3MxrRUAEOWp5emFaNlpBNGM/edit?usp=sharing)


Introduction
------------

Awesome table/grid (and much much more) generator with huge possibilities of decorating and conditioning. 
Integrated with DataTables, Doctrine 2, Bootstrap 2.0 and 3.0.

Contributors
------------
If you want to help develop this module please don't hesitate. 
Thanks for cooperation:

- olekhy (https://github.com/olekhy)
- alejandro-fiore (https://github.com/alejandro-fiore)
- julillosamaral (https://github.com/julillosamaral)
- drchav (https://github.com/drchav)  (DataTable 1.10 Changes)

Requirements
------------

* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)


Features
----------------
-  Flexible generating table
-  Decoratoring headers, rows and cell
-  Conditional decorating (Greater, Lesser, Equal, NotEqual, Between)
-  Simply Integration with DataTables (last integrity 1.10)
-  Pagination, QuickSearch, Sorting and Items per page
-  Default Bootstrap layout - support for Bootstrap 3.0 and 2.2.2
-  Simple customization (show in example -  we can change table view to any view eq list of articles with all features like pagination, quicksearch, sorint and item per page)
-  Editable decorator -> the ability to edit data from the table level
-  Filtering for each column
-  Row decorator for separating row by ordering column (dividing the same data)
-  Exporter data to CVS
-  Callable decorator
-  Doctrine 2 Adapter (Source)
-  Array Adapter  (Source)
-  JavaScript Events (Callable Events)
-  Possibility to send additional params
-  Asset manager functionality (https://github.com/RWOverdijk/AssetManager)
-  Visio Crud Module integration (https://github.com/HyPhers/visio-crud-zf2/)

Changes in Version 3.1
----------------
- Asset manager functionality (https://github.com/RWOverdijk/AssetManager)

Changes in Version 3.0
----------------
- Callable decorator
- Doctrine 2 Adapter (Source)
- Array Adapter  (Source)
- JavaScript Events (Callable Events)
- Possibility to send additional params


Changes in Version 2.0
----------------
-  Editable decorator -> the ability to edit data from the table level
-  Filtering for each column
-  Row decorator for separating row by ordering column (dividing the same data)
-  New conditions
-  Exporter data to CVS
-  Support for Bootstrap 3.0


In next versions
----------------
- MongoDB adapter
- Export only selected data
- Add dynamically (by ajax) new row
- More decorators and conditions
- Adapter for JGrid
- Exporter (PDFV)


Installation
------------

Installation description has been moved to wiki
https://github.com/dudapiotr/ZfTable/wiki/Installation-and-Configuration


Examples [See on live](http://dudapiotrek.laohost.net/)
-------
In Example directory there is a couple of examples how use decorators and generate table. After added js and css file
to your layout view, in controller there are a table calls(based on data from ZF2 tutorial - album).
