# Laravel Blog

This is a simple blog application built with Laravel 9.1

## Features

## Laravel 中常用的命令

- php artisan key:generate 生成 App Key
- php artisan make:controller 生成控制器
- php artisan make:model 生成模型
- php artisan make:policy 生成授权策略
- php artisan make:seeder 生成 Seeder 文件
- php artisan migrate 执行迁移
- php artisan migrate:rollback 回滚迁移
- php artisan migrate:refresh 重置数据库
- php artisan db:seed 填充数据库
- php artisan tinker 进入 tinker 环境
- php artisan route:list 查看路由列表

### 简单的 git 命令使用流程

- git init 初始化仓库
- git add . 添加所有文件到暂存区, 或者 git add 文件名
- git commit -m "提交信息" 提交到本地仓库
- git push origin main 推送到远程仓库

- git status 查看当前仓库状态
- git checkout 分支名 切换分支
- git checkout -b 分支名 创建并切换分支
- git merge 分支名 合并分支
- git branch -d 分支名 删除分支
- git branch 查看分支
- git branch 分支名 创建分支
- git clone 仓库地址 克隆远程仓库
- git log 查看提交日志
- git remote add origin 仓库地址 添加远程仓库地址

### 2.12

- 今天使用的命令
    - windows 使用 docker 的同学需要去 docker PHP 容器中的项目根目录下执行命令
    - git checkout main 切换到主分支
    - git merge static-pages 合并 static-pages 分支到主(main)分支
    - git push origin main 推送到远程仓库, 或者 git push
    - composer require laravel/ui:3.4.5 --dev 安装 laravel/ui 包
    - php artisan ui bootstrap 引入 bootstrap 前端框架
    - npm install 安装 npm 依赖
    - npm run watch-poll 监听资源文件变化, 并编译资源文件, Laravel Mix 会自动编译资源文件, 运行这个的时候可能会提示需要安装
      resolve-url-loader 依赖
    - yarn add resolve-url-loader@^5.0.0 --dev 安装 resolve-url-loader 依赖, 安装完成后重新运行 npm run watch-poll
    - git checkout main 切换到主分支
    - git status 查看当前仓库状态
    - git clear -df 因为我们在使用 npm run watch-poll 所以我们切换到主分支的时候需要清除掉编译后的资源文件
    - git merge filling-layout-style 合并 filling-layout-style 分支到主(main)分支
    - git push origin main 推送到远程仓库, 或者 git push
- 因为我们使用了 Sass、NPM、Yarn、Laravel Mix 等工具来构成一套完整的前端工作流, 所以需要安装 Node.js, 安装 Node.js 会自动安装
  npm, 但是我们推荐使用 yarn 代替 npm
- 下载 Node.js 和 yarn
    - Node.js: https://nodejs.org/en/
    - MacOS # Download and install Node.js: brew install node@22
    - Yarn: https://classic.yarnpkg.com/lang/en/docs/install

### 2.13

- 今天运行的命令
    - git checkout main 切换到主分支(你们的有可能是 master 分支)
    - git checkout -b modeling-users 创建并切换 modeling-users 分支
    - php artisan migrate 创建数据库表(在运行这个命令之前, 请确保你的 .env 文件中配置了数据库连接信息,
      并且数据库已经创建)
    - php artisan tinker 进入 tinker 环境
        - App\Models\User::create(['name' => '用户名', 'email' => '邮箱地址', 'password' => bcrypt('你的密码')]);
        - use App\Models\User
        - User::find(1);
        - exit 退出 tinker 环境
    - git checkout main 切换到主分支
    - git merge modeling-users 合并 modeling-users 分支到主(main)分支
    - git push origin main 推送到远程仓库, 或者 git push
    - git branch -b signup 创建并切换 signup 分支
    - 在 signup 开发完成今天的功能之后
    - !!! git add .
    - !!! git commit -m "提交信息"
    - php artisan migrate:refresh 重置数据库(注意: 这个命令会删除数据库中的所有数据, 所以请谨慎使用,
      我们这个地方使用是因为我们需要重置掉数据库中的测试数据)
    - composer require overtrue/laravel-lang:~6.0 安装 Laravel 语言包, 安装完成之后需要去 config/app.php 中修改 '
      locale' => 'zh_CN', 你还可以在 lang/zh_CN 目录下修改语言包中的内容
    - git checkout main 切换到主分支
    - git merge signup 合并 signup 分支到主(main)分支
    - git push origin main 推送到远程仓库, 或者 git push

### 2.14

