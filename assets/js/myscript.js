window.onload = function(){
    //document.getElementById("botonModal").click();
	if(document.getElementById('exampleModal')){
    var objeto = document.getElementById('botonModal');
    console.log(objeto)
    objeto.click();}



    const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
  $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

// Escuchar cuando cambie
$seleccionArchivos.addEventListener("change", () => {
  // Los archivos seleccionados, pueden ser muchos o uno
  const archivos = $seleccionArchivos.files;
  // Si no hay archivos salimos de la función y quitamos la imagen
  if (!archivos || !archivos.length) {
    $imagenPrevisualizacion.src = "";
    return;
  }
  console.log(archivos)
  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  const primerArchivo = archivos[0];
  // Lo convertimos a un objeto de tipo objectURL
  const objectURL = URL.createObjectURL(primerArchivo);
  console.log(objectURL)
  // Y a la fuente de la imagen le ponemos el objectURL
  $imagenPrevisualizacion.src = objectURL;
});
}