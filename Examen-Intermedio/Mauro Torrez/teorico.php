<?php

/**
 * Se les presentan varias preguntas teoricas sobre los temas
 * vistos durante el curso. Responda con una X entre los [ ] en
 * las preguntas multiple choices y donde deba desarrollar escriba
 * dentro los comentarios.
 */

/**
 * 1 - MongoDB / Elastic search son:
 * 
 * [ ] - Base de datos relacionales
 * [x] - Base de datos no relacional
 * [ ] - Un sistema de documentos
 */

/**
 * 2 - MongoDB - Marque todas las que corresponda:
 * 
 * [ ] - Guarda documentos con una estructura rigida de información
 * [x] - Guarda documentos sin estructura rigida
 * [x] - Se puede guardar documentos en grupos de documentos o collecciones
 * [x] - Nos podemos comunicar con MongoDB por medio de JSON
 */

/**
 * 3 - Patrones de diseño. Explique MVC, de un ejemplo de las actividades donde
 *     hicimos uso de este patron. Comente los componentes principales
 *     de la actividad
 * 
 *       El patron MVC se trata esencialmente de separar la capa de datos (modelo) de la presentacion (vista)
 *       El responsable de la comunicacion entre ambas partes es el controlador.
 *       El Modelo es donde se desarrolla el manejo de datos, "es toda la aplicacion".
 *       El Controlador se encarga de la lectura de las solicitudes y el manejo de las respuestas.
 *       La Vista son son los generadores de codigo HTML (clases y funciones HTML)        
 *         
 *       Utilizamos el patron de diseño MVC en una actividad en la cual desarrollados el juego Ahorcado, 
 *       la idea fue por un lado, crear la logica del juego dentro de una clase donde desarrollamos la 
 *       jugabilidad del juego (metodos donde se maneja el juego: reglas, validaciones, condiciones del juego,etc)
 *       aqui desarrollamos el Modelo. Por otro lado, creamos un Router que contiene los controladores del juego,
 *       el cual se encarga de la conexion entre la logica del juego (Modelo) y sus determinados controladores
 *       (Controlador), luego desarrollamos varios controladores que ejecutan las funcionalidades del juego atraves
 *       de la logica, tomando como referencia las variables superglobales ($_GET y $_POST) el cual permite la comunicacion
 *       y el juego con el usuario. Ademas, implementamos la variable superglobal  $_SESSION donde guardamos los valores
 *       necesarios asi poder jugar.   
 *       En fin, desarrollamos la logica del juego, el Router y los Controllers necesarios para jugar atraves de la URL.
 * 
 * 
 * 
 *       4 - Patrones de diseño. De un ejemplo practico de cada uno de Decorator y Composite.
 * 
 *      El patron Decorator permite añadir funcionalidad extra a una clase (de forma dinámica o estática) 
 *      sin modificar el comportamiento de la clase.
 *      Un ejemplo de este patron es la implementacion de una funcion extra en una clase Mercado, donde la clase
 *      solo se maneja en efectivo sin IVA, pero por cuestiones contables se necesita saber las transacciones 
 *      con IVA incluido, para ello se deberia crear un Decorator, que incluya todas las funciones de la clase 
 *      Mercado agregandole la funcion extra de las transacciones con IVA. 
 *      
 *      Para ello la clase Decorator debe implementar la misma interface que Mercado, tomar el objeto como 
 *      propiedad y referenciar en sus metodos a los metodos de la propiedad del objeto Mercado.
 *      Si la clase contiene un metodo totalVentas y otro totalCompras, deberia calcular el IVA dentro de los 
 *      metodos y guardarlo en una propiedad del Decorator y devolver la propiedad a traves de una metodo.
 * 
 *      El patron Composite es pensado como una clase que esta compuesta de otros objetos 
 *      Por ejemplo: un motor es una parte de un auto, cuando se elimina el auto se elimina el motor. 
 *      Una universidad contiene (esta compuesto) por departamentos, si eliminamos la universidad igualmente se elimina 
 *      sus departamentos.
 *      Para implementar el patron, la entidad superior debe contener (tener instancias) de las clases que lo componen. 
 *      Crear los objetos dentro de las clases.
 * 


 */
