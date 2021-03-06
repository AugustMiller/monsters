# config valid only for current version of Capistrano
lock '3.6.1'

set :application, 'monsters'
set :repo_url, 'git@github.com:AugustMiller/monsters.git'

# Default branch is :master
ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp

# Default deploy_to directory is /var/www/my_app_name
# set :deploy_to, '/var/www/my_app_name'

# Git Submodule Strategy Options
set :git_strategy, Capistrano::Git::SubmoduleStrategy
set :git_keep_meta, false

# Default value for :scm is :git
# set :scm, :git

# Default value for :format is :pretty
# set :format, :pretty

# Default value for :log_level is :debug
set :log_level, :info

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
# set :linked_files, fetch(:linked_files, []).push('config/database.yml', 'config/secrets.yml')

# Default value for linked_dirs is []
# set :linked_dirs, fetch(:linked_dirs, []).push('log', 'tmp/pids', 'tmp/cache', 'tmp/sockets', 'vendor/bundle', 'public/system')
set :linked_dirs, fetch(:linked_dirs, []).push(
  'app/content',
  'app/site/accounts',
  'app/site/cache',
  'app/thumbs',
  'app/assets/avatars'
)

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for keep_releases is 5
# set :keep_releases, 5

before :deploy, 'assets:compile'
after 'deploy:updated', 'assets:upload'
