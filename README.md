# 🎨 Atributos Círculos Tienda Ingepol

**Visualizador gráfico de atributos de producto para WooCommerce.**

Este plugin permite mostrar los términos de los atributos globales de WooCommerce (como colores, materiales, tipos) en formato de **iconos circulares** en lugar de listas de texto. Está diseñado específicamente para la tienda Ingepol, incluyendo una regla de exclusión que oculta automáticamente estos iconos si el producto pertenece a la categoría de "Materia Prima".

## 📋 Características Principales

### 🖼️ Visualización Estética
* **Iconos Circulares:** Renderiza las imágenes asociadas a los términos de los atributos dentro de contenedores de **35x35 píxeles** con bordes redondeados (`border-radius: 50%`), creando una apariencia limpia y moderna.
* **Diseño Flexible:** Utiliza `Flexbox` en línea para alinear los círculos horizontalmente con un espaciado uniforme, asegurando que se adapten bien a cualquier contenedor.

### 🧠 Lógica Condicional
* **Exclusión Automática:** Antes de renderizar nada, el plugin verifica si el producto actual pertenece a la categoría **"Materia Prima"** (`materia-prima`). Si es así, no muestra nada, evitando saturar productos que no requieren esta visualización visual.
* **Filtro de Tipo de Atributo:** El código itera sobre todos los atributos globales pero **solo procesa aquellos configurados como tipo 'image'**, ignorando atributos de texto o selección.

## ⚙️ Configuración (Hardcoded)

Este plugin no tiene panel de administración. La lógica de exclusión está definida directamente en el código fuente.

**Para cambiar la categoría excluida:**
1.  Abre el archivo `atributos-circulos-tienda.php`.
2.  Busca la función `mostrar_atributos_circulos`.
3.  Modifica el slug `'materia-prima'` en la línea condicional (ver ejemplo al final del documento).

## 📂 Estructura del Plugin

* `atributos-circulos-tienda.php`: Archivo único que contiene:
    * Registro del Shortcode.
    * Lógica para obtener metadatos de imagen de los términos (`product_attribute_image`).
    * Estilos CSS en línea para los círculos.

## 🚀 Instalación

1.  Sube el archivo `atributos-circulos-tienda.php` (o la carpeta) a `/wp-content/plugins/`.
2.  Activa el plugin desde el panel de WordPress.
3.  **Requisito:** Asegúrate de que tus atributos de WooCommerce tengan imágenes asignadas.

## 💻 Shortcode

Para mostrar los círculos de atributos en la ficha de producto (o cualquier lugar donde el objeto global `$product` esté disponible), usa:

```shortcode
[mostrar_atributos_circulos]
