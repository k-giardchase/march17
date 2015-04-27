##Developers
Connor Abdelnoor & Kyle Giard-Chase

##Date
March 17 2015

##Description
An app that allows a user to make a to-do list and assign tasks to categories.

##Technologies Used
PHP <br>
<a href='http://www.postgresql.org/'>PostgreSQL</a> <br>
<a href='https://developers.google.com/speed/libraries/'>jQuery</a> <br>
<a href='http://getbootstrap.com/'>Bootstrap </a>for styling <br>
It uses <a href='https://getcomposer.org/'>Composer</a> to install:
<li>
<a href='http://silex.sensiolabs.org/'>Silex</a>
</li>
<li><a href='http://twig.sensiolabs.org/'>Twig</a></li>
<li><a href='https://phpunit.de/'>PHPUnit</a></li>

##Use and Editing
To view the app,<br>
1. Open your command shell, and clone the repository using the command `git clone https://github.com/k-giardchase/march17.git`<br>
2. Create a database using the instructions in the database section.
3. In the top level of the project folder, run `composer install`<br>
4. Start a php server by changing directories into the web folder `cd march17/web`
and start your server `php -S localhost:8000`<br>
5. Open your browser and navigate to your root path: `localhost:8000`

##DATABASE
```sql
CREATE DATABASE to_do;
 \c to_do;
CREATE TABLE tasks (id serial PRIMARY KEY, description varchar, category_id int, due varchar);
CREATE TABLE category (id serial PRIMARY KEY, name varchar);
CREATE DATABASE to_do_test WITH TEMPLATE to_do;
```

##Copyright (c) 2015 Connor Abdelnoor & Kyle Giard-Chase
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
