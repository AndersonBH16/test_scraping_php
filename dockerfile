FROM php:7.4-apache

# Copiar contenido de la carpeta src en la carpeta del contenedor
COPY /src /var/www/html

# Referencia del puerto
EXPOSE 80