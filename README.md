    docker build -t www .      

docker run -d --name www -p 80:80 -p 3306:3306 -v $PWD:/web -v $PWD/mysqlfile:/var/lib/mysql  www

#db  
dbname = dev 
user = root 
pwd = dev

