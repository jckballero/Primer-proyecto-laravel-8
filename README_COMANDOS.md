
1. INICIAR UN PROYECTO EN LARAVEL
    >>> laravel new nombre_del_proyecto    (para este curso usamos blog)


2. CREAR MODELO Y GUARDAR EN BASE DE DATOS
    1. 
    2.
    3.
    4. Utilizar Tinker (consola de laravel)
        >>> php artisan tinker
    5. Seleccionar el modelos a usar
        >>> use App\Models\Curso;
    6. Crear la nueva instancia para el objeto
        >>> $curso = new Curso;
    7. Asignar valores a cada columna de la tabla seleccionada
        >>> $curso->[nombre_de_la_columna] = 'VALOR A ASIGNAR';
        >>> $curso->[nombre_de_otra_columna] = "VALOR A ASIGNAR";
    8. Mostrar el objeto creado
        >>> $curso;
    9. Guardar el objeto
        >>> $curso->save();
    10. Si queremos modificar el valor de algun campo
        >>> $curso->description = "NUEVO VALOR DE LA COLUMNA";
        -- Para realizar este cambio en base de datos, debemos guardar nuevamente con save

3. COMO UTILIZAR LOS MODELOS SIN LA CONVENCION
    1. Colocar la variable protected con la tabla a utilizar
        >>> protected $[nombre_de_la_nueva_tabla] = "TABLA_A_UTILIZAR";
    2. Ingresar a artisan
        >>> php artisan tinker
    3. Seleccionar el modelo a usar
        >>> use App\Models\Curso;
    4. Crear la nueva instancia para el objeto
        >>> $usuario = new Curso;
    5. Asignar valores a cada columna de la tabla seleccionada
        >>> $usuario->[nombre_de_la_columna] = 'VALOR A ASIGNAR';
        >>> $usuario->[nombre_de_otra_columna] = "VALOR A ASIGNAR";

4. COMO ELIMINAR LAS TABLAS CREADAS EN BASE DE DATOS
    >>> php artisan migrate:reset

5. COMO ELIMINAR TODAS LAS TABLAS Y VOLVER A CREARLAS
    >>> php artisan migrate:fresh

6. COMO INGRESAR INFORMACION A LAS COLUMNAS CREADAS EN BASE DE DATOS
    >>> php artisan db:seed

7. COMO CREER ARCHIVOS ESPECIALES PARA SEEDERS
    >>> php artisan make:seeder CursoSeeder
    AGREGAR ESTE COMANDO EN EL DATABASESEEDER
    >>> $this->call(CursoSeeder::class); 
    YA QUE ES LA CLASE QUE CONTROLA POR DEFECTO LOS SEEDERS
8. CON ESTE COMANDO ELIMINAMOS LAS COLUMNAS, LAS VOLVEMOS A CREAR Y LAS LLEMAMOS
    >>> php artisan migrate:fresh --seed
9. PARA CREAR UN FACTORY COLOCAMOS EL SIGUINTE COMANDO
    >>> php artisan make:factory CursoFactory
10. EJECUTAR UN SEEDER
    >>> php artisan migrate:fresh --seed
11. MOSTRAR LOS REGISTROS EN BASE DE DATOS DESDE LA TERMINAL DE TINKER
    >>> php artisan tinker
    CUANDO MUESTRE LOS TRES >>> DE LA TERMINAL, EJECUTAR
    >>> use App\model\Curso   (ESTO ES UN LLAMADO A LA TABLA USUARIO)
    DESPUES
    >>> $cursos = Curso::all();   (LISTA TODA LA TABLA CURSO EN LA VARIABLE $CURSOS)
    LISTAR MEDIANTE CLAUSULAS (WHERE)
    >>> $cursos = Curso::where('categoria','Diseño web')->get();
    SI QUEREMOS ORDENAR DE MANERA DESCENDENTE
    >>> $cursos = Curso::where('categoria','Diseño web')->orderBy('id', 'desc')->get();
    PARA ORDENARLO DE ACUERDO AL CAMPO NAME, DE MANERA ASCENDENTE
    >>> $cursos = Curso::where('categoria','Diseño web')->orderBy('name', 'asc')->get();
    PARA OBTENER EL PRIMER OBJETO DE LA COLLECION USAR FIRST, EN LUGAR DE FIRST
    >>> $cursos = Curso::where('categoria','Diseño web')->orderBy('name', 'asc')->first();
    HACER UN SELECT DE DOS CAMPOS EN TINKER 
    >>> $cursos = Curso::select('name','descripcion')->get();
    USANDO SELECT CON ORDERBY
    >>> $cursos = Curso::select('name','descripcion')->orderBy('name','asc')->get();
    USANDO SELECT CON ORDERBY MAS LA CLAUSULA WHERE
    >>> $cursos = Curso::select('name','descripcion','categoria')->where('categoria','Diseño Web')->orderBy('name','asc')->get();
    USAR ALIAS EN TINKER (AS)
    >>> $cursos = Curso::select('name as title','descripcion','categoria')->where('categoria','Diseño Web')->orderBy('name','asc')->get();
    ESPECIFICAR CANTIDAD DE REGISTROS (PROPIEDAD TAKE)
    >>> $cursos = Curso::select('name as title','descripcion','categoria')->where('categoria','Diseño Web')->take(5)->get();
    LLAMAR POR EL TITULO O NOMBRE UN CAMPO
    >>> $curso = Curso::where('name','Quo reprehenderit voluptatem cum explicabo.')->get();
    DE ESTA MANERA PODEMOS USAR CUALQUIER CAMPO DE LA COLLECION NAME (NAME, DESCRIPCION, ETC)
    >>> $curso = Curso::where('name','Quo reprehenderit voluptatem cum explicabo.')->first();
    BUSCAR MEDIANTE EL ID EN ELOQUENT(TINKER)
    >>> $cursos = Curso::find(5);
    MOSTRAR REGISTROS DE NUMEROS MAYORES A 45 (FUNCIONA IGUAL PARA <,>=,<=,<>) 
    >>> $cursos = Curso::where('id','>',45)->get();
    USAR LIKE Y %
    >>> $cursos = Curso::where('name','like','% voluptate %')->get();