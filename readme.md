# Monsters

> A tiny app for Dungeon Masters to create and manage monster stat blocks.

## About

Monsters was born of a desire to have a digitized collection of canonical monsters, but grew into a vision for a tool allowing creation and composition of new monsters.

Planned features include:

- Full 5E-compatible monster entry
- Custom monster collections, with print-ready format
- Scenario generator
- Tagging, searching, browsing of monsters and collections

## Setup

Monsters can be run locally or deployed to a server for collaborative collections.

This project is based on Kirby CMS. Additional requirements include:

- PHP version 5.4 or newer
- [Node](https://nodejs.org) and NPM (Installed with [Brew](http://brew.sh), if possible)

To get started, use the GitHub application to clone the repository, or run:

```
$ git clone --recursive https://github.com/AugustMiller/monsters.git
$ cd monsters
```

It's important that the `--recursive` flag is set, because we include a number of dependencies as submodules.

You'll need to create a few folders (if they don't exist, already) for things to work correctly:

```
$ mkdir -p app/site/accounts app/assets/avatars app/thumbs
```

Then, fire up a PHP development server, on an available port:

```
$ php -S localhost:8000 -t app
```

The `-t` flag sets the web root to the `app` directory. We do this to protect leakage of source files and other configuration details into production environments. If you're using an Apache VirtualHost, make sure you use the `app` directory as your `DocumentRoot`!

Things will be pretty broken, right off the bat, but pulling down the `devDependencies` declared in `package.json` will get you most of the way there:

```
$ npm install
```

We use [Gulp](http://gulpjs.com) to consolidate the compilation of Sass and Coffeescript. Front-end Javascript is in the CommonJS architectre, and Browserify handles proper concatenation. Get going with a simple:

```
$ gulp watch
```

For anyone interested in self-hosting, `$ gulp build` will generate minified versions of `app.css` and `app.js`. This is already set up as a local task for [Capistrano](http://capistranorb.com), but you can run it manually, prior to using `rsync` or `scp`. Always remember to set up an ignore list before executing a command that overwrites remote files! Make sure you have a valid license before proceeding.

### Content

There are no monsters in the repo. Visit `localhost:8000/panel` to start building your own. You may need to create the default `home` and `error` pages before logging in.

## Legal

Code in this repository may not be used on live web servers without a license, available on the [Kirby website](https://getkirby.com/).

Kirby, the Kirby Toolkit and Kirby Panel are all subject to their respective licenses. Please observe the terms of each when using any code herein.

### Buy a license

You can purchase your Kirby license at http://getkirby.com/buy.

A Kirby license is valid for a single domain. You can find Kirby's license agreement here: http://getkirby.com/license.

### Copyright

© 2009-2016 Bastian Allgeier (Bastian Allgeier GmbH) http://getkirby.com

:deciduous_tree:
