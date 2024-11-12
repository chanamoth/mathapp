# MathApp

Este proyecto está desarrollado con el lenguaje PHP en su versión 7.3.31 utilizando el patrón Modelo Vista Controlador, teniendo como objetivo realizar el cálculo de combinaciones teniendo como base 2 columnas de una tabla y la cantidad de filas enviadas, a su vez el resultado se visualiza de manera dinámica con opciones exportables a PDF, WORD, EXCEL e impresión directa.

## Tecnnologías utilizadas

1 PHP en su versión 7.3.31 utilizando el patrón Modelo Vista Controlador (MVC)  
2 Javascript  
3 Jquery  
4 Ajax  
5 CSS  
6 Bootstrap neumorphism

## Configurar dominio virtual Xampp - Windows

1 Xampp: En la ruta `\xampp\apache\conf\extra` abrir el archivo `httpd-vhosts.conf` y agregar la siguiente línea de código:

`<VirtualHost *:80>DocumentRoot "D:/xampp/htdocs/" ServerName localhost</VirtualHost>`  
`<VirtualHost *:80>DocumentRoot "D:/xampp/htdocs/studiomutante/mathapp" ServerName mathapp.studiomutante.com</VirtualHost>`

2 System32:  Eln la ruta `C:\Windows\System32\drivers\etc` abrir el archivo `hosts` y agregar la siguiente línea de código:

`127.0.0.1       localhost`  
`127.0.0.1       mathapp.studiomutante.com`

## Correr aplicación en localhost

Iniciar el servidor local en `Xampp` y en el navegador escribir `http://mathapp.studiomutante.com/`

## Correr aplicación en Hosting

1 En la raiz del sistema ubicar la siguiente ruta `\controllers\template.controller.php`  
2 Editar la linea 10 con la ruta donde sera cargado el sistema  
3 Abrir en el navegador y escribir `http://{{tu ruta configurada}}/`

## Configurar impresión Google Chrome

1 Al abrir la ventana de impresión dirigirese a la pestaña `Más opciones de configuración`  
2 En el apartado de `Opciones` desmarcar `Encabezados y pies de páginas` y marcar `Gráficos en segundo plano`