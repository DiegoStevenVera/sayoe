Comandos para correr el proyecto
- composer install
- php artisan migrate:refresh             (roll back y migracion de la bd)
- php artisan db:seed                     (datos falsos)
- php -S localhost:8000 -t public         (correr el servicio)

Rutas
- localhost:8000/api/v1/auth/login          (login)
- localhost:8000/api/v1/unayoe-perfiles    (listar todos los perfiles)    (READ)
- localhost:8000/api/v1/unayoe-perfil      (crear un nuevo perfil)        (CREATE)
- localhost:8000/api/v1/unayoe-perfil/{id} (obtener perfil con el id especificado) (RUD)
- localhost:8000/api/v1/cuestionario-evaluaciones   (todas las pruebas psicologicas con sus preguntas y alternativas) (READ)
- localhost:8000/api/v1/cuestionario-evaluacion/{id} (solo la prueva psicologica especificada) (READ)

//Todas las rutas en routes\web.php

