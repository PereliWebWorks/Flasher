#Flasher

This is a very small package that makes it easy to implement flash message.

##Installation

Install with composer.
~~~
composer require drewpereli/flasher
~~~
Or [download the source](github.com/drewpereli/flasher) from github.

##Usage
Flasher is super easy to use! On any php file you'd like to use flahser in, include it by requiring the composer autoloader.
```php
require_once "path/to/vendor/autoload.php";
```
If you're not using composer, simply include or require the file "flasher.php" in any file that uses the flasher.
```php
require_once "path/to/flasher/flasher.php";
```

To set and get flash messages, create a new flasher object.
```php
$flasher = new Flasher();
```

You can create a new flasher object at the top of each file that needs the flasher. The new object will have access to any flash messages set by any other existing or previous flasher object. 

Set messages like this:
```php
$flasher->set("message type", "your message here!"); //Sets message of type "message type" to "your message here".
```

Get messages like this:
```php
$flasher->get("message type"); //Returns message of type "message type" (if there is one), and unsets it.
```

As soon as you "get" a message, it will be removed. 

You can also use magic methods!
```php
$flasher->message_type = "your message here!";
$message = $flasher->message_type; //"Your message here!"
$message = $flasher->message_type; //null
```

#Full method list
- **set(type, message)**: Sets message of "type" to "message".
- **get(type)**: Returns and unsets the message of "type".
- **getAll()**: Returns an array of all messages, indexed by type. Unsets all messages.
- **peek(type)**: Returns the message of "type" without unsetting it.
- **flash(type)**: Equivalent to "echo get(type);".
- **has(type)**: Returns true if a message of "type" has been set. Otherwise returns false.
- **hasAny()**: Returns true if a flash message of any type is currently set. Otherwise returns false.




