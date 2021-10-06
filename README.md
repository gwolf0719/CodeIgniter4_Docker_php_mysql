# CodeIgniter4 簡易 Docker 環境設定   
### CodeIgniter4 版本  4.1.4  
> https://github.com/codeigniter4/framework  
> https://codeigniter.com/user_guide/index.html  

### OS Alpine 3.14
### PHP7
### mysql
### phpMyAdmin  

# 使用說明 
***1.封裝***  
```bash  
docker build -t www .  
```

***2.啟動***   
```bash   
docker run -d --name www -p 80:80 -p 3306:3306 -v $PWD:/web -v $PWD/mysqlfile:/var/lib/mysql  www   
```
# db 參數設定   
```  
dbname = dev 
user = root 
pwd = dev
```
