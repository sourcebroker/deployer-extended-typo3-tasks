
Changelog
---------

1.0.1
~~~~~

1) [TASK] Do not set "active_dir" param as its used only internal and if set globally can influence
   other tasks.

2) [TASK] Change linux condition [ -L {{deploy_path}}/release ] to [ -e {{deploy_path}}/release ]
   as it can support more cases for example when "release" is regular directory and not a symlink.

3) [BUGFIX] Fix wrong option read: it as "option" should be "t3option".