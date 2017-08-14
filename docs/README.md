PHP-IRCBOT!
===================


A simple, easy to use, easy to setup, easy to extend IRC bot with PHP love.
----------

What is IRC?
-------------
Internet Relay Chat (IRC) is an application layer protocol that facilitates communication in the form of text. The chat process works on a client/server networking model. IRC clients are computer programs that a user can install on their system.
~Wiki

What is IRC Bot?
-------------
An IRC bot is a set of scripts or an independent program that connects to Internet Relay Chat as a client, and so appears to other IRC users as another user. An IRC bot differs from a regular client in that instead of providing interactive access to IRC for a human user, it performs automated functions.
~Wiki

What is PHP-IRCBOT?
-------------
It is a bootstrapped framework built in PHP to create bots. It uses [Net_SmartIRC](https://github.com/pear/Net_SmartIRC) library for its default implementation. However, it can be extended to use any or own custom library. This framework aims to provide a kickstart to bot development and demonstrates it with a basic responsive chatbot as part of the bundle.

Installation
-------------
#### Requirements

- [Vagrant](https://www.vagrantup.com/)
- [Composer](https://getcomposer.org/) (Required if you don't wish to install vagrant)

Installing composer can be skipped if vagrant is installed. Vagrant will install composer automatically in the VM.

#### 3 Step installation

 1. Git clone the master branch `git clone https://github.com/fotuzlab/php-ircbot/tree/master`
 2. Go to the php-ircbot directory `cd php-ircbot`
 3. Install dependencies. Run `composer install`

Step 3 should create a `vendor` directory in the directory. This is required for the application to run.
#### Running example bot

 1. From the root of directory, run `php index.php`
 2. Open IRC application of your choice. Connect to `Freenode` on `6667` and join `php-ircbot-example` channel.
 3. Type `Who are you ?`. The bot should respond `I am a bot. An example of PHP-IRCBOT framework.`

Configuration
-------------

#### Creating your own chatbot

 1. Go to directory. `cd /bots` 
 2. Duplicate `example` directory and its contents and give it a name.  `cp -r example <botname>`
 **Note:  The directory name is used as the namespace.**
 3. Go to the bot directory.  `cd <botname>`.
 4. Open `module.php` with your favorite editor. `vim module.php`
 5. Change classname `Net_SmartIRC_module_example` to `Net_SmartIRC_module_<botname>`. Save and exit.
 6. Open `config.json` file. `vim config.json`
 7. Modify the configuration to your preference. Save and exit.
 8. Open `database.json` file. `vim database.json`
 9. This is the brain of the bot. Messages to watch and corresponding response can be mapped here. [Regex](https://en.wikipedia.org/wiki/Regular_expression) can be used to identify the message. Unfortunately, only plain text strings are supported for the response.
There are many tools available on the internet to write regex. [Regexr](http://regexr.com/ is a good one.)
Modify the file, save and exit.
 10. Go back to the root directory. Run the bot using `php index.php <botname>`. Connect to IRC and see bot in action.

> **Example message/response:**
> 

    {
           "message": "/what|your name/",
           "response": "My name is chatbot."
      }

 >Above configuration will look for "what", "your", "name" in a sentence and respond to it. For instance if a user types *"What is your name?"* or *"What are you told your name is?"* or *"What's your name?"*, bot will reply ***"My name is chatbot."***

#### Running multiple chatbots from single application

 1. Create and configure multiple bots as above
 2. From the root of application, run `sh index.sh`

Extending
-------------
Data sources, modules and libraries are extendable and can be interchanged based on the requirement. It is possible to have any combination like:

 - Default library, default data source and new module,
 - Default library, new data source and default module,
 - Default library, new data source and new module etc

#### External database
There can be several possibilities where either bot responses or configuration(or both) need to be fetched from the different data source - say a wordpress site over JSON, a csv file, XML etc. PHP-IRCBot framework can be extended to use a data source of choice. Follow the steps below to configure:

 1. Implement a data source class under `src/datasource/<dir>`. This class should be used to make connection with the database and/or fetch raw data.
 2. Create a controller class for database under `src/controllers/<dir>`.  This class should be used for any processing over raw data for use with the IRC library.
 Note:- You must extend the class created in step 1.
 3. Repeat step 2 for a controller class for configuration if source of configuration is different than default.

Interfaces are not yet implemented for complete flexibility in the first draft. Using the same or different names for methods is expected to be developer's call.

#### More than chatbot
Framework can be used to do more than just responding to a message through a message. Different functionality can be programmed as a response to a particular message. The default `Net_SmartIRC` library provides [many options](https://github.com/pear/Net_SmartIRC) those can be utilised to create more robust bots.

 1. Create a module under `src/modules` directory to implement a new feature.
 2. Change `modules.php` under bot directory to extend the required class
 3. Make necessary adjustments

However, to exercise even more control - like executing a program on the server based on a user's response - another library may need to be used.

#### Other libraries

Another library may be needed to extend bots' functionality or it can be purely driven by preference. Follow the steps below to add a new library:

 1. Create a class under `src/irc/connect` directory. This class should
    be used to make connection to IRC channel based on library's
    instructions.
 2. Create modules
 3. Update `module.php`
 

Commands
-------------
 - `php index.php` 
Runs example bot in the same window

 - `php index.php <botname>` 
Runs `<botname>` in the same window
 - `sh index.sh` 
Runs example bot in a new [screen](https://www.gnu.org/software/screen/manual/screen.html)

 - `sh index.sh <botname>` 
Runs `<botname>` in a new screen
 - `sh index.sh all` 
Runs all available bots in separate screens

 - `sh index.sh destroy` 
Destroy all the bots and subsequent screens
 - `vagrant up`
Set up a VM will all the requirements, ready to go

Logging
-------------
No log files are being stored at the moment. Real time logging can be accessed once the bot is executed(in respective screens for multiple execution).
Unix commands can be used to store logs manually:
`php index.php > /path/to/file`

Naming convention
-------------
 - File names in bot directory are stringent.
 - Most of the files follow their path from `src` directory in their
   naming e.g. `irc/connect/irc.connect.net_smartirc.php` where
   net_smartirc is the identifier.
 - If directory name is plural, the name in the file becomes singular e.g. `controllers/default/controller.default.config.php`
 - Class names follow Camel_Casing with an underscore and reflect the file name. Underscore in naming is just a dev preference to replace `.` with `_` than nothing. All uppercase for words can be used on dev discretion for better reading.
 - There is no particular standard in naming the variables. Although more descriptive the better.

Code Documentation
-------------
[Doxygen documentation](https://fotuzlab.github.io/php-ircbot/html/)

Unit Tests
-------------
Inside vagrant machine, run `phpunit src/tests/phpunit/`