- 今天运行的命令
    - git checkout main 切换到主分支
    - git checkout -b login-logout 创建并切换到 login-logout 分支
    - php artisan make:controller SessionsController 创建 SessionsController 控制器用于开发登录和退出功能
    - ... 每个小功能开发完成之后要提交代码
    - git add .
    - git commit -m "提交信息"
    - 开发完登录和退出功能以及「记住我」之后, 将代码合并到主分支
    - git checkout main 切换到主分支
    - git merge login-logout 合并 login-logout 分支到主(main)分支
    - git push origin main 推送到远程仓库, 或者 git push
    - git checkout -b user-crud 创建并切换到 user-crud 分支, 开发用户的增删改查功能
    - php artisan make:policy UserPolicy 创建 UserPolicy 授权策略
    - php artisan make:seeder UsersTableSeeder 创建 UsersTableSeeder 填充用户数据
    - 如果你检查你的数据库中的 users 表的 AUTO_INCREMENT 不是从 1 开始的那就可以去执行 ALTER TABLE `users`
      AUTO_INCREMENT = 1; 重置 users 表的自增 ID 为 1
    - php artisan migrate:refresh 重置数据库
    - php artisan db:seed 填充用户数据
    - php artisan migrate:refresh --seed 重置数据库并填充用户数据, 这个命令等同于 php artisan migrate:refresh 和 php
      artisan db:seed 的组合
    - 执行了上面的这个就不需要运行了 php artisan db:seed --class=UsersTableSeeder 执行单个 Seeder 文件
    - ... 记得要在你们的开发分支中执行 git add . 和 git commit -m "提交信息"
    - git checkout main 切换到主分支
    - git merge user-crud 合并 user-crud 分支到主(main)分支
    - git push origin main 推送到远程仓库, 或者 git push

### 2.17

- 今天主要完成的任务
    - 删除用户功能, 我们需要在 users 表中添加一个 is_admin 字段, 用于判断用户是否是管理员, 只有管理员才能删除用户
    - 用户激活功能, 我们需要在 users 表中添加一个 activation 字段, 用于判断用户是否激活, 用户注册之后, 我们会发送一封邮件给用户,
      用户点击邮件中的链接之后, 用户的账号就会激活
    - 发送找回密码链接, 用户忘记密码之后, 用户可以通过邮箱找回密码, 我们会发送一封邮件给用户, 用户点击邮件中的链接之后,
      用户就可以重置密码

- 今天运行的命令
    - git checkout main 切换到主分支
    - git checkout user-crud 切换到 user-crud 分支
    - php artisan make:migration add_is_admin_to_users_table --table=users 创建一个迁移文件用于添加 is_admin 字段到
      users 表
    - php artisan migrate 执行迁移(在编辑完成了迁移文件之后)
    - php artisan migrate:refresh --seed 重置数据库并填充用户数据(因为我们修改了 UsersTableSeeder.php 文件,
      所以需要重新填充数据)
    - git add . 添加所有文件到暂存区
    - git commit -m "管理员可以删除用户" 提交到本地仓库
    - git checkout main 切换到主分支
    - git merge user-crud 合并 user-crud 分支到主(main)分支
    - git push origin main 推送到远程仓库, 或者 git push
    - git checkout -b account-activation-password-reset 创建并切换到 account-activation-password-reset 分支
    - php artisan make:migration add_activation_to_users_table --table=users 创建一个迁移文件用于添加 activation 字段到
      users 表
    - php artisan migrate 执行迁移(在编辑完成了迁移文件之后)
    - php artisan migrate:refresh --seed 重置数据库并填充用户数据(因修改了 UserFactory.php 文件, 所以需要重新填充数据)
    - 我们为了方便测试, 去修改 .env 文件中的 MAIL_MAILER=smtp 为 MAIL_MAILER=log, 这样我们就可以在日志文件中查看邮件内容
    - 测试邮件发送并且激活账号功能完成之后, 提交代码
    - git add . 添加所有文件到暂存区
    - git commit -m "用户激活" 提交到本地仓库
    - 修改 .env 文件中的 MAIL_FROM_ADDRESS 和 MAIL_FROM_NAME 为你的邮箱地址和你的名字
    - git add . 添加所有文件到暂存区
    - git commit -m "发送找回密码链接" 提交到本地仓库
    - 为了验证重置密码是否过期的正确性, 我们需要把 config/app.php 中的 timezone 修改为你的时区, 例如: 'timezone' => '
      Asia/Tokyo'
    - git add . 添加所有文件到暂存区
    - git commit -m "重置密码" 提交到本地仓库
    - git checkout main 切换到主分支
    - git merge account-activation-password-reset 合并 account-activation-password-reset 分支到主(main)分支
    - git push origin main 推送到远程仓库, 或者 git push

### 2.18

- 今天主要完成的任务
    - 请求限流
    - 使用 Gmail 发送邮件
        - 去 Google 的安全性页面: https://myaccount.google.com/security-checkup/1
        - 开启两步验证
        - 生成应用专用密码 https://myaccount.google.com/apppasswords
        - 在 .env 文件中配置邮箱信息
        - MAIL_DRIVER=SMTP
        - MAIL_HOST=smtp.gmail.com
        - MAIL_PORT=587
        - MAIL_USERNAME=你的邮箱地址
        - MAIL_PASSWORD=你的应用专用密码
        - MAIL_ENCRYPTION=tls
        - MAIL_FROM_ADDRESS="noreply@换成你自己的域名" // 这个地址有些邮箱会被拦截, 如果发送邮件失败, 请换成你的邮箱地址尝试
        - MAIL_FROM_NAME="${APP_NAME}"

- 今天运行的命令
  - 
