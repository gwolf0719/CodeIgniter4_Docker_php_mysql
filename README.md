# CodeIgniter4 簡易 Docker 環境設定   
***CodeIgniter4 版本  4.1.4***   
> https://github.com/codeigniter4/framework  
> https://codeigniter.com/user_guide/index.html  

***OS Alpine 3.14***    
***PHP7***    
***mysql***    
***nodejs npm***   
***gulp***   
***phpMyAdmin***   
> http://localhost/phpMyAdmin  

# 使用說明 
***0.下載***    
```bash  
git clone git@github.com:gwolf0719/CodeIgniter4_Docker_php_mysql.git
```

***1.封裝***  
```bash  
docker build -t www .  
```

***2.啟動***   
```bash   
docker run -d --name www -p 80:80 -p 3306:3306 -v $PWD:/web -v $PWD/mysqlfile:/var/lib/mysql  www   
```
# 安裝後使用注意
__移除 .gitgnore 內容__   
> www 網站檔案路徑    
> mysqlfile 資料庫路徑    


__轉換到新的 git 倉庫__
```bash
git remote set-url origin https://github.com/USERNAME/OTHERREPOSITORY.git
```

# db 參數設定   
設定位置在 file/start.sh 中的  
> MYSQL_ROOT_PWD="dev"  
> MYSQL_USER_DB="dev"  



