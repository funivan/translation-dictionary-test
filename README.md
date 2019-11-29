## What?
Translations process is pretty simple and complicated at the same time.
```php
translate('Hello', 'fr'); // output Bonjour
```
We can store `'Hello'=>'Bonjour'` dictionary in the memory.

But what to do if we have about 5-10k key=>pairs? Memory begin to grow very fast.
Storing ~600 phrases can lead up to 12MB of the memory. And this is not good.

How we can solve this problem:
- Use redis/memcache other services to retrieve data
(*Pros:* simple to use. *Cons:* network calls, complicated infrastructure)

- Mysql or other databases  
(*Pros:* simple to use. *Cons:* for each phrase we should execute query)

- Custom new format
(*Pros:* memory efficient. *Cons:* new format should be covered by tests very good.)
 
In this repository you can find and compare different formats of the data. 
  
## How to run.
Install dependencies with composer: `composer install` 
```shell script
php -d memory_limit=512M fake-dummy.php ; php run.php
// OR 
php -d memory_limit=512M fake-anonymizer.php ; php run.php
```


## Results
```shell script
TIME_TRANS  : Time taken to translate phrases
MEMORY_LOAD : Used memory to load all translations to php memory
PHRASES     : Number of phrases stored in the dictionary
CHECKED     : Translated phrases num
```
### Random phrases
```
~~~~~~~~~~~~~~
>> php src/Mo/test.php
TIME_TRANS  : 0.039879083633423
MEMORY_LOAD : 10Mb [10240Kb]
PHRASES     : 6222
CHECKED     : 156
~~~~~~~~~~~~~~
>> php src/Obj/test.php
TIME_TRANS  : 0.040735006332397
MEMORY_LOAD : 4Mb [4096Kb]
PHRASES     : 6222
CHECKED     : 156
~~~~~~~~~~~~~~
>> php src/PhpArray/test.php
TIME_TRANS  : 0.037261962890625
MEMORY_LOAD : 12Mb [12288Kb]
PHRASES     : 6222
CHECKED     : 156
~~~~~~~~~~~~~~
>> php src/PlainString/test.php
TIME_TRANS  : 0.066585063934326
MEMORY_LOAD : 2Mb [2048Kb]
PHRASES     : 6222
CHECKED     : 156
~~~~~~~~~~~~~~
>> php src/Po/test.php
TIME_TRANS  : 0.035339117050171
MEMORY_LOAD : 12Mb [12288Kb]
PHRASES     : 6222
CHECKED     : 156
```
### Predefined phrases
```
~~~~~~~~~~~~~~
>> php src/Mo/test.php
TIME_TRANS  : 0.02116584777832
MEMORY_LOAD : 4Mb [4096Kb]
PHRASES     : 4891
CHECKED     : 123
~~~~~~~~~~~~~~
>> php src/Obj/test.php
TIME_TRANS  : 0.025712013244629
MEMORY_LOAD : 2Mb [2048Kb]
PHRASES     : 4891
CHECKED     : 123
~~~~~~~~~~~~~~
>> php src/PhpArray/test.php
TIME_TRANS  : 0.021569013595581
MEMORY_LOAD : 6Mb [6144Kb]
PHRASES     : 4891
CHECKED     : 123
~~~~~~~~~~~~~~
>> php src/PlainString/test.php
TIME_TRANS  : 0.040764093399048
MEMORY_LOAD : 0Mb [0Kb]
PHRASES     : 4891
CHECKED     : 123
~~~~~~~~~~~~~~
>> php src/Po/test.php
TIME_TRANS  : 0.019568204879761
MEMORY_LOAD : 6Mb [6144Kb]
PHRASES     : 4891
CHECKED     : 123
```
