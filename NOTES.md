### Cosas a mejorar en la versión 2:

[ ] Sincronización con base de datos. Crear una instancia del modelo que sea la que sincronice entre controlador y base de datos, de manera que el objeto esté siempre 'vivo' en memoria, y que ante cualquier interacción con la base de datos, este objeto se hidrate con los cambios realizados.

```
Controller
    ProductsController
Model (CRUD)
    a. Product object get the changes from Controller
    b. CRUD operation according to updated object
    c. Sync between object and database.
Database
    Table products (and others)
```
[ ] Una vez creada la sincronización, como solo se va a instanciar el objeto una vez durante el lifetime de la aplicación, adaptar el controlador para que no cree un objeto explícitamente cada vez que se realiza una consulta a la base de datos.

[ ] Mejorar la opción de delete. Actualmente se hace mediante get y obteniendo el id del registro a eliminar mediante la propiedad ID agregada al router.

[ ] En relación al punto anterior, mejorar la obtención del ID a buscar. Actualmente se obtiene desde el enrutador ya que se pasa por url.

[ ] Arreglar casteo de string a int de los valores del formulario que se obtienen como string pero en la base de datos son de tipo INT

[ ] Validación datos formulario

### Cosas a mejorar en la versión 2.1