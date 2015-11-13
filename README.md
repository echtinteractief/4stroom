vierstroom
=================

Installation
------------

Make sure you have the following tools installed:

- **Git** - http://git-scm.org
- **Node.js** - get Node.js from http://nodejs.org (we need NPM)
- **Grunt** - after installing NPM, run `npm install -g grunt-cli` (need admin
  rights, on OS X or *nix, prefix command with `sudo`)
- **Ruby** - Sass require ruby. 
- **Sass** - Css preprocessor
- **Bourbon** - Bourbon Sass Mixin libary
- **Neat** - Neat symantic grid framework based on Bourbon

# Installation Sass, Ruby, Bourbon and Neat. 

## Install Ruby
If you're on OS X or Linux you probably already have Ruby installed; test with `ruby -v` in your terminal. 
[Ruby](http://www.ruby-lang.org/en/downloads/)

## Install Sass (Css preprocessor):
When you've confirmed you have Ruby installed, run `gem install sass` to install Sass. More information about Sass, 
[Sass](http://sass-lang.com/download.html) 

##Install Bourbon:
For installation instructions go to: bourbon.io. 

Project installation:
Go to the follow folder: src/style/scss/mixins and run 'bourbon install'. 

## Install Neat:
For installation instructions go to: neat.bourbon.io. 

Project installation:
Go to the follow folder: src/style/scss/mixins and run 'neat install'. 

##The firstime using source files in the contrib folder.
Install all grunt packages. Run 'npm install' in the contrib folder. When finished run one of the taks here below. 

Grunt tasks
-----------

We use Grunt to "compile" code from the `src/` folder to viewable/deployable
html in the `build/` folder.  (So, do not edit in the `build/` folder because
you will lose your changes.)

- **grunt build**: development mode.  This will build the pages from
  `src/` into the `build/` directory.  You can open the pages in `build/pages/`
  and they will work.
- **grunt serve**: same as watch but also starts a webserver on port 4000
- **grunt production**: copy files to the libary folder and watch the scripts en sass files. For the first time, run always grunt build or grunt. 


