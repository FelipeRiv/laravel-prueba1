/* 
    * Ejercicio 5 Realizar en javascript una función llamada  “juego de letras”, dicha función recibe una cadena de caracteres como parámetro;  procesa dicha string para mostrar en consola del navegador cada letra intercalada en minúsculas y mayúsculas. “EsTa Es Mi PrUeBa En CyBeRfUeL” e indicar cuanto caracteres la conforman, es decir la longitud de la cadena recibida.

*/

/**
 * 
 * @param {*} cadena String cadena de caracteres a intercalar
 * @returns Obj JSON con las propiedades { fraseInicial, fraseIntercalada logitud } de la cadena de caracteres.
 */
const juegoDeLetras = (cadena) => {

    let palabrasCovertidas;

    // * Elimino espacios en blanco multiples si existieran
    const frase = cadena.replace(/\s+/g, ' ').trim();

    // * Obtengo cada palabra de la frase en un array con split delimitado por el espacio en blanco
    const palabrasFrase = frase.split(' ');

    // * Llamo a mi FN para intercalar el case de cada palabra y lo retorno en mi arreglo de palabras convertidas
    palabrasCovertidas = palabrasFrase.map((palabra) => intercalarCase(palabra));

    palabrasCovertidas = palabrasCovertidas.join(' ');

    return {
        fraseInicial: frase,
        fraseIntercalada: palabrasCovertidas,
        longitud: palabrasCovertidas.length
    };

};

/**
 * 
 * @param {*} frase String frase a intercalar entre mayusculas y minusculas
 * @returns String frase intercalada
 */
const intercalarCase = (frase) => {

    // * Obtengo cada letra de la frase en un array  con spread operator
    const letrasFrase = [...frase];

    // * Recorro el array y segun su index convierto a mayus o minus cada letra
    const letrasIntercaladas = letrasFrase.map((letra, i) => {

        return (i % 2 === 0 ) ?  letra.toUpperCase() :  letra.toLowerCase();

    });

    return letrasIntercaladas.join('');

};


// * LLamado a la funcion para imprimir por consola por medio de tabla
console.table(juegoDeLetras(prompt('Digita una palabra o frase para imprimir en consola del navegador', 'esta es mi prueba en cyberfuel')));






// const {fraseIntercalada, longitud} = juegoDeLetras('  esta    es mi prueba   en    cyberfuel 123 ');
// console.table(juegoDeLetras('  esta    es mi prueba   en    cyberfuel  '));
// console.log(`Frase Intercalada: ${fraseIntercalada} - Longitud: ${longitud} caracteres`);
