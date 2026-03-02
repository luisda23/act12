# Dockerfile
FROM php:7.4-apache

# Directori de treball per defecte dins del contenidor
WORKDIR /var/www/html

# Copia el contingut de la carpeta local "app" al directori de treball de la imatge
COPY app/ /var/www/html/

# Ajust de permisos bàsics (opcional però recomanat)
RUN chown -R www-data:www-data /var/www/html \
 && chmod -R 755 /var/www/html

# Exposa el port 80
EXPOSE 80

# Comanda per defecte (imatge oficial php:*-apache ja té aquest entrypoint)
CMD ["apache2-foreground"]
