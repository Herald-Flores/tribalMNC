# tribalMNC
This is a Wordpress site developed with the starter theme https://underscores.me
Quick Start

1- Clone this repository:

$ git clone https://github.com/Herald-Flores/tribalMNC

2- Create a new wp-config.php with your local development environment (the wp-config.php is ignored by this repository):

$ cp wp-config-sample.php wp-config.php

3- The last copy of the database is found in the folder /private/wp-tribalmnc-db-04-02-2021-01.sql

4- Credentials for wordpress admin are found in /private/access.txt

5- Download Wordpress and add files in project local
Development Process

Pull all branches and work on dev

$ git fetch --all
$ git branch -a
$ git checkout -b dev origin/dev
$ git pull origin dev

JIRA tickets ID git branch feature/SSU-XXX:

$ git pull develop
$ git branch feature/SSU-XXXX
$ git checkout feature/SSU-XXXX
