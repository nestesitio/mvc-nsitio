# mvc-nsitio
PHP and HTML5 project skeleton in MVC framework

Crud Commands
-------------
### Build Model
php task.php -t model

This command creates all base files for the model folders: models, querys, forms
All changes made mannualy in this files will be ignored and deleted with this command
To made custom model classes (model, query or forms) use 
the folder model in one of the apps folder (/apps/Myapp/model/)

### Build app
php task.php -b admin -a app -n control -t model
#### The options
* -t: admin or app
* -a: the name of the folder where to locate files
* -n: the name of the files for actions controller class and the config xml
* -m: the table name used as base by the actions controller
#### Description
example: php task.php -t admin -a Myapp -n mytask -m task_table

The folder /apps/Myapp will be created if not exists, other files with different names will be preserved  
The file /apps/Myapp/control/MytaskActions.php will be created with all basic methods  
The file /apps/Myapp/cconfig/mytask.xml will be created with default configuration you can change
-------------
Range Options
-------------
In app config.xml we can define on show/fields node:  
 <code>&lt;fieldname field="table.column" filter="true" range="varchar"&gt; </code>  
is used with filter true, othewise range attribute is ignored

### Possible values
range, like, min, max
### range
<code>&lt;node range="range"&gt; </code>  
##### Model form
Config max and min inputs for the form, duplicate the input
<code>Controller::renderFilters($form, $xmlfile)</code>  
$ranges = DataEdit::getRange();
Form::renderInputs($fieldsandlabels = [], $actionclass = null, $ranges) calls 
FormRender::renderInputs($queue, $forminputs, $formlabels, $fieldsandlabels = [], $actionclass = null, $ranges)  
##### Model query
Config a BETWEEN operator in Mysql on processing the filter  
<code>Query->setCondition($column, ['min'=>$min, 'max'=>$max], Mysql::BETWEEN)</code>  
calls  
<code>MysqlStatement->setArrayCondition($column, $values = [], $clause = Mysql::IN)</code>  
### min
<code>&lt;node range="min"&gt; </code>    
Does not change nothing to input  
Config a Mysql::GREATER_EQUALL operator in Query->setCondition()  
<code>Query->setCondition($column, $value, Mysql::GREATER_EQUAL)</code>   
### max
<code>&lt;node range="max"&gt; </code>   
Does not change nothing to input  
Config a Mysql::LESS_EQUAL operator in Query->setCondition()  
<code>Query->setCondition($column, $value, Mysql::LESS_EQUAL)</code>  
### like  
<code>&lt;node range="like"&gt; </code>    
Does not change nothing to input  
Config a Mysql::LIKE operator in Mysql on processing the filter  
<code>Query->setCondition($column, $value, Mysql::LIKE, '%')</code>  
calls  
<code>MysqlStatement->setCondition($column, $operator, $value, $wildcard = null)</code>  


