#!/bin/bash

db_host=localhost
db_user=root
db_pass=password
# Esperar a que el servicio de MySQL esté disponible
while ! mysqladmin ping -h"$db_host" --silent; do
  sleep 1
done

echo "Walk through .sql && Checking if database already exists..."
# Importar cada archivo .sql en una base de datos diferente
for file in /docker-entrypoint-initdb.d/.sql; do
  # Obtener el nombre de la base de datos del nombre del archivo
  db_name=${file##*/}
  db_name=${db_name%.sql}

  # Crear la base de datos
  if [ "$db_name" != "init" ]; then
    if mysql -h"$db_host" -u$db_user -p$db_pass -e "use $db_name" >/dev/null 2>&1; then
      echo "Database "$db_name" already exists, skipping SQL execution"
    else
      echo "Database "$db_name" does not exist, executing SQL..."
      # Importar el archivo .sql en la base de datos
      mysql -h"$db_host" -u$db_user -p$db_pass -e "CREATE DATABASE IF NOT EXISTS $db_name"
      mysql -h"$db_host" -u$db_user -p$db_pass "$db_name" < "$file"
    fi
  else
    echo "File "$db_name", skipping SQL execution"
  fi

done