Para instalar

1. sudo apt install php8.0-sqlite3

2. Definir la ruta de la base de datos sqlite

3. 
Ejecutar php artisan migrate
Ejecutar php artisan db:seed --class=FederalEntitySeeder
Ejecutar php artisan db:seed --class=MunicipalitySeeder
Ejecutar php artisan db:seed --class=SettlementTypeSeeder
Ejecutar php artisan db:seed --class=SettlementSeeder
o solamente php artisan migrate --seed

Pasos
1. Crear proyecto en GitHub
2. Desarrollo de la solución en el proyecto
2.1. Crear controladora. modelos, migraciones y seeders
2.2. Programar los seeder para el relleno de los datos según la fuente de datos en XML
2.3. Configurar sqlite para base de datos y ejecutar migraciones
2.4. Desarrollar lógica de negocio en el modelo
2.5. Crear la ruta del API y la function en la clase controladora para que llame a la clase modelo que implementa el servicio
2.6. usar git para salvar en Github

3. Salvar proyecto en GitHub

4. Publicar en AWS
4.1. Crear instancia ubuntu e instalar paquetes y el servidor web Apache
4.2. Poner IP pública a la instancia
4.3. Descargar proyecto en la instancia con git
4.4. ejecutar php artisan optimize, config:clear and key:generate 4.5 



