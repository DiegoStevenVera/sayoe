php artisan migrate                     (migracion de la bd)
php artisan db:seed                     (datos falsos)
php -S localhost:8000 -t public         (correr el servicio)

localhost:8000/api/v1/unayoe-perfiles    (listar todos los perfiles)    (READ)
localhost:8000/api/v1/unayoe-perfil      (crear un nuevo perfil)        (CREATE)
localhost:8000/api/v1/unayoe-perfil/{id} (obtener perfil con el id especificado) (RUD)
//Todas las rutas en routes\web.php