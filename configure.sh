#!/bin/bash

PERMISSION=777

if [ "$#" -ne 3 ] && [ "$#" -ne 2 ] && [ "$#" -ne 1 ]; then
  echo ""
  echo "como usar:"
  echo " $>./configure \$USER \$DB_CFG \$ROOT "
  echo " $>./configure nobody cake-template /opt/lampp/htdocs/cake-template/"
  echo ""
  echo " o comando abaixo funciona USER=nobody DB_CFG=default ROOT=./"
  echo " $>./configure nobody"
  echo ""
  exit -1
fi


USER=$1
ROOT=./
DBCFG=default

if [ "$#" -eq 3 ]; then
  ROOT=$3
fi

num=`echo $ROOT | wc -c `
let num-=1
last=`echo $ROOT | cut -c$num`
if [ "$last" == "/" ]; then
  ROOT=$3 
else
  ROOT=$3/ 
fi

if [ "$#" -ge 2 ]; then
  DBCFG=$2
fi

#DB_CFG=${ROOT}config/${DBCFG}.cfg
#
#if [ -f "$DB_CFG" ]
#then
#  echo ''
#else
#  echo "$DB_CFG nao encontrado..."
#  exit -2
#fi

TMP=${ROOT}.tmp
#DB_PATH=${ROOT}app/Config/database.php
#SQL_PATH=${ROOT}docs/cake-template.sql
#SQL_SEED_PATH=${ROOT}docs/seeds.sql

ROOT_CAKE_TEMPLATE=${ROOT}app/


#======================DIR'S CREATION AND PERMISSION==================


DIR_NEED_CREATE=(
  "tmp/cache"
  "tmp/cache/models"
  "tmp/cache/persistent"
)

DIR_NEED_PERMISSION=(
 "tmp"
)

print_task() { 
  echo ""
  echo $1
}

dir_create() {
  print_task "criado diretorios..."
  for dir in "${DIR_NEED_CREATE[@]}"
  do
    echo $ROOT_CAKE_TEMPLATE$dir
    mkdir $ROOT_CAKE_TEMPLATE$dir
  done
}

dir_permission() {
  print_task "mudando permissoes..."
  for dir in "${DIR_NEED_PERMISSION[@]}"
  do
    echo $ROOT_CAKE_TEMPLATE$dir
    chown -R $USER $ROOT_CAKE_TEMPLATE$dir
    chmod -R $PERMISSION $ROOT_CAKE_TEMPLATE$dir
  done
}

dir_create
dir_permission

#==================DATABASE CONFIGURATION=================

#!/bin/bash

#source $DB_CFG

if [ "$DB_RESET_PASSWD" == "true" ]; then
  php config/reset_passwd.php
fi

replace() {
  sed "$1" $2 > $TMP
  mv $TMP $2
}

mysql_exec() {
  mysql --host=$DB_HOST --user=$DB_USER --password=$DB_PASS --default-character-set=utf8 $DB_NAME < $1
}

replace_db() {
  echo configurando ${1}...
  replace "s/'$1'[[:space:]]*=>[[:space:]]*'[a-zA-Z0-9_/.:-]*'/'$1' => '$2'/g" $DB_PATH
}

config_db() {
  print_task "configurando scrips database.php..."
  replace_db host $DB_HOST
  replace_db database $DB_NAME
  replace_db login $DB_USER
  replace_db password $DB_PASS
}

config_sql() {
  print_task "configurando scrips sql..."
  replace "s/nnsolution1_[0-9]/$1/g" $SQL_PATH
  replace "s/nnsolution1_[0-9]/$1/g" $SQL_SEED_PATH
  print_task "executando ${SQL_PATH}..."
  mysql_exec $SQL_PATH
  print_task "executando ${SQL_SEED_PATH}..."
  mysql_exec $SQL_SEED_PATH
}

#config_db
#config_sql $DB_NAME

#==============================================

print_task "done!"